<?php

class UsersController extends \BaseController {

	// Enviroment variables
	protected $repo;
	protected $moduleInfo;



	// Constructing default values
	public function __construct()
	{
		// Call CoreController constructor to get Layout and other variables
		parent::__construct();

		// Make module variables
		$this->repo = new UsersRepository;
 
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
/*	
		// - CHECK IF USER IS LOGGED IN - // 
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
		$entries = Users::getEntries(null, null);
	 
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

		$this->layout->content = View::make('backend.users.index', array('entries' => $entries['entries']));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
/*	
		// - CHECK IF USER IS LOGGED IN - // 
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
		$regionlist = array();
	 	$region = Region::getEntries(null, null);
	 	
		if ($region['status'] == 0)
		{
			return Redirect::route('getDashboard')->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}
		foreach ($region['entries'] as $region)
		{
			$regionlist[$region->id] = $region->name;
		}

		$citylist = array();
	 	$city = City::getEntries(null, null);
	 	
		if ($city['status'] == 0)
		{
			return Redirect::route('getDashboard')->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}
		foreach ($city['entries'] as $city)
		{
			$citylist[$city->id] = $city->name;
		}




		$entries = Users::getEntries(null, null);
	 
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

		$this->layout->content = View::make('backend.users.create', array('postRoute' => 'UsersStore', 'regionlist' => $regionlist, 'citylist' => $citylist));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		Input::merge(array_map('trim', Input::all()));
		
		$entryValidator = Validator::make(Input::all(), Users::$store_rules);

		if ($entryValidator->fails())
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_validating_entry'))->withErrors($entryValidator)->withInput();
		}

		$store = $this->repo->store( 
			Input::get('first_name'),
			Input::get('last_name'),
			Input::get('username'),
			Input::get('region'),
			Input::get('city'),
			Input::get('date_of_birth'),
			Input::get('email'),
			Input::get('password'),
			Input::get('contact1'),
			Input::get('contact2'),
			Input::get('additional_notes'),
			Input::get('user_info'),
			Input::get('published'),
			Input::file('image')
		);

		if ($store['status'] == 0)
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_adding_user'))->withErrors($entryValidator)->withInput();
		}
		else
		{
			return Redirect::route('UsersIndex')->with('success_message', Lang::get('core.msg_success_user_added', array('name' => Input::get('name'))));
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
		// - AUTHORITY CHECK ENDS HERE - //   
*/
		// Get data

		$regionlist = array();
	 	$region = Region::getEntries(null, null);
	 	
		if ($region['status'] == 0)
		{
			return Redirect::route('getDashboard')->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}
		foreach ($region['entries'] as $region)
		{
			$regionlist[$region->id] = $region->name;
		}

		$citylist = array();
	 	$city = City::getEntries(null, null);
	 	
		if ($city['status'] == 0)
		{
			return Redirect::route('getDashboard')->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}
		foreach ($city['entries'] as $city)
		{
			$citylist[$city->id] = $city->name;
		}

		$entry = Users::getEntries($id, null); 
		$regionname = Region::getEntries($entry['entry']->region, null);
		$regionname = $regionname['entry']->name;

		$cityname = City::getEntries($entry['entry']->city, null);
		$cityname = $cityname['entry']->name;




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

		$this->layout->content = View::make('backend.users.show', array('entry' => $entry['entry'], 'regionlist' => $regionlist, 'citylist' => $citylist, 'regionname' => $regionname, 'cityname' => $cityname));
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
		// - AUTHORITY CHECK ENDS HERE - //   
*/
		// Get data

		$regionlist = array();
	 	$region = Region::getEntries(null, null);

	 	if ($region['status'] == 0)
		{
			return Redirect::route('getDashboard')->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}
		foreach ($region['entries'] as $region)
		{
			$regionlist[$region->id] = $region->name;
		}

		$citylist = array();
	 	$city = City::getEntries(null, null);
	 	
		if ($city['status'] == 0)
		{
			return Redirect::route('getDashboard')->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}
		foreach ($city['entries'] as $city)
		{
			$citylist[$city->id] = $city->name;
		}

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

		$this->layout->content = View::make('backend.users.edit', array('entry' => $entry['entry'], 'postRoute' => 'UsersUpdate', 'regionlist' => $regionlist, 'citylist' => $citylist,));
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

		$entryValidator = Validator::make(Input::all(), Users::$store_rules);

		if ($entryValidator->fails())
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_validating_entry'))->withErrors($entryValidator)->withInput();
		}

		$update = $this->repo->update(
			Input::get('id'),
			Input::get('first_name'),
			Input::get('last_name'),
			Input::get('username'),
			Input::get('region'),
			Input::get('city'),
			Input::get('date_of_birth'),
			Input::get('email'),
			Input::get('password'),
			Input::get('contact1'),
			Input::get('contact2'),
			Input::get('additional_notes'),
			Input::get('user_info'),
			Input::file('image')
		);

		if ($update['status'] == 0)
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_updating_user'))->withErrors($entryValidator)->withInput();
		}
		else
		{
			return Redirect::route('UsersIndex')->with('success_message', Lang::get('core.msg_success_user_updated', array('name' => Input::get('name'))));
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
		// - AUTHORITY CHECK ENDS HERE - //   
*/
		if ($id == null)
		{
			return Redirect::route('UsersIndex')->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}

		$entry = Users::getEntries($id, null);

		if ($entry['status'] == 0)
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}

		if (!is_object($entry['entry']))
		{
			return Redirect::route('UsersIndex')->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}
  
		$destroy = $this->repo->destroy($id);

		if ($destroy['status'] == 1)
		{
			return Redirect::back()->with('success_message', Lang::get('core.msg_success_user_deactivated!'));
		}
		else
		{
			goDie($destroy);
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_deactivating_user'));
		}
	}


}
