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
		$users = Users::getEntries(null, 10, null, null);
		
		$classifieds = Classifieds::getEntries(null, null, null, null, null, 10, null, null, null, null, null, null);

        $reviews = Review::getEntries(null, 10, null, null);

        $inquirys = Inquiry::getEntries(null, 10);


        $countallclassifieds = Classifieds::getEntries(null, null, null, null, null, null, null, null, null, null, true, null);

		$countactiveclassifieds = Classifieds::getEntries(null, null, null, null, null, null, null, null, null, null, null, null, true);

		$countallusers = Users::getEntries(null, null, null, true, null);

		$countactiveusers = Users::getEntries(null, null, null, null, true);

		$countallreviews = Review::getEntries(null, null, null, null, true, null);

		$countactivereviews = Review::getEntries(null, null, null, null, null, true);

		$this->layout->title = 'Admin | Prodaja drva'; 
		
		$this->layout->css_files = array(

		);

		$this->layout->js_footer_files = array(
		);
		
		$this->layout->content = View::make('backend.dashboard', array('users' => $users['entries'], 'classifieds' => $classifieds['entries'], 'reviews' => $reviews['entries'], 'inquirys' => $inquirys['entries'], 'countallclassifieds' => $countallclassifieds['entry'], 'countallusers' => $countallusers['entry'], 'countactiveusers' => $countactiveusers['entry'], 'countactiveclassifieds' => $countactiveclassifieds['entry'], 'countallreviews' => $countallreviews['entry'], 'countactivereviews' => $countactivereviews['entry']));
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
	public function show()
	{

	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit()
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
