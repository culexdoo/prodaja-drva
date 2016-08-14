 <?php

class AdsController extends \BaseController {

	// Enviroment variables
	protected $repo;
	protected $moduleInfo;



	// Constructing default values
	public function __construct()
	{
		// Call CoreController constructor to get Layout and other variables
		parent::__construct();

		// Make module variables
		$this->repo = new AdsRepository;
 
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
		$entries = Ads::getEntries(null, null, null, null, null, null, null);
		

	 	
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

		$this->layout->content = View::make('backend.ads.index', array('entries' => $entries['entries']));
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
			return Redirect::route('getDashboard')->with('error_message', Lang::get('core.msg_error_getting_entries'));
		}
		foreach ($region['entries'] as $region)
		{
			$regionlist[$region->id] = $region->name;
		}

		$citylist = array();
	 	$city = City::getEntries(null, null);
	 	
		if ($city['status'] == 0)
		{
			return Redirect::route('getDashboard')->with('error_message', Lang::get('core.msg_error_getting_entries'));
		}
		foreach ($city['entries'] as $city)
		{
			$citylist[$city->id] = $city->name;
		}

		$woodlist = array();
	 	$wood = Wood::getEntries(null, null); 
		if ($wood['status'] == 0)
		{
			return Redirect::route('getDashboard')->with('error_message', Lang::get('core.msg_error_getting_entries'));
		}
		foreach ($wood['entries'] as $wood)
		{
			$woodlist[$wood->id] = $wood->name;
		}

		$packaginglist = array();
	 	$packaging = Packaging::getEntries(null, null); 
		if ($packaging['status'] == 0)
		{
			return Redirect::route('getDashboard')->with('error_message', Lang::get('core.msg_error_getting_entries'));
		}
		foreach ($packaging['entries'] as $packaging)
		{
			$packaginglist[$packaging->id] = $packaging->name;
		}

		$usernamelist = array();
	 	$username = Users::getEntries(null, null); 
		if ($username['status'] == 0)
		{
			return Redirect::route('getDashboard')->with('error_message', Lang::get('core.msg_error_getting_entries'));
		}
		foreach ($username['entries'] as $username)
		{
			$usernamelist[$username->id] = $username->username;
		}

		$emaillist = array();
	 	$email = Users::getEntries(null, null); 
		if ($email['status'] == 0)
		{
			return Redirect::route('getDashboard')->with('error_message', Lang::get('core.msg_error_getting_entries'));
		}
		foreach ($email['entries'] as $email)
		{
			$emaillist[$email->id] = $email->email;
		}

		$entries = Ads::getEntries(null, null); 
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

		$this->layout->content = View::make('backend.ads.create', array('postRoute' => 'AdsStore', 'entries' => $entries['entries'], 'regionlist' => $regionlist, 'citylist' => $citylist, 'woodlist' => $woodlist, 'packaginglist' => $packaginglist, 'usernamelist' => $usernamelist, 'emaillist' => $emaillist));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		Input::merge(array_map('trim', Input::all()));

		$entryValidator = Validator::make(Input::all(), Ads::$store_rules);
		
		if ($entryValidator->fails())
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_validating_entry'))->withErrors($entryValidator)->withInput();
		}

		$store = $this->repo->store( 
			Input::get('title'),
			Input::get('wood'),
			Input::get('packaging'), 
			Input::get('price'),
			Input::get('description'),
			Input::get('user'), 
			Input::get('region'), 
			Input::get('city'),
			Input::get('email'),
			Input::get('contact1'),
			Input::get('contact2'),
			Input::get('published'),
			Input::file('image')
		);


		if ($store['status'] == 0)
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_adding_entry'))->withErrors($entryValidator)->withInput();
		}
		else
		{
			return Redirect::route('AdsIndex')->with('success_message', Lang::get('core.msg_success_entry_added', array('name' => Input::get('name'))));
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



		$entry = Ads::getEntries($id, null); 
		$regionname = Region::getEntries($entry['entry']->region, null);
		$regionname = $regionname['entry']->name;

		$cityname = City::getEntries($entry['entry']->city, null);
		$cityname = $cityname['entry']->name;

		$woodname = Wood::getEntries($entry['entry']->wood, null);
		$woodname = $woodname['entry']->name;

		$packaging = Packaging::getEntries($entry['entry']->wood, null);
		$packaging = $packaging['entry']->name;

		$published = $entry['entry']->published;

		$featured = $entry['entry']->featured;

		$this->layout->title = 'Uređivanje korisnika | Prodaja drva';

		$this->layout->css_files = array(
			'css/backend/summernote.css'			
		);

		$this->layout->js_footer_files = array(
			'js/backend/bootstrap-filestyle.min.js',
			'js/backend/summernote.js',
			'js/backend/jquery.stringtoslug.min.js',
			'js/backend/speakingurl.min.js',
			'js/frontend/locationpicker.jquery.min.js'
		);

		$this->layout->content = View::make('backend.ads.show', array('entry' => $entry['entry'], 'regionname' => $regionname, 'cityname' => $cityname, 'woodname' => $woodname, 'packaging' => $packaging, 'published' => $published, 'featured' => $featured));
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

		$usernamelist = array();
	 	$username = Users::getEntries(null, null, null, null); 
		if ($username['status'] == 0)
		{
			return Redirect::route('getDashboard')->with('error_message', Lang::get('core.msg_error_getting_entries'));
		}
		foreach ($username['entries'] as $username)
		{
			$usernamelist[$username->id] = $username->username;
		}

		$regionlist = array();
	 	$region = Region::getEntries(null, null); 

		if ($region['status'] == 0)
		{
			return Redirect::route('getDashboard')->with('error_message', Lang::get('core.msg_error_getting_entries'));
		}
		foreach ($region['entries'] as $region)
		{
			$regionlist[$region->id] = $region->name;
		}

		$citylist = array();
	 	$city = City::getEntries(null, null); 

		if ($city['status'] == 0)
		{
			return Redirect::route('getDashboard')->with('error_message', Lang::get('core.msg_error_getting_entries'));
		}
		foreach ($city['entries'] as $city)
		{
			$citylist[$city->id] = $city->name;
		}

		$woodlist = array();
	 	$wood = Wood::getEntries(null, null); 
		if ($wood['status'] == 0)
		{
			return Redirect::route('getDashboard')->with('error_message', Lang::get('core.msg_error_getting_entries'));
		}
		foreach ($wood['entries'] as $wood)
		{
			$woodlist[$wood->id] = $wood->name;
		}

		$packaginglist = array();
	 	$packaging = Packaging::getEntries(null, null); 
		if ($packaging['status'] == 0)
		{
			return Redirect::route('getDashboard')->with('error_message', Lang::get('core.msg_error_getting_entries'));
		}
		foreach ($packaging['entries'] as $packaging)
		{
			$packaginglist[$packaging->id] = $packaging->name;
		}

		

		$entry = Ads::getEntries($id, null);  

		$published = $entry['entry']->published;

		$featured = $entry['entry']->featured;


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
			'js/backend/speakingurl.min.js',
			'js/frontend/locationpicker.jquery.min.js'
		);

		$this->layout->content = View::make('backend.ads.edit', array('entry' => $entry['entry'], 'postRoute' => 'AdsUpdate', 'usernamelist' => $usernamelist, 'regionlist' => $regionlist, 'citylist' => $citylist, 'woodlist' => $woodlist, 'packaginglist' => $packaginglist, 'published' => $published, 'featured' => $featured));
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

		$entryValidator = Validator::make(Input::all(), Ads::$store_rules);

		if ($entryValidator->fails())
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_validating_entry'))->withErrors($entryValidator)->withInput();
		}

		$update = $this->repo->update(
			Input::get('id'),
			Input::get('title'),
			Input::get('wood'),
			Input::get('packaging'), 
			Input::get('price'),
			Input::get('description'), 
			Input::get('user'), 
			Input::get('region'), 
			Input::get('city'),
			Input::get('published'),
			Input::get('featured'),
			Input::file('image') 
		);

		if ($update['status'] == 0)
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_adding_entry'))->withErrors($entryValidator)->withInput();
		}
		else
		{
			return Redirect::route('AdsIndex')->with('success_message', Lang::get('core.msg_success_entry_added', array('name' => Input::get('name'))));
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
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}

		$entry = Ads::getEntries($id, null, null, null, null, null, null, null, null, null, null, null);

		if ($entry['status'] == 0)
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}

		if (!is_object($entry['entry']))
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}
  
		$destroy = $this->repo->destroy($id);

		if ($destroy['status'] == 1)
		{
			return Redirect::back()->with('success_message', Lang::get('core.msg_success_entry_deleted'));
		}
		else
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_deleting_entry'));
		}
	}


}
