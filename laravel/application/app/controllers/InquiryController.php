<?php

class InquiryController extends \BaseController {
	// Enviroment variables
	protected $repo;
	protected $moduleInfo;



	// Constructing default values
	public function __construct()
	{
		// Call CoreController constructor to get Layout and other variables
		parent::__construct();

		// Make module variables
		$this->repo = new InquiryRepository;
 
	}

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
*/		// - AUTHORITY CHECK ENDS HERE - //    

		
		$entries = Inquiry::getEntries(null, null); 



		$this->layout->title = 'Admin | Prodaja drva';

		$this->layout->css_files = array(
			'css/backend/bootstrap.min.css',
			'css/backend/buttons.dataTables.min.css'
		);

		$this->layout->js_footer_files = array(
			'js/backend/datatables.js',
			'js/backend/dataTables.buttons.min.js',
			'js/backend/jszip.min.js',
			'js/backend/pdfmake.min.js',
			'js/backend/vfs_fonts.js',
			'js/backend/buttons.html5.min.js'

		);

		$this->layout->content = View::make('backend.inquiry.index', array('entries' => $entries['entries']));

	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
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
*/		// - AUTHORITY CHECK ENDS HERE - //

		$userlist = array();
	 	$users = Users::getEntries(null, null);
	 	
		if ($users['status'] == 0)
		{
			return Redirect::route('getDashboard')->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}
		foreach ($users['entries'] as $user)
		{
			$userlist[$user->id] = $user->username;
		}   

		$this->layout->title = 'Admin | Prodaja drva';

		$this->layout->css_files = array(
			'css/backend/bootstrap.min.css',
			'css/backend/buttons.dataTables.min.css'
		);

		$this->layout->js_footer_files = array(
			'js/backend/datatables.js',
			'js/backend/dataTables.buttons.min.js',
			'js/backend/jszip.min.js',
			'js/backend/pdfmake.min.js',
			'js/backend/vfs_fonts.js',
			'js/backend/buttons.html5.min.js'

		);

		$this->layout->content = View::make('backend.inquiry.create', array('postRoute' => 'InquiryStore', 'userlist' => $userlist));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		Input::merge(array_map('trim', Input::all()));

		$entryValidator = Validator::make(Input::all(), Inquiry::$store_rules);

		if ($entryValidator->fails())
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_validating_entry'))->withErrors($entryValidator)->withInput();
		}

		$store = $this->repo->store(  
			Input::get('first_name'),
			Input::get('last_name'),
			Input::get('contact'),
			Input::get('email'),
			Input::get('content')
		);

		if ($store['status'] == 0)
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_adding_inquiry'))->withErrors($entryValidator)->withInput();
		}
		else
		{
			return Redirect::route('InquiryIndex')->with('success_message', Lang::get('core.msg_success_inquiry_added', array('name' => Input::get('name'))));
		}
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
*/		// - AUTHORITY CHECK ENDS HERE - //   

		// Get data

		
		$users = Users::getEntries(null, null);

	 	if ($users['status'] == 0)
		{
			return Redirect::route('getDashboard')->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}

		foreach ($users['entries'] as $users)
		{
			$userlist[$users->id] = $users->username;
		}

 		$inquiry = Inquiry::getEntries($id, null);

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

		$this->layout->content = View::make('backend.inquiry.show', array('entry' => $inquiry['entry']));

	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
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
*/		// - AUTHORITY CHECK ENDS HERE - //   

		// Get data

		$users = Users::getEntries(null, null);

	 	if ($users['status'] == 0)
		{
			return Redirect::route('getDashboard')->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}

		foreach ($users['entries'] as $users)
		{
			$userlist[$users->id] = $users->username;
		}

		$entry = Inquiry::getEntries($id, null); 

		
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

		$this->layout->content = View::make('backend.inquiry.edit', array('entry' => $entry['entry'], 'postRoute' => 'InquiryUpdate', 'userlist' => $userlist ));

	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		Input::merge(array_map('trim', Input::all()));

		$entryValidator = Validator::make(Input::all(), Inquiry::$store_rules);

		if ($entryValidator->fails())
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_validating_entry'))->withErrors($entryValidator)->withInput();
		}

		$update = $this->repo->update(
			Input::get('id'), 
			Input::get('first_name'),
			Input::get('last_name'),
			Input::get('contact'),
			Input::get('email'),
			Input::get('content')
		);
		
		if ($update['status'] == 0)
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_updating_inquiry'))->withErrors($entryValidator)->withInput();
		}
		else
		{
			return Redirect::route('InquiryIndex')->with('success_message', Lang::get('core.msg_success_inquiry_updated', array('name' => Input::get('name'))));
		}
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
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
*/		// - AUTHORITY CHECK ENDS HERE - //   

		if ($id == null)
		{
			return Redirect::route('InquiryIndex')->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}

		$entry = Inquiry::getEntries($id, null);

		if ($entry['status'] == 0)
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}

		if (!is_object($entry['entry']))
		{
			return Redirect::route('InquiryIndex')->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}
  
		$destroy = $this->repo->destroy($id);

		if ($destroy['status'] == 1)
		{
			return Redirect::back()->with('success_message', Lang::get('core.msg_success_inquiry_deactivated'));
		}
		else
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_deactivating_inquiry'));
		}
	}


}
