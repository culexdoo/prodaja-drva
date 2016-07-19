<?php

class DashboardController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function index()
	{

/*		// - CHECK IF USER IS LOGGED IN - // 
		$user = User::getUserInfos(Auth::user()->id); 

		if ($user['status'] == 0)
		{
			return Redirect::route('AdminSignIn')->with('error_message', Lang::get('messages.not_logged_in'));
		}
 
		// - AUTHORITY CHECK STARTS HERE - //
		$hasAuthority = false;

		switch ($user['user']->user_group)
		{ 
			case 'admin':
			// Admins should have authority
			$hasAuthority = true;
			break; 

			default:
			return Redirect::route('AdminSignIn')->with('error_message', Lang::get('core.unauthorized_access'));
		}

		if ($hasAuthority == false) 
		{
			return Redirect::route('AdminSignIn')->with('error_message', Lang::get('core.unauthorized_access'));
		}
		// - AUTHORITY CHECK ENDS HERE - //
*/
		$users = Users::getEntries(null, 10);  
		$ads = Ads::getEntries(null, 10);
                                                                           
 

		$this->layout->title = 'Admin | Dentist finder'; 
		$this->layout->css_files = array(

		);

		$this->layout->js_footer_files = array(
			'js/backend/datatables.js', 
		);

		$this->layout->content = View::make('backend.dashboard', array('users' => $users['entries'], 'ads' => $ads['entries'], 'getRoute' => 'UsersShow'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
/*		// - CHECK IF USER IS LOGGED IN - // 
		$user = User::getUserInfos(Auth::user()->id); 

		if ($user['status'] == 0)
		{
			return Redirect::route('AdminSignIn')->with('error_message', Lang::get('messages.not_logged_in'));
		}
 
		// - AUTHORITY CHECK STARTS HERE - //
		$hasAuthority = false;

		switch ($user['user']->user_group)
		{ 
			case 'admin':
			// Admins should have authority
			$hasAuthority = true;
			break; 

			default:
			return Redirect::route('AdminSignIn')->with('error_message', Lang::get('core.unauthorized_access'));
		}

		if ($hasAuthority == false) 
		{
			return Redirect::route('AdminSignIn')->with('error_message', Lang::get('core.unauthorized_access'));
		}
		// - AUTHORITY CHECK ENDS HERE - //
*/
		// Get data

		$entry = Users::getEntries($id, null); 


		if ($entry['status'] == 0)
		{
			return Redirect::route('getDashboard')->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}  


		

		$this->layout->title = 'Uređivanje korisnika | Prodaja drva';

		$this->layout->css_files = array(
			'css/backend/summernote.css'			
		);

		$this->layout->js_footer_files = array(
			'js/backend/bootstrap-filestyle.min.js',
			'js/backend/summernote.js',
			'js/backend/jquery.stringtoslug.min.js',
			'js/backend/speakingurl.min.js'
		);

		$this->layout->content = View::make('backend.show', array('entry' => $entry['entry']));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
