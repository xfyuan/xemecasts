<?php

class SeriesController extends \BaseController {

    public function __construct()
    {
        $this->beforeFilter('csrf', ['on' => 'post']);
    }

	/**
	 * Display a listing of series
	 *
	 * @return Response
	 */
	public function index()
	{
		$series = Series::with('xcast')->get();

		return View::make('admin.series.index', compact('series'));
	}

	/**
	 * Show the form for creating a new series
	 *
	 * @return Response
	 */
	public function create()
	{
        $xcasts = Xcast::orderBy('title')->get()->toArray();
        $grouped_casts = array_chunk($xcasts, ceil(count($xcasts)/3));

		return View::make('admin.series.create', compact('grouped_casts'));
	}

	/**
	 * Store a newly created series in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Series::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$series = Series::create($data);
        $series->xcast()->attach(Input::get('casts'));

		return Redirect::route('admin.series.index');
	}

	/**
	 * Display the specified series.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	// public function show($id)
	// {
	// 	$series = Series::findOrFail($id);
    //
	// 	return View::make('admin.series.show', compact('series'));
	// }

	/**
	 * Show the form for editing the specified series.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$series = Series::find($id);
        $selected_casts = array_pluck($series->xcast, 'id');
        $xcasts = Xcast::orderBy('title')->get()->toArray();
        $grouped_casts = array_chunk($xcasts, ceil(count($xcasts)/3));

		return View::make('admin.series.edit', compact('series', 'grouped_casts', 'selected_casts'));
	}

	/**
	 * Update the specified series in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$series = Series::findOrFail($id);

		$validator = Validator::make($data = Input::except('casts'), Series::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$series->update($data);
        $series->xcast()->sync(Input::get('casts'));

		return Redirect::route('admin.series.index');
	}

	/**
	 * Remove the specified series from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        Series::find($id)->xcast()->detach();
		Series::destroy($id);

		return Redirect::route('admin.series.index');
	}

}
