<?php

class UserController extends \BaseController {

	/**
	 * Show the form for user to login
	 *
	 * @return Response
	 */
	public function login()
	{
		// Display user login form
		return View::make('login'); 
	}


	/**
	 * Validate user provided credential
	 *
	 * @return Response
	 */
	public function validateUser()
	{
		// validate the info, create rules for the inputs
		$rules = array(
			'email_address'    => 'required|email', 
			'password' => 'required|alphaNum|min:3' 
		);

		// run the validation rules on the inputs from the form
		$validator = Validator::make(Input::all(), $rules);

		// if the validator fails, redirect back to the form
		if ($validator->fails()) {
			return Redirect::to('user/login')
				->withErrors($validator) 
				->withInput(Input::except('password')); 
		} else {

			// create our user data for the authentication
			$userdata = array(
				'email_address' 	=> Input::get('email_address'),
				'password' 	=> Input::get('password')
			);

			// attempt to do the login
			if (Auth::attempt($userdata)) {

				// validation successful!
				// redirect them to the secure customers listing page
				return Redirect::to('customers');

			} else { 

				// validation not successful, send back to form
				return Redirect::to('user/login')
    		        ->with('flash_error', 'Your email address/password combination was incorrect.')
	            	->withInput();
					

			}

		}
	}
	
	/**
	 * Show the form for user to sign up form
	 *
	 * @return Response
	 */
	public function sign_up()
	{
		// Display user sign up form
		return View::make('sign_up'); 
	}

	/**
	 * Validate user provided credential and register
	 *
	 * @return Response
	 */
	public function validateUserSignUp()
	{
		// validate the info, create rules for the inputs
		$rules = array(
			'name'    => 'required', 
			'email_address'    => 'required|email|unique:users', 
			'password' => 'required|alphaNum|min:3|Confirmed', 
			'password_confirmation' => 'required|alphaNum|min:3' 
		);

		// run the validation rules on the inputs from the form
		$validator = Validator::make(Input::all(), $rules);

		// if the validator fails, redirect back to the form
		if ($validator->fails()) {
			return Redirect::to('user/sign_up')
				->withErrors($validator) 
				->withInput(Input::except('password')); 
		} else {

			// create our user data for the register 
			$user = new User;
			$user->name       = Input::get('name');
			$user->email_address      = Input::get('email_address');
			$user->password = Hash::make(Input::get('password'));
			$user->save();			
			
			// create our user data for the authentication 
			$logindata = array(
				'email_address' 	=> Input::get('email_address'),
				'password' 	=> Input::get('password')
			);

			// attempt to do the login
			if (Auth::attempt($logindata)) {

				// validation successful!
				// redirect them to the secure customers listing page
				return Redirect::to('customers');

			} else { 

				// validation not successful, send back to form
				return Redirect::to('user/login')
    		        ->with('flash_error', 'Your email address/password combination was incorrect.')
	            	->withInput();
					

			}

		}
	}
	
	
	/**
	 * Show the form for user to login
	 *
	 * @return Response
	 */
	public function logout()
	{ 
		// logs out the user and redirect to user login page
		Session::flush(); 
		return Redirect::to('user/login');
	}


}