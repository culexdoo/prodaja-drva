<?php

/*
*	FrontendController
*
*	Handles frontend functions
*/

class FrontendController extends \CoreController {

	// Enviroment variables
	protected $repo;
	protected $moduleInfo;



	// Constructing default values
	public function __construct()
	{
		// Call CoreController constructor to get Layout and other variables
		parent::__construct();

		// Make module variables
		$this->repo = new FrontendRepository;
 
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function index()
	{

		// Getting all regions
			$regionslist = array();

			$regions = Region::getEntries();

			if ($regions['status'] == 0)
			{
				return Redirect::route('getLanding')->with('error_message', Lang::get('core.msg_error_getting_entries'));
			}
			foreach ($regions['entries'] as $regions)
			{
				$regionslist[$regions->id] = $regions->name;

			}


			// Getting all cities
			$woodlist = array();

		 	$wood = Wood::getEntries(null, null);

		 	if ($wood['status'] == 0)
			{
				return Redirect::route('getlanding')->with('error_message', Lang::get('core.msg_error_getting_entries'));
			}

			foreach ($wood['entries'] as $wood)
			{
				$woodlist[$wood->id] = $wood->name;
			}

			/* Magic */
		  	$wood = Input::get('wood');
		    $region = Input::get('region');
		    $packaging = Input::get('packaging');
		    $ads = $entry = DB::table('ads')
				->join('users', 'ads.user', '=', 'users.id')
				->join('region', 'ads.region', '=', 'region.id')
				->join('wood', 'ads.wood', '=', 'wood.id')
				->join('packaging', 'ads.packaging', '=', 'packaging.id')
				->select(
					'ads.id AS id', 
					'ads.title AS title',
					'ads.permalink AS permalink',
					'ads.wood AS wood',
					'ads.packaging AS packaging',
					'ads.price AS price',
					'ads.description AS description',
					'ads.user AS user',
					'ads.region AS region',
					'ads.city AS city',
					'ads.published AS published',
					'ads.featured AS featured',
					'ads.image AS image',
					'ads.created_at AS created_at',
					'users.email AS email',
					'users.username AS username',
					'region.name AS regionname',
					'wood.name AS woodname',
					'wood.permalink AS woodpermalink',
					'packaging.name AS packagingname'
				)
			->where('ads.published', 'LIKE', '1')
			->where('region.id', 'LIKE', '%'.$region.'%')
			->where('packaging.id', 'LIKE', ''.$packaging.'%')
			->where('wood.id', 'LIKE', ''.$wood.'%')
			->orderBy('id', 'ASC')
			->paginate(10);

			
		    $wood = mb_strtolower($wood, 'UTF-8');

		    $packaging = mb_strtolower($packaging, 'UTF-8');

		    $entry = $ads;
		
	 
		$this->layout->title = 'Prodaja drva';

		$featuredads = Ads::getEntries(null, null, null, true, true, 4, null, null, null, null, null, null);

		$publishedads = Ads::getEntries(null, null, null, true, null, 10, null, null, null, null, null, null);

		$countactiveads = Ads::getEntries(null, null, null, null, null, null, null, null, null, null, null, null, true);

		$countnewads = Ads::getEntries(null, null, null, null, null, null, null, null, null, null, null, true);

		$countactiveusers = Users::getEntries(null, null, null, null, true);

		$this->layout->css_files = array(

		);


		$this->layout->js_footer_files = array(

		);

		$this->layout->content = View::make('frontend.index', array('featuredads' => $featuredads, 'publishedads' => $publishedads, 'countactiveads' => $countactiveads['entry'], 'countactiveusers' => $countactiveusers['entry'], 'countnewads' => $countnewads['entry'], 'postRoute' => 'SearchAds', 'woodlist' => $woodlist, 'regionslist' => $regionslist, 'ads' => $ads));
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
		//
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


	/**
	 *	Sign in / out segment
	 * 	@return Response
	 */

	// Sign in page.

	public function getSignIn()
	{
		$this->layout->title = 'Prijava | Prodaja drva';

 		$this->layout->css_files = array( 
 			'css/frontend/custom.css'

		);
		$this->layout->js_footer_files = array( 


		);
		$this->layout->content = View::make('frontend.sign-in', array('postSignIn'));

	}

	// Post sign in

	public function postSignIn()
	{
		Input::merge(array_map('trim', Input::all()));

		if (Auth::attempt(array('email' => Input::get('email'), 'password' => Input::get('password'))))
		{
			$user_language = 'en';

			Session::put('lang', $user_language);

			App::setLocale($user_language);

			return Redirect::route('getLanding')->with('success_message', Lang::get('messages.sign_in_success'));

		}
		else
		{
			return Redirect::back()->with('error_message', Lang::get('messages.sign_in_error'))->withInput();
		}
	}


	// Do the sign out

	public function signout()
	{
		if (Auth::check())
		{
			Auth::logout();
			Session::flush();

			return Redirect::route('getLanding')->with('info_message', Lang::get('messages.sign_out_success'));

		}

		else
		{
			return Redirect::route('getSignIn')->with('info_message', Lang::get('messages.sign_out_resign'));
		}

	}

	// Shows password recovery page

	public function passwordRecovery() {

		$this->layout->title = 'Prodaja drva | Vraćanje lozinke';

		$this->layout->css_files = array(

			);

		$this->layout->js_footer_files = array(

			);

		$this->layout->content = View::make('frontend.password-recovery', array('postRoute' => 'postForgotPassword'));

	}


	// Submit forgot password

	public function postForgotPassword()
	{
		$response = Password::remind(Input::only('email'), function($message)
		{
			$message->subject(Lang::get('forgotPassword.password_reset_email_title'));
		});

		switch ($response)
		{
			case Password::INVALID_USER:
				return Redirect::back()->with('error_message', Lang::get($response));
				break;

			case Password::REMINDER_SENT:
				return Redirect::back()->with('success_message', Lang::get($response));
				break;
		}
	}


	/*
	 *	Register segment
	 */

	// Show register page

	public function getRegistration()
	{ 


		$regionlist = array();
	 	$region = Region::getEntries(null, null);
	 	
		if ($region['status'] == 0)
		{
			return Redirect::route('getLanding')->with('error_message', Lang::get('core.msg_error_getting_entries'));
		}
		foreach ($region['entries'] as $region)
		{
			$regionlist[$region->id] = $region->name;
		}

		$citylist = array();
	 	$city = City::getEntries(null, null);
	 	
		if ($city['status'] == 0)
		{
			return Redirect::route('getLanding')->with('error_message', Lang::get('core.msg_error_getting_entries'));
		}
		foreach ($city['entries'] as $city)
		{
			$citylist[$city->id] = $city->name;
		}

		$this->layout->title = 'Registracija | Prodaja drva';

 		$this->layout->css_files = array( 
 			'css/frontend/registration.css'

		);
		$this->layout->js_footer_files = array( 
		);
		$this->layout->content = View::make('frontend.registration', array('postRoute' => 'postRegister', 'regionlist' => $regionlist, 'citylist' => $citylist));
	}



	// Post register

	public function postRegister()
	{
		Input::merge(array_map('trim', Input::all()));

		$userValidator = Validator::make(Input::all(), Users::$register_rules);

		if ($userValidator->fails())
		{
			return Redirect::back()->with('error_message', Lang::get('messages.error_validating_registration'))->withErrors($userValidator)->withInput();
		}

		$tryNewUser = $this->repo->registerUser(Input::get('first_name'), Input::get('last_name'), Input::get('region'), Input::get('city'), Input::get('email'), Input::get('username'), Input::get('password'));

		if ($tryNewUser['status'] == 0)
		{
			return Redirect::back()->with('error_message', Lang::get('messages.error_creating_new_user'))->withErrors($userValidator)->withInput();
		}

		if (Auth::attempt(array('email' => Input::get('email'), 'password' => Input::get('password'))))
		{
			Mail::send('emails.register', array('name' => Input::get('first_name'), 'password' => Input::get('password')), function($message)
			{
				$message->from('info@culex.hr', 'Prodaja drva+');
				$message->subject('Hvala na registraciji');
				$message->to(Input::get('email'));
			});

 
		 
		    return Redirect::intended('/')->with('success_message', Lang::get('messages.sign_in_success'));
	 

			Session::put('lang', 'hr');
			App::setLocale('hr');

			return Redirect::intended('/')->with('success_message', Lang::get('messages.sign_in_success'));
		}
		else
		{
			return Redirect::back()->with('error_message', Lang::get('messages.sign_in_error'))->withInput();
		}
	}


	// E-mail verification

	public function getVerifyEmail()
	{
		if (Input::has('email') && Input::has('code'))
		{
			$verification = $this->repo->verifyEmail(Input::get('email'), Input::get('code'));

			if ($verification['status'] == 1)
			{
				if ($verification['verified'] == true)
				{
					return Redirect::route('getLanding')->with('success_message', Lang::get('messages.success_verified_email'));
				}
			}
		}

		return Redirect::route('getLanding')->with('error_message', Lang::get('messages.error_validating_email'));
	}

	// Post reset password

	public function postResetPassword()
	{
		$credentials = Input::only(
			'email', 'password', 'password_confirmation', 'token'
		);

		$response = Password::reset($credentials, function($user, $password)
		{
			$user->password = Hash::make($password);

			$user->save();
		});

		switch ($response)
		{
			case Password::INVALID_PASSWORD:
			case Password::INVALID_TOKEN:
			case Password::INVALID_USER:
				return Redirect::back()->with('error_message', Lang::get($response));
				break;

			case Password::PASSWORD_RESET:
				return Redirect::route('getLanding')->with('success_message', Lang::get('messages.success_changed_password'));
				break;
		}
	}


	/*
	 *	User profile page
	 */

	public function UserProfile($permalink) {



		$entry = Users::getEntries(null, null, $permalink, null);

		$city = $entry['entry']->city;

		$city = City::getEntries($city, null);

		$region = $entry['entry']->region;

		$region = Region::getEntries($region, null);

		$user = $entry['entry']->id;

		$userads = Ads::getEntries(null, null, $user, true, null, null, null, null, null, null, null, null, null);

		$reviews = Review::getEntries(null, null, $user, true);

		$featuredads = Ads::getEntries(null, null, null, true, true, 4, null);

		if (is_null($entry['entry'])) {

			return Redirect::route('getLanding')->with('error_message', Lang::get('core.user_not_found'));
		}

		if ($entry['status'] == 0)
		{
			return Redirect::route('getLanding')->with('error_message', Lang::get('core.msg_error_getting_entries'));
		}

		$this->layout->title = 'Profil korisnika' . ' ' . $entry['entry']->username .' | Prodaja drva';

		$this->layout->css_files = array(

			);

		$this->layout->js_footer_files = array(

			);

		$this->layout->content = View::make('frontend.user-profile', array('entry' => $entry{'entry'}, 'city' => $city['entry'], 'region' => $region['entry'], 'userads' => $userads['entries'], 'featuredads' => $featuredads, 'reviews' => $reviews['entries'], 'postRoute' => 'ReviewStore'));

	}

	/*
	 *	My profile segment
	 */


	// Shows my profile page

	public function MyProfile($id) {

		// - CHECK IF USER IS LOGGED IN - //
		if (Auth::check())
		{
			$user = User::getUserInfos(Auth::user()->id);

			if ($user['status'] == 0)
			{
				return Redirect::route('getLanding')->with('error_message', Lang::get('messages.not_logged_in'));
			}

			if ($user['user']->id != $id) {
				return Redirect::route('getLanding')->with('error_message', Lang::get('messages.unauthorized_access'));
			}
			
		} else {

			return Redirect::route('getLanding')->with('error_message', Lang::get('messages.not_logged_in'));
			
		}
		// - AUTHORITY CHECK ENDS HERE - //

		$entry = Users::getEntries($id, null, null, null);

		$city = $entry['entry']->city;

		$city = City::getEntries($city, null);

		$region = $entry['entry']->region;

		$region = Region::getEntries($region, null);

		$user = $entry['entry']->id;

		$userads = Ads::getEntries(null, null, $user, null, null, null, null, null, null, null, null, null);

		$featuredads = Ads::getEntries(null, null, null, true, true, 4, null, null, null, null, null, null);

		$this->layout->title = 'Moj profil | Prodaja drva';

		$this->layout->css_files = array(

			);

		$this->layout->js_footer_files = array(

			);

		$this->layout->content = View::make('frontend.my-profile', array('entry' => $entry['entry'], 'city' => $city['entry'], 'region' => $region['entry'], 'userads' => $userads['entries'], 'featuredads' => $featuredads));

	}

	// Shows edit my profile page by users id

	public function EditMyProfile($id) {

		$regionlist = array();
	 	$region = Region::getEntries(null, null);
	 	
		if ($region['status'] == 0)
		{
			return Redirect::route('getLanding')->with('error_message', Lang::get('core.msg_error_getting_entries'));
		}
		foreach ($region['entries'] as $region)
		{
			$regionlist[$region->id] = $region->name;
		}

		$citylist = array();
	 	$city = City::getEntries(null, null);
	 	
		if ($city['status'] == 0)
		{
			return Redirect::route('getLanding')->with('error_message', Lang::get('core.msg_error_getting_entries'));
		}
		foreach ($city['entries'] as $city)
		{
			$citylist[$city->id] = $city->name;
		}

		$entry = Users::getEntries($id, null, null);

		$this->layout->title = 'Moj profil | Prodaja drva';

		$this->layout->css_files = array(

			);

		$this->layout->js_footer_files = array(

			);

		$this->layout->content = View::make('frontend.my-profile-edit', array('postRoute' =>  'UpdateMyProfile', 'entry' => $entry['entry'], 'regionlist' => $regionlist, 'citylist' => $citylist));

	}


	// Updates my profile by users id

	public function UpdateMyProfile($id)
	{
		Input::merge(array_map('trim', Input::all()));

		$entryValidator = Validator::make(Input::all(), Users::$store_rules);

		if ($entryValidator->fails())
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_validating_entry'))->withErrors($entryValidator)->withInput();
		}

		$update = $this->repo->UpdateMyProfile(
			Input::get('id'),
			Input::get('permalink'),
			Input::get('user_info'),
			Input::get('first_name'),
			Input::get('last_name'),
			Input::get('username'),
			Input::get('email'),
			Input::get('city'),
			Input::get('contact1'),
			Input::get('region'),
			Input::get('contact2'),
			Input::get('date_of_birth'),
			Input::file('image')
		);

		if ($update['status'] == 0)
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_adding_entry'))->withErrors($entryValidator)->withInput();
		}
		else
		{
			return Redirect::route('getLanding')->with('success_message', Lang::get('core.msg_success_entry_added', array('name' => Input::get('name'))));
		}
	}


	/*
	 *	Show, Create, edit, update, destroy ads segment
	 */

	// Shows specific ad by permalink

	public function ShowAd($permalink) {


		// Getting all regions
		$regionslist = array();

		$regions = Region::getEntries();

		if ($regions['status'] == 0)
		{
			return Redirect::route('getLanding')->with('error_message', Lang::get('core.msg_error_getting_entries'));
		}
		foreach ($regions['entries'] as $regions)
		{
			$regionslist[$regions->id] = $regions->name;

		}

		
		// Getting all cities
		$woodlist = array();

	 	$wood = Wood::getEntries(null, null);

	 	if ($wood['status'] == 0)
		{
			return Redirect::route('getlanding')->with('error_message', Lang::get('core.msg_error_getting_entries'));
		}

		foreach ($wood['entries'] as $wood)
		{
			$woodlist[$wood->id] = $wood->name;
		}


		// Getting all packaging 
		$packaginglist = array();

	 	$packaging = Packaging::getEntries(null, null);

	 	if ($packaging['status'] == 0)
		{
			return Redirect::route('getlanding')->with('error_message', Lang::get('core.msg_error_getting_entries'));
		}

		foreach ($packaging['entries'] as $packaging)
		{
			$packaginglist[$packaging->id] = $packaging->name;
		}


			/* Magic */
	  	$wood = Input::get('wood');
	    $region = Input::get('region');
	    $packaging = Input::get('packaging');
	    $ads = $entry = DB::table('ads')
			->join('users', 'ads.user', '=', 'users.id')
			->join('region', 'ads.region', '=', 'region.id')
			->join('wood', 'ads.wood', '=', 'wood.id')
			->join('packaging', 'ads.packaging', '=', 'packaging.id')
			->select(
				'ads.id AS id', 
				'ads.title AS title',
				'ads.permalink AS permalink',
				'ads.wood AS wood',
				'ads.packaging AS packaging',
				'ads.price AS price',
				'ads.description AS description',
				'ads.user AS user',
				'ads.region AS region',
				'ads.city AS city',
				'ads.published AS published',
				'ads.featured AS featured',
				'ads.image AS image',
				'ads.created_at AS created_at',
				'users.email AS email',
				'users.username AS username',
				'region.name AS regionname',
				'wood.name AS woodname',
				'wood.permalink AS woodpermalink',
				'packaging.name AS packagingname'
			)
		->where('ads.published', 'LIKE', '1')
		->where('region.id', 'LIKE', '%'.$region.'%')
		->where('packaging.id', 'LIKE', ''.$packaging.'%')
		->where('wood.id', 'LIKE', ''.$wood.'%')
		->orderBy('id', 'ASC')
		->paginate(10);

		
	    $wood = mb_strtolower($wood, 'UTF-8');

	    $packaging = mb_strtolower($packaging, 'UTF-8');


		$entry = Ads::getEntries(null, $permalink, null, null, null, null, null);

 		if (is_null($entry['entry'])) {

			return Redirect::route('getLanding')->with('error_message', Lang::get('core.user_not_found'));

		}

		if ($entry['status'] == 0)
		{
			return Redirect::route('getLanding')->with('error_message', Lang::get('core.msg_error_getting_entries'));
		}

  		$user = $entry['entry']->user;

		$user = Users::getEntries($user, null);

		$region = $entry['entry']->region;

		$region = Region::getEntries($region,null);



		$this->layout->title = $entry['entry']->title .' | Prodaja drva';

		$this->layout->css_files = array(
		);

		$this->layout->js_footer_files = array(
		);

		$this->layout->content = View::make('frontend.single-ad', array('entry' => $entry['entry'], 'user' => $user['entry'], 'region' => $region['entry'], 'postRoute' => 'SearchAds', 'packaginglist' => $packaginglist, 'woodlist' => $woodlist, 'regionslist' => $regionslist, 'ads' => $ads ));
	}


	// Shows listing of all ads by specific wood category

	public function listadsbywoodcategory($woodcategory) {

		$wood = Wood::getEntries(null, null, $woodcategory);

		$wood = $wood['entry']->id;

		$entries = Ads::getEntries(null, null, null, true, null, null, null, $wood, null, null, null, null, null);
		
		$featuredads = Ads::getEntries(null, null, null, true, true, 4, null);

		// Getting all regions
		$regionslist = array();

		$regions = Region::getEntries();

		if ($regions['status'] == 0)
		{
			return Redirect::route('getLanding')->with('error_message', Lang::get('core.msg_error_getting_entries'));
		}
		foreach ($regions['entries'] as $regions)
		{
			$regionslist[$regions->id] = $regions->name;

		}
		
		// Getting all cities
		$woodlist = array();

	 	$wood = Wood::getEntries(null, null);

	 	if ($wood['status'] == 0)
		{
			return Redirect::route('getlanding')->with('error_message', Lang::get('core.msg_error_getting_entries'));
		}

		foreach ($wood['entries'] as $wood)
		{
			$woodlist[$wood->id] = $wood->name;
		}


		// Getting all packaging 
		$packaginglist = array();

	 	$packaging = Packaging::getEntries(null, null);

	 	if ($packaging['status'] == 0)
		{
			return Redirect::route('getlanding')->with('error_message', Lang::get('core.msg_error_getting_entries'));
		}

		foreach ($packaging['entries'] as $packaging)
		{
			$packaginglist[$packaging->id] = $packaging->name;
		}


			/* Magic */
	  	$wood = Input::get('wood');
	    $region = Input::get('region');
	    $packaging = Input::get('packaging');
	    $ads = $entry = DB::table('ads')
			->join('users', 'ads.user', '=', 'users.id')
			->join('region', 'ads.region', '=', 'region.id')
			->join('wood', 'ads.wood', '=', 'wood.id')
			->join('packaging', 'ads.packaging', '=', 'packaging.id')
			->select(
				'ads.id AS id', 
				'ads.title AS title',
				'ads.permalink AS permalink',
				'ads.wood AS wood',
				'ads.packaging AS packaging',
				'ads.price AS price',
				'ads.description AS description',
				'ads.user AS user',
				'ads.region AS region',
				'ads.city AS city',
				'ads.published AS published',
				'ads.featured AS featured',
				'ads.image AS image',
				'ads.created_at AS created_at',
				'users.email AS email',
				'users.username AS username',
				'region.name AS regionname',
				'wood.name AS woodname',
				'wood.permalink AS woodpermalink',
				'packaging.name AS packagingname'
			)
		->where('ads.published', 'LIKE', '1')
		->where('region.id', 'LIKE', '%'.$region.'%')
		->where('packaging.id', 'LIKE', ''.$packaging.'%')
		->where('wood.id', 'LIKE', ''.$wood.'%')
		->orderBy('id', 'ASC')
		->paginate(10);

		
	    $wood = mb_strtolower($wood, 'UTF-8');

	    $packaging = mb_strtolower($packaging, 'UTF-8');

	    goDie($wood);

		$this->layout->title = 'Prodaja drva | Lista oglasa';

		$this->layout->css_files = array(

			);

		$this->layout->js_footer_files = array(

			);

		$this->layout->content = View::make('frontend.ad-list', array('entries' => $entries['entries'], 'featuredads' => $featuredads, 'postRoute' => 'SearchAds', 'packaginglist' => $packaginglist, 'woodlist' => $woodlist, 'regionslist' => $regionslist, 'packaging' => $packaging, 'wood' => $wood));

		

	}

	// Shows listing of all ads by specific wood category

	public function listadsbyregion($region) {

		$region = Region::getEntries(null, null, $region);

		$region = $region['entry']->id;

		$entries = Ads::getEntries(null, null, null, true, null, null, null, null, $region, null);
		
		$featuredads = Ads::getEntries(null, null, null, true, true, 4, null);

		// Getting all regions
		$regionslist = array();

		$regions = Region::getEntries();

		if ($regions['status'] == 0)
		{
			return Redirect::route('getLanding')->with('error_message', Lang::get('core.msg_error_getting_entries'));
		}
		foreach ($regions['entries'] as $regions)
		{
			$regionslist[$regions->id] = $regions->name;

		}
		
		// Getting all cities
		$woodlist = array();

	 	$wood = Wood::getEntries(null, null);

	 	if ($wood['status'] == 0)
		{
			return Redirect::route('getlanding')->with('error_message', Lang::get('core.msg_error_getting_entries'));
		}

		foreach ($wood['entries'] as $wood)
		{
			$woodlist[$wood->id] = $wood->name;
		}


		// Getting all packaging 
		$packaginglist = array();

	 	$packaging = Packaging::getEntries(null, null);

	 	if ($packaging['status'] == 0)
		{
			return Redirect::route('getlanding')->with('error_message', Lang::get('core.msg_error_getting_entries'));
		}

		foreach ($packaging['entries'] as $packaging)
		{
			$packaginglist[$packaging->id] = $packaging->name;
		}


			/* Magic */
	  	$wood = Input::get('wood');
	    $region = Input::get('region');
	    $packaging = Input::get('packaging');
	    $ads = $entry = DB::table('ads')
			->join('users', 'ads.user', '=', 'users.id')
			->join('region', 'ads.region', '=', 'region.id')
			->join('wood', 'ads.wood', '=', 'wood.id')
			->join('packaging', 'ads.packaging', '=', 'packaging.id')
			->select(
				'ads.id AS id', 
				'ads.title AS title',
				'ads.permalink AS permalink',
				'ads.wood AS wood',
				'ads.packaging AS packaging',
				'ads.price AS price',
				'ads.description AS description',
				'ads.user AS user',
				'ads.region AS region',
				'ads.city AS city',
				'ads.published AS published',
				'ads.featured AS featured',
				'ads.image AS image',
				'ads.created_at AS created_at',
				'users.email AS email',
				'users.username AS username',
				'region.name AS regionname',
				'wood.name AS woodname',
				'wood.permalink AS woodpermalink',
				'packaging.name AS packagingname'
			)
		->where('ads.published', 'LIKE', '1')
		->where('region.id', 'LIKE', '%'.$region.'%')
		->where('packaging.id', 'LIKE', ''.$packaging.'%')
		->where('wood.id', 'LIKE', ''.$wood.'%')
		->orderBy('id', 'ASC')
		->paginate(10);

		
	    $wood = mb_strtolower($wood, 'UTF-8');

	    $packaging = mb_strtolower($packaging, 'UTF-8');

		$this->layout->title = 'Prodaja drva | Lista oglasa';

		$this->layout->css_files = array(

			);

		$this->layout->js_footer_files = array(

			);

		$this->layout->content = View::make('frontend.ad-list', array('entries' => $entries['entries'], 'featuredads' => $featuredads, 'postRoute' => 'SearchAds', 'packaginglist' => $packaginglist, 'woodlist' => $woodlist, 'regionslist' => $regionslist));
	}

	// Shows listing of all ads

	public function AdList() {

		// Getting all regions
			$regionslist = array();


			$regions = Region::getEntries();

			if ($regions['status'] == 0)
			{
				return Redirect::route('getLanding')->with('error_message', Lang::get('core.msg_error_getting_entries'));
			}
			foreach ($regions['entries'] as $regions)
			{
				$regionslist[$regions->id] = $regions->name;

			}

	 		
			// Getting all cities
			$woodlist = array();

		 	$wood = Wood::getEntries(null, null);

		 	if ($wood['status'] == 0)
			{
				return Redirect::route('getlanding')->with('error_message', Lang::get('core.msg_error_getting_entries'));
			}

			foreach ($wood['entries'] as $wood)
			{
				$woodlist[$wood->id] = $wood->name;
			}


			// Getting all packaging 
			$packaginglist = array();

		 	$packaging = Packaging::getEntries(null, null);

		 	if ($packaging['status'] == 0)
			{
				return Redirect::route('getlanding')->with('error_message', Lang::get('core.msg_error_getting_entries'));
			}

			foreach ($packaging['entries'] as $packaging)
			{
				$packaginglist[$packaging->id] = $packaging->name;
			}


  			/* Magic */
		  	$wood = Input::get('wood');
		    $region = Input::get('region');
		    $packaging = Input::get('packaging');
		    $ads = $entry = DB::table('ads')
				->join('users', 'ads.user', '=', 'users.id')
				->join('region', 'ads.region', '=', 'region.id')
				->join('wood', 'ads.wood', '=', 'wood.id')
				->join('packaging', 'ads.packaging', '=', 'packaging.id')
				->select(
					'ads.id AS id', 
					'ads.title AS title',
					'ads.permalink AS permalink',
					'ads.wood AS wood',
					'ads.packaging AS packaging',
					'ads.price AS price',
					'ads.description AS description',
					'ads.user AS user',
					'ads.region AS region',
					'ads.city AS city',
					'ads.published AS published',
					'ads.featured AS featured',
					'ads.image AS image',
					'ads.created_at AS created_at',
					'users.email AS email',
					'users.username AS username',
					'region.name AS regionname',
					'wood.name AS woodname',
					'wood.permalink AS woodpermalink',
					'packaging.name AS packagingname'
				)
			->where('ads.published', 'LIKE', '1')
			->where('region.name', 'LIKE', '%'.$region.'%')
			->where('packaging.name', 'LIKE', ''.$packaging.'%')
			->where('wood.name', 'LIKE', ''.$wood.'%')
			->orderBy('id', 'ASC')
			->paginate(10);


		    $wood = mb_strtolower($wood, 'UTF-8');

		    $packaging = mb_strtolower($packaging, 'UTF-8');

		    $entry = Ads::getEntries(null, null, null, true, null, null, null, null, null, null, null, null);

			$featuredads = Ads::getEntries(null, null, null, true, true, 4, null, null, null, null, null, null);


	 		$this->layout->title = 'Oglasi | Prodaja drva';

			$this->layout->css_files = array(

			);

			$this->layout->js_footer_files = array(

				);

            //return display search result to user by using a view
            $this->layout->content = View::make('frontend.ad-list', array('entries' => $entry['entries'], 'featuredads' => $featuredads, 'postRoute' => 'SearchAds', 'packaginglist' => $packaginglist, 'woodlist' => $woodlist, 'regionslist' => $regionslist, 'ads' => $ads));
	}

	// Searches ads by parameters

	public function searchads () {

  			// Getting all regions
			$regionslist = array();

			$regions = Region::getEntries();

			if ($regions['status'] == 0)
			{
				return Redirect::route('getLanding')->with('error_message', Lang::get('core.msg_error_getting_entries'));
			}
			foreach ($regions['entries'] as $regions)
			{
				$regionslist[$regions->id] = $regions->name;

			}

			
			// Getting all cities
			$woodlist = array();

		 	$wood = Wood::getEntries(null, null);

		 	if ($wood['status'] == 0)
			{
				return Redirect::route('getlanding')->with('error_message', Lang::get('core.msg_error_getting_entries'));
			}

			foreach ($wood['entries'] as $wood)
			{
				$woodlist[$wood->id] = $wood->name;
			}


			// Getting all packaging 
			$packaginglist = array();

		 	$packaging = Packaging::getEntries(null, null);

		 	if ($packaging['status'] == 0)
			{
				return Redirect::route('getlanding')->with('error_message', Lang::get('core.msg_error_getting_entries'));
			}

			foreach ($packaging['entries'] as $packaging)
			{
				$packaginglist[$packaging->id] = $packaging->name;
			}


  			/* Magic */
		  	$wood = Input::get('wood');
		    $region = Input::get('region');
		    $packaging = Input::get('packaging');
		    $ads = $entry = DB::table('ads')
				->join('users', 'ads.user', '=', 'users.id')
				->join('region', 'ads.region', '=', 'region.id')
				->join('wood', 'ads.wood', '=', 'wood.id')
				->join('packaging', 'ads.packaging', '=', 'packaging.id')
				->select(
					'ads.id AS id', 
					'ads.title AS title',
					'ads.permalink AS permalink',
					'ads.wood AS wood',
					'ads.packaging AS packaging',
					'ads.price AS price',
					'ads.description AS description',
					'ads.user AS user',
					'ads.region AS region',
					'ads.city AS city',
					'ads.published AS published',
					'ads.featured AS featured',
					'ads.image AS image',
					'ads.created_at AS created_at',
					'users.email AS email',
					'users.username AS username',
					'region.name AS regionname',
					'wood.name AS woodname',
					'wood.permalink AS woodpermalink',
					'packaging.name AS packagingname'
				)
			->where('ads.published', 'LIKE', '1')
			->where('region.id', 'LIKE', '%'.$region.'%')
			->where('packaging.id', 'LIKE', ''.$packaging.'%')
			->where('wood.id', 'LIKE', ''.$wood.'%')
			->orderBy('id', 'ASC')
			->paginate(10);

			
		    $wood = mb_strtolower($wood, 'UTF-8');

		    $packaging = mb_strtolower($packaging, 'UTF-8');

		    $entry = $ads;

			$featuredads = Ads::getEntries(null, null, null, true, true, 4, null, null, null, null, null, null);

			$woodname = Wood::getEntries($wood, null, null);

			$packagingname = Packaging::getEntries($packaging, null, null);


	 		$this->layout->title = 'Rezultati pretrage upita ' . $woodname['entry']->permalink . ' ' . $packagingname['entry']->permalink . ' ' . $region . ' | Prodaja drva';

			$this->layout->description = 'Pretraga upita za ' . $woodname['entry']->permalink . ' ' . $packagingname['entry']->permalink . ' ' . $region;

			$this->layout->keywords = $woodname['entry']->permalink . ',' . $packagingname['entry']->permalink . ',' . $region;

			$this->layout->css_files = array(

			);

			$this->layout->js_footer_files = array(

				);

            //return display search result to user by using a view
            $this->layout->content = View::make('frontend.ad-list', array('entries' => $entry, 'featuredads' => $featuredads, 'postRoute' => 'SearchAds', 'packaginglist' => $packaginglist, 'woodlist' => $woodlist, 'regionslist' => $regionslist, 'ads' => $ads));
	}


	// Show create-ad page

	public function CreateAd()
	{ 

		$regionlist = array();
	 	$region = Region::getEntries(null, null);
	 	
		if ($region['status'] == 0)
		{
			return Redirect::route('getLanding')->with('error_message', Lang::get('core.msg_error_getting_entries'));
		}
		foreach ($region['entries'] as $region)
		{
			$regionlist[$region->id] = $region->name;
		}


		$citylist = array();
	 	$city = City::getEntries(null, null);
	 	
		if ($city['status'] == 0)
		{
			return Redirect::route('getLanding')->with('error_message', Lang::get('core.msg_error_getting_entries'));
		}
		foreach ($city['entries'] as $city)
		{
			$citylist[$city->id] = $city->name;
		}


		$woodlist = array();
	 	$wood = Wood::getEntries(null, null); 
		if ($wood['status'] == 0)
		{
			return Redirect::route('getLanding')->with('error_message', Lang::get('core.msg_error_getting_entries'));
		}
		foreach ($wood['entries'] as $wood)
		{
			$woodlist[$wood->id] = $wood->name;
		}


		$packaginglist = array();
	 	$packaging = Packaging::getEntries(null, null); 
		if ($packaging['status'] == 0)
		{
			return Redirect::route('getLanding')->with('error_message', Lang::get('core.msg_error_getting_entries'));
		}
		foreach ($packaging['entries'] as $packaging)
		{
			$packaginglist[$packaging->id] = $packaging->name;
		}


		$entries = Ads::getEntries(null, null, null, null, null, null);

		$user = Users::getEntries(Auth::user()->id, null);


		$this->layout->title = 'Objavite oglas | Prodaja drva';
		
 		$this->layout->css_files = array( 

		);

		$this->layout->js_footer_files = array( 

		);

		$this->layout->content = View::make('frontend.create-ad', array('postRoute' =>  'adsStore', 'entries' => $entries['entries'], 'regionlist' => $regionlist, 'citylist' => $citylist, 'woodlist' => $woodlist, 'packaginglist' => $packaginglist, 'user' => $user['entry']));
	}

	// Storing ad in storage

	public function adsStore()
	{
		Input::merge(array_map('trim', Input::all()));

		$entryValidator = Validator::make(Input::all(), Ads::$store_rules);
		
		if ($entryValidator->fails())
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_validating_entry'))->withErrors($entryValidator)->withInput();
		}

		$store = $this->repo->adsStore( 
			Input::get('user'),
			Input::get('title'),
			Input::get('wood'),
			Input::get('packaging'),  
			Input::get('region'), 
			Input::get('city'),   
			Input::get('price'),
			Input::get('description'),
			Input::file('image'),
			Input::get('permalink'),
			Input::get('latitude'),
			Input::get('longitude')

		);
			
		if ($store['status'] == 0)
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_adding_entry'))->withErrors($entryValidator)->withInput();
		}
		else
		{
			return Redirect::route('CreateAd')->with('success_message', Lang::get('core.msg_success_entry_added', array('name' => Input::get('name'))));
		}
	}


	// Show edit-ad page

	public function EditAd($permalink)

	{ 
 
		$regionlist = array();
	 	$region = Region::getEntries(null, null);
	 	
		if ($region['status'] == 0)
		{
			return Redirect::route('getLanding')->with('error_message', Lang::get('core.msg_error_getting_entries'));
		}
		foreach ($region['entries'] as $region)
		{
			$regionlist[$region->id] = $region->name;
		}

		$citylist = array();
	 	$city = City::getEntries(null, null);
	 	
		if ($city['status'] == 0)
		{
			return Redirect::route('getLanding')->with('error_message', Lang::get('core.msg_error_getting_entries'));
		}
		foreach ($city['entries'] as $city)
		{
			$citylist[$city->id] = $city->name;
		}

		$woodlist = array();
	 	$wood = Wood::getEntries(null, null); 
		if ($wood['status'] == 0)
		{
			return Redirect::route('getLanding')->with('error_message', Lang::get('core.msg_error_getting_entries'));
		}
		foreach ($wood['entries'] as $wood)
		{
			$woodlist[$wood->id] = $wood->name;
		}

		$packaginglist = array();
	 	$packaging = Packaging::getEntries(null, null); 
		if ($packaging['status'] == 0)
		{
			return Redirect::route('getLanding')->with('error_message', Lang::get('core.msg_error_getting_entries'));
		}
		foreach ($packaging['entries'] as $packaging)
		{
			$packaginglist[$packaging->id] = $packaging->name;
		}

		
		$entry = Ads::getEntries(null, $permalink, null, null, null, null, null);

		$user = Users::getEntries(Auth::user()->id, null);
		
		$this->layout->title = 'Uredite oglas | Prodaja drva';
		
 		$this->layout->css_files = array( 

		);

		$this->layout->js_footer_files = array( 

		);

		$this->layout->content = View::make('frontend.edit-ad', array('postRoute' =>  'UpdateAd', 'entry' => $entry['entry'], 'regionlist' => $regionlist, 'citylist' => $citylist, 'woodlist' => $woodlist, 'packaginglist' => $packaginglist, 'user' => $user['entry']));
	}

	// Updating specific ad by id

	public function UpdateAd($id)
	{
		Input::merge(array_map('trim', Input::all()));
		
		$entryValidator = Validator::make(Input::all(), Ads::$update_rules);

		if ($entryValidator->fails())
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_validating_entry'))->withErrors($entryValidator)->withInput();
		}

		$update = $this->repo->UpdateAd(
			Input::get('id'),
			Input::get('user'),
			Input::get('title'),
			Input::get('wood'),
			Input::get('packaging'),  
			Input::get('region'), 
			Input::get('city'),   
			Input::get('price'),
			Input::get('description'),
			Input::file('image'),
			Input::get('permalink'),
			Input::get('latitude'),
			Input::get('longitude')
		);


		if ($update['status'] == 0)
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_adding_entry'))->withErrors($entryValidator)->withInput();
		}
		else
		{
			return Redirect::route('getLanding')->with('success_message', Lang::get('core.msg_success_entry_added', array('name' => Input::get('name'))));
		}
	}

	// Displays contact page

	public function contact() {

		$entries = inquiry::getEntries(null, null);

		$this->layout->title = 'Kontaktirajte nas | Prodaja drva';

		$this->layout->css_files = array(

			);

		$this->layout->js_footer_files = array(

			);

		$this->layout->content = View::make('frontend.contact', array('postRoute' => 'inquiryStore', 'entries' => $entries['entries']));

	}

	// Storing users inquiry in storage 

	public function inquiryStore()
	{
		Input::merge(array_map('trim', Input::all()));

		$entryValidator = Validator::make(Input::all(), Inquiry::$store_rules);
		
		if ($entryValidator->fails())
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_validating_entry'))->withErrors($entryValidator)->withInput();
		}

		$store = $this->repo->inquiryStore( 
			Input::get('first_name'),
			Input::get('last_name'),
			Input::get('contact'),
			Input::get('email'),
			Input::get('content') 
		);

		if ($store['status'] == 0)
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_adding_entry'))->withErrors($entryValidator)->withInput();
		}
		else
		{
			return Redirect::route('contact')->with('success_message', Lang::get('core.msg_success_entry_added', array('name' => Input::get('name'))));
		}
	}

	// Displays about page

	public function about() {

		// Getting all regions
		$regionslist = array();

		$regions = Region::getEntries();

		if ($regions['status'] == 0)
		{
			return Redirect::route('getLanding')->with('error_message', Lang::get('core.msg_error_getting_entries'));
		}
		foreach ($regions['entries'] as $regions)
		{
			$regionslist[$regions->id] = $regions->name;

		}

		
		// Getting all cities
		$woodlist = array();

	 	$wood = Wood::getEntries(null, null);

	 	if ($wood['status'] == 0)
		{
			return Redirect::route('getlanding')->with('error_message', Lang::get('core.msg_error_getting_entries'));
		}

		foreach ($wood['entries'] as $wood)
		{
			$woodlist[$wood->id] = $wood->name;
		}


		// Getting all packaging 
		$packaginglist = array();

	 	$packaging = Packaging::getEntries(null, null);

	 	if ($packaging['status'] == 0)
		{
			return Redirect::route('getlanding')->with('error_message', Lang::get('core.msg_error_getting_entries'));
		}

		foreach ($packaging['entries'] as $packaging)
		{
			$packaginglist[$packaging->id] = $packaging->name;
		}


			/* Magic */
	  	$wood = Input::get('wood');
	    $region = Input::get('region');
	    $packaging = Input::get('packaging');
	    $ads = $entry = DB::table('ads')
			->join('users', 'ads.user', '=', 'users.id')
			->join('region', 'ads.region', '=', 'region.id')
			->join('wood', 'ads.wood', '=', 'wood.id')
			->join('packaging', 'ads.packaging', '=', 'packaging.id')
			->select(
				'ads.id AS id', 
				'ads.title AS title',
				'ads.permalink AS permalink',
				'ads.wood AS wood',
				'ads.packaging AS packaging',
				'ads.price AS price',
				'ads.description AS description',
				'ads.user AS user',
				'ads.region AS region',
				'ads.city AS city',
				'ads.published AS published',
				'ads.featured AS featured',
				'ads.image AS image',
				'ads.created_at AS created_at',
				'users.email AS email',
				'users.username AS username',
				'region.name AS regionname',
				'wood.name AS woodname',
				'wood.permalink AS woodpermalink',
				'packaging.name AS packagingname'
			)
		->where('ads.published', 'LIKE', '1')
		->where('region.id', 'LIKE', '%'.$region.'%')
		->where('packaging.id', 'LIKE', ''.$packaging.'%')
		->where('wood.id', 'LIKE', ''.$wood.'%')
		->orderBy('id', 'ASC')
		->paginate(10);

		
	    $wood = mb_strtolower($wood, 'UTF-8');

	    $packaging = mb_strtolower($packaging, 'UTF-8');

		$this->layout->title = 'O nama | Prodaja drva';

		$this->layout->css_files = array(

			);

		$this->layout->js_footer_files = array(

			);

		$this->layout->content = View::make('frontend.about', array('postRoute' => 'SearchAds', 'packaginglist' => $packaginglist, 'woodlist' => $woodlist, 'regionslist' => $regionslist, 'ads' => $ads));



	}

	// Shows uvjeti-koristenja page

	public function uvjetikoristenja() {

		// Getting all regions
		$regionslist = array();

		$regions = Region::getEntries();

		if ($regions['status'] == 0)
		{
			return Redirect::route('getLanding')->with('error_message', Lang::get('core.msg_error_getting_entries'));
		}
		foreach ($regions['entries'] as $regions)
		{
			$regionslist[$regions->id] = $regions->name;

		}

		
		// Getting all cities
		$woodlist = array();

	 	$wood = Wood::getEntries(null, null);

	 	if ($wood['status'] == 0)
		{
			return Redirect::route('getlanding')->with('error_message', Lang::get('core.msg_error_getting_entries'));
		}

		foreach ($wood['entries'] as $wood)
		{
			$woodlist[$wood->id] = $wood->name;
		}


		// Getting all packaging 
		$packaginglist = array();

	 	$packaging = Packaging::getEntries(null, null);

	 	if ($packaging['status'] == 0)
		{
			return Redirect::route('getlanding')->with('error_message', Lang::get('core.msg_error_getting_entries'));
		}

		foreach ($packaging['entries'] as $packaging)
		{
			$packaginglist[$packaging->id] = $packaging->name;
		}


			/* Magic */
	  	$wood = Input::get('wood');
	    $region = Input::get('region');
	    $packaging = Input::get('packaging');
	    $ads = $entry = DB::table('ads')
			->join('users', 'ads.user', '=', 'users.id')
			->join('region', 'ads.region', '=', 'region.id')
			->join('wood', 'ads.wood', '=', 'wood.id')
			->join('packaging', 'ads.packaging', '=', 'packaging.id')
			->select(
				'ads.id AS id', 
				'ads.title AS title',
				'ads.permalink AS permalink',
				'ads.wood AS wood',
				'ads.packaging AS packaging',
				'ads.price AS price',
				'ads.description AS description',
				'ads.user AS user',
				'ads.region AS region',
				'ads.city AS city',
				'ads.published AS published',
				'ads.featured AS featured',
				'ads.image AS image',
				'ads.created_at AS created_at',
				'users.email AS email',
				'users.username AS username',
				'region.name AS regionname',
				'wood.name AS woodname',
				'wood.permalink AS woodpermalink',
				'packaging.name AS packagingname'
			)
		->where('ads.published', 'LIKE', '1')
		->where('region.id', 'LIKE', '%'.$region.'%')
		->where('packaging.id', 'LIKE', ''.$packaging.'%')
		->where('wood.id', 'LIKE', ''.$wood.'%')
		->orderBy('id', 'ASC')
		->paginate(10);

		
	    $wood = mb_strtolower($wood, 'UTF-8');

	    $packaging = mb_strtolower($packaging, 'UTF-8');

		$this->layout->title = 'Uvjeti korištenja | Prodaja drva';

		$this->layout->css_files = array(

			);

		$this->layout->js_footer_files = array(

			);

		$this->layout->content = View::make('frontend.uvjeti-koristenja', array('postRoute' => 'SearchAds', 'packaginglist' => $packaginglist, 'woodlist' => $woodlist, 'regionslist' => $regionslist, 'ads' => $ads));

	}


	// Shows izjava-o-privatnosti page

	public function izjavaoprivatnosti() {

		// Getting all regions
		$regionslist = array();

		$regions = Region::getEntries();

		if ($regions['status'] == 0)
		{
			return Redirect::route('getLanding')->with('error_message', Lang::get('core.msg_error_getting_entries'));
		}
		foreach ($regions['entries'] as $regions)
		{
			$regionslist[$regions->id] = $regions->name;

		}

		
		// Getting all cities
		$woodlist = array();

	 	$wood = Wood::getEntries(null, null);

	 	if ($wood['status'] == 0)
		{
			return Redirect::route('getlanding')->with('error_message', Lang::get('core.msg_error_getting_entries'));
		}

		foreach ($wood['entries'] as $wood)
		{
			$woodlist[$wood->id] = $wood->name;
		}


		// Getting all packaging 
		$packaginglist = array();

	 	$packaging = Packaging::getEntries(null, null);

	 	if ($packaging['status'] == 0)
		{
			return Redirect::route('getlanding')->with('error_message', Lang::get('core.msg_error_getting_entries'));
		}

		foreach ($packaging['entries'] as $packaging)
		{
			$packaginglist[$packaging->id] = $packaging->name;
		}


			/* Magic */
	  	$wood = Input::get('wood');
	    $region = Input::get('region');
	    $packaging = Input::get('packaging');
	    $ads = $entry = DB::table('ads')
			->join('users', 'ads.user', '=', 'users.id')
			->join('region', 'ads.region', '=', 'region.id')
			->join('wood', 'ads.wood', '=', 'wood.id')
			->join('packaging', 'ads.packaging', '=', 'packaging.id')
			->select(
				'ads.id AS id', 
				'ads.title AS title',
				'ads.permalink AS permalink',
				'ads.wood AS wood',
				'ads.packaging AS packaging',
				'ads.price AS price',
				'ads.description AS description',
				'ads.user AS user',
				'ads.region AS region',
				'ads.city AS city',
				'ads.published AS published',
				'ads.featured AS featured',
				'ads.image AS image',
				'ads.created_at AS created_at',
				'users.email AS email',
				'users.username AS username',
				'region.name AS regionname',
				'wood.name AS woodname',
				'wood.permalink AS woodpermalink',
				'packaging.name AS packagingname'
			)
		->where('ads.published', 'LIKE', '1')
		->where('region.id', 'LIKE', '%'.$region.'%')
		->where('packaging.id', 'LIKE', ''.$packaging.'%')
		->where('wood.id', 'LIKE', ''.$wood.'%')
		->orderBy('id', 'ASC')
		->paginate(10);

		
	    $wood = mb_strtolower($wood, 'UTF-8');

	    $packaging = mb_strtolower($packaging, 'UTF-8');

		$this->layout->title = 'Izjava o privatnosti | Prodaja drva';

		$this->layout->css_files = array(

			);

		$this->layout->js_footer_files = array(

			);

		$this->layout->content = View::make('frontend.izjava-o-privatnosti', array('postRoute' => 'SearchAds', 'packaginglist' => $packaginglist, 'woodlist' => $woodlist, 'regionslist' => $regionslist, 'ads' => $ads));

	}

}
