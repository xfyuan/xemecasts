<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function index()
	{
		$xcasts = Xcast::all()->sortByDesc('updated_at')->take(10);
        $top3 = Xcast::orderBy(DB::raw('RAND()'))->take(3)->get();
		return View::make('site.home', compact('xcasts', 'top3'));
	}

	public function show($id)
	{
		$xcast = Xcast::findOrFail($id);

		return View::make('site.cast', compact('xcast'));
    }

	public function browse()
	{
        $search = Request::get('q');
        $xcasts = $search
            ? Xcast::search($search)->get()
            : Xcast::all()->sortBy('title');
		return View::make('site.browse', compact('xcasts'));
	}

	public function whatisnew()
	{
        $whatisnew = [];
		$xcasts = Xcast::latest('updated_at')->take(16)->remember(10)->get();
        // dd(\DB::getQueryLog());

        $xcasts->each(function ($cast) use (&$whatisnew){
            $whatisnew[$cast->updated_at->toFormattedDateString()][] = $cast;
        });

		return View::make('site.whatisnew', compact('whatisnew'));
	}

	public function lessons()
	{
		$xcasts = Xcast::paginate(12);
		return View::make('site.lessons', compact('xcasts'));
	}

	public function series()
	{
		$series = Series::with('xcast')->get();

		return View::make('site.series', compact('series'));
	}

	public function seriesDetail($id)
	{
		$series = Series::find($id);

		return View::make('site.series-detail', compact('series'));
	}
}
