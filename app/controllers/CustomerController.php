<?php

class CustomerController extends \BaseController {

	/**
	 * Display a listing of the customers if user is logged in.
	 *
	 * @return Response
	 */
	public function index()
	{
		/*
		  Check user is logged in then display customer listing page
		  If user is not logged in then redirect to user login page
		*/
		
		if (Auth::check()) { 
		// get all the customers
		$customers = Customer::all(); 
		
		// load the view and pass the customers data
		return View::make('customers.index')
					->with('customers', $customers);
		}else { 
			return Redirect::to('user/login');
		}

	}


	/**
	 * Show the form for creating a new customer.
	 *
	 * @return Response
	 */
	public function create()
	{
		/*
		  Check user is logged in then display create customer page
		  If user is not logged in then redirect to user login page
		*/
			
		if (Auth::check()) { 
		 // load the create form 
		 return View::make('customers.create');
		}else { 
		  return Redirect::to('user/login');
		}
	}


	/**
	 * Store a newly created customer in database.
	 *
	 * @return Response
	 */
	public function store()
	{
		// validate the info, create rules for the inputs e.g email should be properly define, customer level should be numaric etc.
		$rules = array(
			'name'       => 'required', 
			'email'      => 'required|email', 
			'customer_level' => 'required|numeric' 
		);
		
		// run the validation rules on the inputs from the form
		$validator = Validator::make(Input::all(), $rules);

		// if the validator fails, redirect back to the form
		if ($validator->fails()) {
			return Redirect::to('customers/create')
				->withErrors($validator) 
				->withInput(Input::except('password'));  
		} else {
			// create our customer data for the storage
			$customer = new Customer;
			$customer->name       = Input::get('name');
			$customer->email      = Input::get('email');
			$customer->address      = Input::get('address');
			$customer->city      = Input::get('city');
			$customer->state      = Input::get('state');
			$customer->country      = Input::get('country');
			$customer->customer_level = Input::get('customer_level');
			$customer->save();

			// redirect to customer listing page with success message
			Session::flash('message', 'Successfully created customer!');
			return Redirect::to('customers');
		}

	}


	/**
	 * Display the specified customer.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		/*
		  Check user is logged in then display customer detail page
		  If user is not logged in then redirect to user login page
		*/
		if (Auth::check()) { 
		
		// get the customer from database using id
		$customer = Customer::find($id);

		// show the view and pass the customer to it
		return View::make('customers.show')
			->with('customer', $customer);
			
		}else { 
			return Redirect::to('user/login');
		}

	}


	/**
	 * Show the form for editing the specified customer.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		/*
		  Check user is logged in then display customer edit page
		  If user is not logged in then redirect to user login page
		*/
		if (Auth::check()) {
		
		// get the customer from database using id
		$customer = Customer::find($id);

		// show the edit form and pass the customer
		return View::make('customers.edit')
			->with('customer', $customer);
			
		}else {
			return Redirect::to('user/login');
		}

	}


	/**
	 * Update the specified customer in database.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		// validate the info, create rules for the inputs e.g email should be preperly define, customer level should be numaric etc.
		$rules = array(
			'name'       => 'required', 
			'email'      => 'required|email', 
			'customer_level' => 'required|numeric' 
		);
		
		// run the validation rules on the inputs from the form
		$validator = Validator::make(Input::all(), $rules);

		// if the validator fails, redirect back to the form
		if ($validator->fails()) {
			return Redirect::to('customers/' . $id . '/edit')
				->withErrors($validator) 
				->withInput(Input::except('password')); 
		} else {
			// Update customer into database using id
			$customer = Customer::find($id);
			$customer->name       = Input::get('name');
			$customer->email      = Input::get('email');
			$customer->address      = Input::get('address');
			$customer->city      = Input::get('city');
			$customer->state      = Input::get('state');
			$customer->country      = Input::get('country');
			$customer->customer_level = Input::get('customer_level');
			$customer->save();

			// redirect to customer listing page with success message
			Session::flash('message', 'Successfully updated customer!');
			return Redirect::to('customers');
		}

	}


	/**
	 * Remove the specified customer from database.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		// delete customer from database using id
		$customer = Customer::find($id);
		$customer->delete();

		// redirect to customer listing page with success message
		Session::flash('message', 'Successfully deleted the customer!');
		return Redirect::to('customers');

	}


}
