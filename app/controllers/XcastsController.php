<?php

class XcastsController extends \BaseController {

    public function __construct()
    {
        $this->beforeFilter('csrf', ['on' => 'post']);
        $this->beforeFilter('can_manage_premium_casts', ['except' => ['index', 'home', 'create', 'store']]);
    }

    public function home()
    {
		return View::make('admin.home');
    }

	/**
	 * Display a listing of xcasts
	 *
	 * @return Response
	 */
	public function index()
	{
        $search = Request::get('q');
        $xcasts = $search
            ? Xcast::search($search)
            : Xcast::latest('updated_at');

        if (! Entrust::can('manage_premium_casts') && ! Entrust::can('delete_casts')) {
            $xcasts = $xcasts->onlyFree();
        }

        $xcasts = $xcasts->paginate(8);

		return View::make('admin.xcasts.index', compact('xcasts'));
	}

	/**
	 * Show the form for creating a new xcast
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.xcasts.create');
	}

	/**
	 * Store a newly created xcast in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Xcast::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
        $data['rendered_notes'] = Markdown::string(Input::get('notes'));
        $data['poster'] = 'img/_default.jpg';

		Xcast::create($data);

		return Redirect::route('admin.xcasts.index');
	}

	/**
	 * Display the specified xcast.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$xcast = Xcast::findOrFail($id);

		return View::make('admin.xcasts.show', compact('xcast'));
	}

	/**
	 * Show the form for editing the specified xcast.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$xcast = Xcast::find($id);

		return View::make('admin.xcasts.edit', compact('xcast'));
	}

	/**
	 * Update the specified xcast in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$xcast = Xcast::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Xcast::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
        $data['rendered_notes'] = Markdown::string(Input::get('notes'));

		$xcast->update($data);

		return Redirect::route('admin.xcasts.index');
	}

	/**
	 * Remove the specified xcast from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Xcast::destroy($id);

		return Redirect::route('admin.xcasts.index');
	}

	public function uploadImage($id)
	{
		$xcast = Xcast::find($id);

		return View::make('admin.xcasts.upload_image', compact('xcast'));

	}

    public function transmitImage($id)
    {
        $uploaded_file  = $this->generate_uploaded_fileinfo($dest_folder = 'casts/poster');
        $upload_success = Image::make(Input::file('file'))->fit(576, 360)->save($uploaded_file['final_path_file']);

        if( $upload_success ) {
            $xcast = Xcast::findOrFail($id);

            if (File::exists($xcast->poster) && !preg_match('/_default\.jpg$/', $xcast->poster)) {
                File::delete($xcast->poster);
            }

            $xcast->poster = $uploaded_file['final_path_file'];
            $xcast->save();

            return Response::json('success', 200);
        } else {
            return Response::json('error', 400);
        }

    }

	public function uploadVideo($id)
	{
		$xcast = Xcast::find($id);

		return View::make('admin.xcasts.upload_video', compact('xcast'));

	}

    public function transmitVideo($id)
    {
        $uploaded_file  = $this->generate_uploaded_fileinfo($dest_folder = 'casts/video');
        $upload_success = Input::file('file')->move($dest_folder, $uploaded_file['final_file']);

        if( $upload_success ) {
            $xcast = Xcast::findOrFail($id);

            if (File::exists($xcast->video) && !preg_match('/_default\.mp4$/', $xcast->video)) {
                File::delete($xcast->video);
            }

            $getid3 = new getID3;
            $video_info = $getid3->analyze($uploaded_file['final_path_file']);
            $xcast->duration = $video_info['playtime_string'];

            $xcast->video = $uploaded_file['final_path_file'];
            $xcast->save();

            return Response::json('success', 200);
        } else {
            return Response::json('error', 400);
        }

    }


    // =========================================================================
    private function generate_uploaded_fileinfo($dest_folder)
    {
        $file            = Input::file('file');
        $filename        = Str::random();
        $extension       = strtolower($file->getClientOriginalExtension());
        $final_file      = "$filename.$extension";
        $final_path_file = "$dest_folder/$filename.$extension";

        return array('final_file' => $final_file, 'final_path_file' => $final_path_file);
    }
}
