<?php

class ReviewController extends \BaseController {
	// Enviroment variables
	protected $repo;
	protected $moduleInfo;



	// Constructing default values
	public function __construct()
	{
		// Call CoreController constructor to get Layout and other variables
		parent::__construct();

		// Make module variables
		$this->repo = new ReviewRepository;
 
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

		
		$entries = Review::getEntries(null, null, null); 





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

		$this->layout->content = View::make('backend.review.index', array('entries' => $entries['entries']));

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

		$this->layout->content = View::make('backend.review.create', array('postRoute' => 'ReviewStore', 'userlist' => $userlist));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		Input::merge(array_map('trim', Input::all()));



		$entryValidator = Validator::make(Input::all(), Review::$store_rules);

		if ($entryValidator->fails())
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_validating_entry'))->withErrors($entryValidator)->withInput();
		}

		$store = $this->repo->store(  
			Input::get('user'),
			Input::get('reviewed_user'),
			Input::get('review_content'),
			Input::get('rating')
		);

		if ($store['status'] == 0)
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_adding_review'))->withErrors($entryValidator)->withInput();
		}
		else
		{
			return Redirect::back()->with('success_message', Lang::get('core.msg_success_review_added', array('name' => Input::get('name'))));
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

 		$review = Review::getEntries($id, null, null); 
 		
 		$user = $review['entry']->user;

		$user = Users::getEntries($user); 
		foreach ($user as $key => $value) {
			$objavio = $value;
		}


 		
 		$reviewed_user = $review['entry']->reviewed_user;

		$reviewed_user = Users::getEntries($reviewed_user); 
		foreach ($reviewed_user as $key => $value) {
			$reviewed_user = $value;
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

		$this->layout->content = View::make('backend.review.show', array('entry' => $review['entry'], 'userlist' => $userlist, 'objavio' => $objavio, 'reviewed_user' => $reviewed_user));

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

			


		$entry = Review::getEntries($id, null); 

		
		if ($entry['status'] == 0)
		{
			return Redirect::route('getDashboard')->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}  

		$published = $entry['entry']->published;

		$ratingstars = array();
		$ratingstars = array_add($ratingstars, '1', '1');
		$ratingstars = array_add($ratingstars, '2', '2');
		$ratingstars = array_add($ratingstars, '3', '3');
		$ratingstars = array_add($ratingstars, '4', '4');
		$ratingstars = array_add($ratingstars, '5', '5');


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

		$this->layout->content = View::make('backend.review.edit', array('entry' => $entry['entry'], 'postRoute' => 'ReviewUpdate', 'userlist' => $userlist, 'published' => $published, 'ratingstars' => $ratingstars));

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

		$entryValidator = Validator::make(Input::all(), Review::$store_rules);

		if ($entryValidator->fails())
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_validating_entry'))->withErrors($entryValidator)->withInput();
		}

		$update = $this->repo->update(
			Input::get('id'), 
			Input::get('user'),
			Input::get('reviewed_user'),
			Input::get('review_content'),
			Input::get('rating')
		);
		
		if ($update['status'] == 0)
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_updating_review'))->withErrors($entryValidator)->withInput();
		}
		else
		{
			return Redirect::route('ReviewIndex')->with('success_message', Lang::get('core.msg_success_review_updated', array('name' => Input::get('name'))));
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
			return Redirect::route('ReviewIndex')->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}

		$entry = Review::getEntries($id, null);

		if ($entry['status'] == 0)
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}

		if (!is_object($entry['entry']))
		{
			return Redirect::route('ReviewIndex')->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}
  
		$destroy = $this->repo->destroy($id);

		if ($destroy['status'] == 1)
		{
			return Redirect::back()->with('success_message', Lang::get('core.msg_success_review_deactivated'));
		}
		else
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_deactivating_review'));
		}
	}


}
