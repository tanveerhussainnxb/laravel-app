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
	
	
	/**
	 * Welcome text if user is logged in
	 *
	 * @return Response
	 */
	public function showWelcome()
	{
		/*
		  Check user is logged in then display welcome text page
		  If user is not logged in then redirect to user login page
		*/
		if (Auth::check()) { 
			return View::make('hello'); 
		}else {
			return Redirect::to('user/login'); 
		}
	}

}
