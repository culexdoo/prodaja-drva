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
				return Redirect::route('getLanding')->with('error_message', Lang::get('core.msg_error_getting_entry'));
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
				return Redirect::route('getlanding')->with('error_message', Lang::get('core.msg_error_getting_entry'));
			}

			foreach ($wood['entries'] as $wood)
			{
				$woodlist[$wood->id] = $wood->name;
			}

			/* Magic */
		  	$wood = Input::get('wood');
		    $region = Input::get('region');
		    $packaging = Input::get('packaging');
		    $classifieds = $entry = DB::table('classifieds')
				->join('users', 'classifieds.user', '=', 'users.id')
				->join('region', 'classifieds.region', '=', 'region.id')
				->join('wood', 'classifieds.wood', '=', 'wood.id')
				->join('packaging', 'classifieds.packaging', '=', 'packaging.id')
				->select(
					'classifieds.id AS id', 
					'classifieds.title AS title',
					'classifieds.permalink AS permalink',
					'classifieds.wood AS wood',
					'classifieds.packaging AS packaging',
					'classifieds.price AS price',
					'classifieds.description AS description',
					'classifieds.user AS user',
					'classifieds.region AS region',
					'classifieds.city AS city',
					'classifieds.published AS published',
					'classifieds.featured AS featured',
					'classifieds.image AS image',
					'classifieds.created_at AS created_at',
					'users.email AS email',
					'users.username AS username',
					'region.name AS regionname',
					'wood.name AS woodname',
					'wood.permalink AS woodpermalink',
					'packaging.name AS packagingname'
				)
			->where('classifieds.published', 'LIKE', '1')
			->where('region.id', 'LIKE', '%'.$region.'%')
			->where('packaging.id', 'LIKE', ''.$packaging.'%')
			->where('wood.id', 'LIKE', ''.$wood.'%')
			->orderBy('id', 'ASC')
			->paginate(10);

			
		    $wood = mb_strtolower($wood, 'UTF-8');

		    $packaging = mb_strtolower($packaging, 'UTF-8');

		    $entry = $classifieds;
		
	 
		$this->layout->title = 'Prodaja drva';

		$featuredclassifieds = Classifieds::getEntries(null, null, null, true, true, 4, null, null, null, null, null, null);

		$publishedclassifieds = Classifieds::getEntries(null, null, null, true, null, 10, null, null, null, null, null, null);

		$countactiveclassifieds = Classifieds::getEntries(null, null, null, null, null, null, null, null, null, null, null, null, true);

		$countnewclassifieds = Classifieds::getEntries(null, null, null, null, null, null, null, null, null, null, null, true);

		$countactiveusers = Users::getEntries(null, null, null, null, true, null);

		$countnewusers = Users::getEntries(null, null, null, null, null, true);

		$pins = Classifieds::getEntries(null, null, null, true, null, null, true, null, null, null, null, null);




		$this->layout->css_files = array(
			'css/frontend/style.css',
			'css/frontend/style.complete.css',
			'css/frontend/flat-ui.css',
			'css/frontend/style-library-1.css',
			'css/frontend/style-extra-pages.css',
			'css/frontend/custom.css'
		);


		$this->layout->js_footer_files = array(

		);

		$this->layout->content = View::make('frontend.index', array('featuredclassifieds' => $featuredclassifieds, 'publishedclassifieds' => $publishedclassifieds, 'countactiveclassifieds' => $countactiveclassifieds['entry'], 'countactiveusers' => $countactiveusers['entry'], 'countnewclassifieds' => $countnewclassifieds['entry'], 'countnewusers' => $countnewusers['entry'], 'pins' => $pins['entries'], 'postRoute' => 'SearchClassifieds', 'woodlist' => $woodlist, 'regionslist' => $regionslist, 'classifieds' => $classifieds));
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
 			'css/frontend/style.css',
			'css/frontend/style.complete.css',
			'css/frontend/flat-ui.css',
			'css/frontend/style-library-1.css',
			'css/frontend/style-extra-pages.css',
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

			return Redirect::route('getLanding')->with('success_message', Lang::get('messages.sign_in_successful'));

		}
		else
		{
			return Redirect::back()->with('error_message', Lang::get('messages.not_logged_in'))->withInput();
		}
	}


	// Do the sign out

	public function signout()
	{
		if (Auth::check())
		{
			Auth::logout();
			Session::flush();

			return Redirect::route('getLanding')->with('info_message', Lang::get('messages.sign_out_successful'));

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
			'css/frontend/style.css',
			'css/frontend/style.complete.css',
			'css/frontend/flat-ui.css',
			'css/frontend/style-library-1.css',
			'css/frontend/style-extra-pages.css',
			'css/frontend/custom.css'
			);

		$this->layout->js_footer_files = array(

			);

		$this->layout->content = View::make('frontend.password-recovery', array('postRoute' => 'postRemind'));

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
			return Redirect::route('getLanding')->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}
		foreach ($region['entries'] as $region)
		{
			$regionlist[$region->id] = $region->name;
		}

		$citylist = array();
	 	$city = City::getEntries(null, null);
	 	
		if ($city['status'] == 0)
		{
			return Redirect::route('getLanding')->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}
		foreach ($city['entries'] as $city)
		{
			$citylist[$city->id] = $city->name;
		}

		$this->layout->title = 'Registracija | Prodaja drva';

 		$this->layout->css_files = array( 
 			'css/frontend/registration.css',
 			'css/frontend/style.css',
			'css/frontend/style.complete.css',
			'css/frontend/flat-ui.css',
			'css/frontend/style-library-1.css',
			'css/frontend/style-extra-pages.css',
			'css/frontend/custom.css'

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
			return Redirect::back()->with('error_message', Lang::get('messages.msg_error_registering_user'))->withErrors($userValidator)->withInput();
		}

		$passwordValidator = Validator::make(Input::all(), Users::$password_rules);

		if ($passwordValidator->fails())
		{
			return Redirect::back()->with('error_message', Lang::get('messages.msg_error_password_dont_match'))->withErrors($passwordValidator)->withInput();
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
				$message->from('info@culex.hr', 'Prodaja drva');
				$message->subject('Hvala na registraciji');
				$message->to(Input::get('email'));
			});


 
		 
		    return Redirect::intended('/')->with('success_message', Lang::get('messages.sign_in_successful'));
	 

			Session::put('lang', 'hr');
			App::setLocale('hr');

			return Redirect::intended('/')->with('success_message', Lang::get('messages.sign_in_successful'));
		}
		else
		{
			return Redirect::back()->with('error_message', Lang::get('messages.not_logged_in'))->withInput();
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

		$userclassifieds = Classifieds::getEntries(null, null, $user, true, null, null, null, null, null, null, null, null, null);

		$reviews = Review::getEntries(null, null, $user, true);



		$featuredclassifieds = Classifieds::getEntries(null, null, null, true, true, 4, null);

		if (is_null($entry['entry'])) {

			return Redirect::route('getLanding')->with('error_message', Lang::get('core.msg_error_user_not_found'));
		}

		if ($entry['status'] == 0)
		{
			return Redirect::route('getLanding')->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}

		$this->layout->title = 'Profil korisnika ' . $entry['entry']->username .' | Prodaja drva';

		$this->layout->css_files = array(

			'css/frontend/custom.css'

			);

		$this->layout->js_footer_files = array(

			);

		$this->layout->content = View::make('frontend.user-profile', array('entry' => $entry{'entry'}, 'city' => $city['entry'], 'region' => $region['entry'], 'userclassifieds' => $userclassifieds['entries'], 'featuredclassifieds' => $featuredclassifieds, 'reviews' => $reviews['entries'], 'postRoute' => 'ReviewStore'));

	}

	/*
	 *	My profile segment
	 */


	// Shows my profile page

	public function MyProfile() {

		if (Auth::Guest())
		{
			return Redirect::route('getLanding')->with('error_message', Lang::get('messages.not_logged_in'));
		}

		$id = Auth::User()->id;


		// - CHECK IF USER IS LOGGED IN - //
		if (Auth::check())
		{
			$user = User::getUserInfos(Auth::user()->id);

			if ($user['status'] == 0)
			{
				return Redirect::route('getLanding')->with('error_message', Lang::get('messages.not_logged_in'));
			}

			if ($user['user']->id != $id) {
				return Redirect::route('getLanding')->with('error_message', Lang::get('core.unauthorized_access'));
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

		$userclassifieds = Classifieds::getEntries(null, null, $user, null, null, null, null, null, null, null, null, null);

		$featuredclassifieds = Classifieds::getEntries(null, null, null, true, true, 4, null, null, null, null, null, null);

		$this->layout->title = 'Moj profil | Prodaja drva';

		$this->layout->css_files = array(
			'css/frontend/custom.css'
			);

		$this->layout->js_footer_files = array(

			);

		$this->layout->content = View::make('frontend.my-profile', array('entry' => $entry['entry'], 'city' => $city['entry'], 'region' => $region['entry'], 'userclassifieds' => $userclassifieds['entries'], 'featuredclassifieds' => $featuredclassifieds));

	}

	// Shows edit my profile page by users id

	public function EditMyProfile($id) {

		$regionlist = array();
	 	$region = Region::getEntries(null, null);
	 	
		if ($region['status'] == 0)
		{
			return Redirect::route('getLanding')->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}
		foreach ($region['entries'] as $region)
		{
			$regionlist[$region->id] = $region->name;
		}

		$citylist = array();
	 	$city = City::getEntries(null, null);
	 	
		if ($city['status'] == 0)
		{
			return Redirect::route('getLanding')->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}
		foreach ($city['entries'] as $city)
		{
			$citylist[$city->id] = $city->name;
		}

		$entry = Users::getEntries($id, null, null);

		$this->layout->title = 'Moj profil | Prodaja drva';

		$this->layout->css_files = array(

			'css/frontend/custom.css'
			);

		$this->layout->js_footer_files = array(

			);

		$this->layout->content = View::make('frontend.my-profile-edit', array('postRoute' =>  'UpdateMyProfile', 'entry' => $entry['entry'], 'regionlist' => $regionlist, 'citylist' => $citylist));

	}


	// Updates my profile by users id

	public function UpdateMyProfile($id)
	{
		Input::merge(array_map('trim', Input::all()));

		$entryValidator = Validator::make(Input::all(), Users::$update_rules);

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
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_updating_user'))->withErrors($entryValidator)->withInput();
		}
		else
		{
			return Redirect::route('getLanding')->with('success_message', Lang::get('core.msg_success_user_updated', array('name' => Input::get('name'))));
		}
	}


	/*
	 *	Show, Create, edit, update, destroy classifieds segment
	 */

	// Shows specific classified by permalink

	public function ShowClassified($permalink) {


		// Getting all regions
		$regionslist = array();

		$regions = Region::getEntries();

		if ($regions['status'] == 0)
		{
			return Redirect::route('getLanding')->with('error_message', Lang::get('core.msg_error_getting_entry'));
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
			return Redirect::route('getlanding')->with('error_message', Lang::get('core.msg_error_getting_entry'));
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
			return Redirect::route('getlanding')->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}

		foreach ($packaging['entries'] as $packaging)
		{
			$packaginglist[$packaging->id] = $packaging->name;
		}


			/* Magic */
	  	$wood = Input::get('wood');
	    $region = Input::get('region');
	    $packaging = Input::get('packaging');
	    $classifieds = $entry = DB::table('classifieds')
			->join('users', 'classifieds.user', '=', 'users.id')
			->join('region', 'classifieds.region', '=', 'region.id')
			->join('wood', 'classifieds.wood', '=', 'wood.id')
			->join('packaging', 'classifieds.packaging', '=', 'packaging.id')
			->select(
				'classifieds.id AS id', 
				'classifieds.title AS title',
				'classifieds.permalink AS permalink',
				'classifieds.wood AS wood',
				'classifieds.packaging AS packaging',
				'classifieds.price AS price',
				'classifieds.description AS description',
				'classifieds.user AS user',
				'classifieds.region AS region',
				'classifieds.city AS city',
				'classifieds.published AS published',
				'classifieds.featured AS featured',
				'classifieds.image AS image',
				'classifieds.created_at AS created_at',
				'users.email AS email',
				'users.username AS username',
				'region.name AS regionname',
				'wood.name AS woodname',
				'wood.permalink AS woodpermalink',
				'packaging.name AS packagingname'
			)
		->where('classifieds.published', 'LIKE', '1')
		->where('region.id', 'LIKE', '%'.$region.'%')
		->where('packaging.id', 'LIKE', ''.$packaging.'%')
		->where('wood.id', 'LIKE', ''.$wood.'%')
		->orderBy('id', 'ASC')
		->paginate(10);

		
	    $wood = mb_strtolower($wood, 'UTF-8');

	    $packaging = mb_strtolower($packaging, 'UTF-8');


		$entry = Classifieds::getEntries(null, $permalink, null, null, null, null, null);

 		if (is_null($entry['entry'])) {

			return Redirect::route('getLanding')->with('error_message', Lang::get('core.msg_error_user_not_found'));

		}

		if ($entry['status'] == 0)
		{
			return Redirect::route('getLanding')->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}

  		$user = $entry['entry']->user;

		$user = Users::getEntries($user, null);

		$region = $entry['entry']->region;

		$region = Region::getEntries($region, null);

		$nearclassifieds = $region['entry']->id;

		$nearclassifieds = Classifieds::getEntries(null, null, null, null, null, null, null, null, $nearclassifieds, null, null, null, null);

		$this->layout->title = $entry['entry']->title .' | Prodaja drva';

		$this->layout->description = 'Pregled oglasa: '. $entry['entry']->title;

		$this->layout->css_files = array(

			'css/frontend/registration.css',
 			'css/frontend/style.css',
			'css/frontend/style.complete.css',
			'css/frontend/flat-ui.css',
			'css/frontend/style-library-1.css',
			'css/frontend/style-extra-pages.css',
			'css/frontend/custom.css'
		);

		$this->layout->js_footer_files = array(
		);

		$this->layout->content = View::make('frontend.single-classified', array('entry' => $entry['entry'], 'user' => $user['entry'], 'region' => $region['entry'], 'nearclassifieds' => $nearclassifieds['entries'], 'postRoute' => 'SearchClassifieds', 'packaginglist' => $packaginglist, 'woodlist' => $woodlist, 'regionslist' => $regionslist, 'classifieds' => $classifieds ));
	}

	// Shows listing of all classifieds by specific wood category

	public function listclassifiedsbywoodcategory($woodcategory) {

		$wood = Wood::getEntries(null, null, $woodcategory);

		$wood = $wood['entry']->id;

		$entries = Classifieds::getEntries(null, null, null, true, null, null, null, $wood, null, null, null, null, null);
		
		$featuredclassifieds = Classifieds::getEntries(null, null, null, true, true, 4, null);

		// Getting all regions
		$regionslist = array();

		$regions = Region::getEntries();

		if ($regions['status'] == 0)
		{
			return Redirect::route('getLanding')->with('error_message', Lang::get('core.msg_error_getting_entry'));
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
			return Redirect::route('getlanding')->with('error_message', Lang::get('core.msg_error_getting_entry'));
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
			return Redirect::route('getlanding')->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}

		foreach ($packaging['entries'] as $packaging)
		{
			$packaginglist[$packaging->id] = $packaging->name;
		}


			/* Magic */
	  	$wood = Input::get('wood');
	    $region = Input::get('region');
	    $packaging = Input::get('packaging');
	    $classifieds = $entry = DB::table('classifieds')
			->join('users', 'classifieds.user', '=', 'users.id')
			->join('region', 'classifieds.region', '=', 'region.id')
			->join('wood', 'classifieds.wood', '=', 'wood.id')
			->join('packaging', 'classifieds.packaging', '=', 'packaging.id')
			->select(
				'classifieds.id AS id', 
				'classifieds.title AS title',
				'classifieds.permalink AS permalink',
				'classifieds.wood AS wood',
				'classifieds.packaging AS packaging',
				'classifieds.price AS price',
				'classifieds.description AS description',
				'classifieds.user AS user',
				'classifieds.region AS region',
				'classifieds.city AS city',
				'classifieds.published AS published',
				'classifieds.featured AS featured',
				'classifieds.image AS image',
				'classifieds.created_at AS created_at',
				'users.email AS email',
				'users.username AS username',
				'region.name AS regionname',
				'wood.name AS woodname',
				'wood.permalink AS woodpermalink',
				'packaging.name AS packagingname'
			)
		->where('classifieds.published', 'LIKE', '1')
		->where('region.id', 'LIKE', '%'.$region.'%')
		->where('packaging.id', 'LIKE', ''.$packaging.'%')
		->where('wood.id', 'LIKE', ''.$wood.'%')
		->orderBy('id', 'ASC')
		->paginate(10);

		
	    $wood = mb_strtolower($wood, 'UTF-8');

	    $packaging = mb_strtolower($packaging, 'UTF-8');

		$this->layout->title = 'Lista oglasa po kategoriji drveta: '. $woodcategory . ' | Prodaja drva';

		$this->layout->description = 'Pretraga oglasa za: ' . $woodcategory;

		$this->layout->css_files = array(

			);

		$this->layout->js_footer_files = array(

			);

		$this->layout->content = View::make('frontend.classified-list', array('entries' => $entries['entries'], 'featuredclassifieds' => $featuredclassifieds, 'postRoute' => 'SearchClassifieds', 'packaginglist' => $packaginglist, 'woodlist' => $woodlist, 'regionslist' => $regionslist, 'packaging' => $packaging, 'wood' => $wood));

	}

	// Shows listing of all classifieds by specific packaging category

	public function listclassifiedsbypackagingcategory($packagingcategory) {

		$packaging = Packaging::getEntries(null, null, $packagingcategory);

		$packaging = $packaging['entry']->id;

		$entries = Classifieds::getEntries(null, null, null, true, null, null, null, null, null, $packaging, null, null, null);
		
		$featuredclassifieds = Classifieds::getEntries(null, null, null, true, true, 4, null);

		// Getting all regions
		$regionslist = array();

		$regions = Region::getEntries();

		if ($regions['status'] == 0)
		{
			return Redirect::route('getLanding')->with('error_message', Lang::get('core.msg_error_getting_entry'));
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
			return Redirect::route('getlanding')->with('error_message', Lang::get('core.msg_error_getting_entry'));
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
			return Redirect::route('getlanding')->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}

		foreach ($packaging['entries'] as $packaging)
		{
			$packaginglist[$packaging->id] = $packaging->name;
		}


			/* Magic */
	  	$wood = Input::get('wood');
	    $region = Input::get('region');
	    $packaging = Input::get('packaging');
	    $classifieds = $entry = DB::table('classifieds')
			->join('users', 'classifieds.user', '=', 'users.id')
			->join('region', 'classifieds.region', '=', 'region.id')
			->join('wood', 'classifieds.wood', '=', 'wood.id')
			->join('packaging', 'classifieds.packaging', '=', 'packaging.id')
			->select(
				'classifieds.id AS id', 
				'classifieds.title AS title',
				'classifieds.permalink AS permalink',
				'classifieds.wood AS wood',
				'classifieds.packaging AS packaging',
				'classifieds.price AS price',
				'classifieds.description AS description',
				'classifieds.user AS user',
				'classifieds.region AS region',
				'classifieds.city AS city',
				'classifieds.published AS published',
				'classifieds.featured AS featured',
				'classifieds.image AS image',
				'classifieds.created_at AS created_at',
				'users.email AS email',
				'users.username AS username',
				'region.name AS regionname',
				'wood.name AS woodname',
				'wood.permalink AS woodpermalink',
				'packaging.name AS packagingname'
			)
		->where('classifieds.published', 'LIKE', '1')
		->where('region.id', 'LIKE', '%'.$region.'%')
		->where('packaging.id', 'LIKE', ''.$packaging.'%')
		->where('wood.id', 'LIKE', ''.$wood.'%')
		->orderBy('id', 'ASC')
		->paginate(10);

		
	    $wood = mb_strtolower($wood, 'UTF-8');

	    $packaging = mb_strtolower($packaging, 'UTF-8');

		$this->layout->title = 'Lista oglasa po vrsti pakiranja: '. $packagingcategory . ' | Prodaja drva';

		$this->layout->description = 'Pretraga oglasa za: ' . $packagingcategory;

		$this->layout->css_files = array(

			);

		$this->layout->js_footer_files = array(

			);

		$this->layout->content = View::make('frontend.classified-list', array('entries' => $entries['entries'], 'featuredclassifieds' => $featuredclassifieds, 'postRoute' => 'SearchClassifieds', 'packaginglist' => $packaginglist, 'woodlist' => $woodlist, 'regionslist' => $regionslist, 'packaging' => $packaging, 'wood' => $wood));

		

	}






	// Shows listing of all classifieds by specific wood category

	public function listclassifiedsbyregion($region) {

		$region = Region::getEntries(null, null, $region);
		
		$regionname = $region['entry']->permalink;

		$region = $region['entry']->id;
		
		$entries = Classifieds::getEntries(null, null, null, true, null, null, null, null, $region, null);
		
		$featuredclassifieds = Classifieds::getEntries(null, null, null, true, true, 4, null);

		// Getting all regions
		$regionslist = array();

		$regions = Region::getEntries();

		if ($regions['status'] == 0)
		{
			return Redirect::route('getLanding')->with('error_message', Lang::get('core.msg_error_getting_entry'));
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
			return Redirect::route('getlanding')->with('error_message', Lang::get('core.msg_error_getting_entry'));
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
			return Redirect::route('getlanding')->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}

		foreach ($packaging['entries'] as $packaging)
		{
			$packaginglist[$packaging->id] = $packaging->name;
		}


			/* Magic */
	  	$wood = Input::get('wood');
	    $region = Input::get('region');
	    $packaging = Input::get('packaging');
	    $classifieds = $entry = DB::table('classifieds')
			->join('users', 'classifieds.user', '=', 'users.id')
			->join('region', 'classifieds.region', '=', 'region.id')
			->join('wood', 'classifieds.wood', '=', 'wood.id')
			->join('packaging', 'classifieds.packaging', '=', 'packaging.id')
			->select(
				'classifieds.id AS id', 
				'classifieds.title AS title',
				'classifieds.permalink AS permalink',
				'classifieds.wood AS wood',
				'classifieds.packaging AS packaging',
				'classifieds.price AS price',
				'classifieds.description AS description',
				'classifieds.user AS user',
				'classifieds.region AS region',
				'classifieds.city AS city',
				'classifieds.published AS published',
				'classifieds.featured AS featured',
				'classifieds.image AS image',
				'classifieds.created_at AS created_at',
				'users.email AS email',
				'users.username AS username',
				'region.name AS regionname',
				'wood.name AS woodname',
				'wood.permalink AS woodpermalink',
				'packaging.name AS packagingname'
			)
		->where('classifieds.published', 'LIKE', '1')
		->where('region.id', 'LIKE', '%'.$region.'%')
		->where('packaging.id', 'LIKE', ''.$packaging.'%')
		->where('wood.id', 'LIKE', ''.$wood.'%')
		->orderBy('id', 'ASC')
		->paginate(10);

	    $wood = mb_strtolower($wood, 'UTF-8');

	    $packaging = mb_strtolower($packaging, 'UTF-8');

		$this->layout->title = 'Lista oglasa iz zupanije: '. $regionname . ' | Prodaja drva';

		$this->layout->description = 'Pretraga oglasa iz zupanije: ' . $regionname . ' | Prodaja drva';

		$this->layout->css_files = array(

			);

		$this->layout->js_footer_files = array(

			);

		$this->layout->content = View::make('frontend.classified-list', array('entries' => $entries['entries'], 'featuredclassifieds' => $featuredclassifieds, 'postRoute' => 'SearchClassifieds', 'packaginglist' => $packaginglist, 'woodlist' => $woodlist, 'regionslist' => $regionslist));
	}

	// Shows listing of all classifieds

	public function ClassifiedList() {

			// Getting all regions
			$regionslist = array();

			$regions = Region::getEntries();

			if ($regions['status'] == 0)
			{
				return Redirect::route('getLanding')->with('error_message', Lang::get('core.msg_error_getting_entry'));
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
				return Redirect::route('getlanding')->with('error_message', Lang::get('core.msg_error_getting_entry'));
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
				return Redirect::route('getlanding')->with('error_message', Lang::get('core.msg_error_getting_entry'));
			}

			foreach ($packaging['entries'] as $packaging)
			{
				$packaginglist[$packaging->id] = $packaging->name;
			}


  			/* Magic */
		  	$wood = Input::get('wood');
		    $region = Input::get('region');
		    $packaging = Input::get('packaging');
		    $classifieds = $entry = DB::table('classifieds')
				->join('users', 'classifieds.user', '=', 'users.id')
				->join('region', 'classifieds.region', '=', 'region.id')
				->join('wood', 'classifieds.wood', '=', 'wood.id')
				->join('packaging', 'classifieds.packaging', '=', 'packaging.id')
				->select(
					'classifieds.id AS id', 
					'classifieds.title AS title',
					'classifieds.permalink AS permalink',
					'classifieds.wood AS wood',
					'classifieds.packaging AS packaging',
					'classifieds.price AS price',
					'classifieds.description AS description',
					'classifieds.user AS user',
					'classifieds.region AS region',
					'classifieds.city AS city',
					'classifieds.published AS published',
					'classifieds.featured AS featured',
					'classifieds.image AS image',
					'classifieds.created_at AS created_at',
					'users.email AS email',
					'users.username AS username',
					'region.name AS regionname',
					'wood.name AS woodname',
					'wood.permalink AS woodpermalink',
					'packaging.name AS packagingname'
				)
			->where('classifieds.published', 'LIKE', '1')
			->where('region.name', 'LIKE', '%'.$region.'%')
			->where('packaging.name', 'LIKE', ''.$packaging.'%')
			->where('wood.name', 'LIKE', ''.$wood.'%')
			->orderBy('id', 'ASC')
			->paginate(10);


		    $wood = mb_strtolower($wood, 'UTF-8');

		    $packaging = mb_strtolower($packaging, 'UTF-8');

		    $entry = Classifieds::getEntries(null, null, null, true, null, null, null, null, null, null, null, null);

			$featuredclassifieds = Classifieds::getEntries(null, null, null, true, true, 10, null, null, null, null, null, null);

	 		$this->layout->title = 'Oglasi | Prodaja drva';

			$this->layout->css_files = array(

			'css/frontend/registration.css',
 			'css/frontend/style.css',
			'css/frontend/style.complete.css',
			'css/frontend/flat-ui.css',
			'css/frontend/style-library-1.css',
			'css/frontend/style-extra-pages.css',
			'css/frontend/custom.css'

			);

			$this->layout->js_footer_files = array(

				);

            //return display search result to user by using a view
            $this->layout->content = View::make('frontend.classified-list', array('entries' => $entry['entries'], 'featuredclassifieds' => $featuredclassifieds, 'postRoute' => 'SearchClassifieds', 'packaginglist' => $packaginglist, 'woodlist' => $woodlist, 'regionslist' => $regionslist, 'classifieds' => $classifieds));
	}

	// Searches classifieds by parameters

	public function SearchClassifieds () {

  			// Getting all regions
			$regionslist = array();

			$regions = Region::getEntries();

			if ($regions['status'] == 0)
			{
				return Redirect::route('getLanding')->with('error_message', Lang::get('core.msg_error_getting_entry'));
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
				return Redirect::route('getlanding')->with('error_message', Lang::get('core.msg_error_getting_entry'));
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
				return Redirect::route('getlanding')->with('error_message', Lang::get('core.msg_error_getting_entry'));
			}

			foreach ($packaging['entries'] as $packaging)
			{
				$packaginglist[$packaging->id] = $packaging->name;
			}


  			/* Magic */
		  	$wood = Input::get('wood');
		    $region = Input::get('region');
		    $packaging = Input::get('packaging');
		    $classifieds = $entry = DB::table('classifieds')
				->join('users', 'classifieds.user', '=', 'users.id')
				->join('region', 'classifieds.region', '=', 'region.id')
				->join('wood', 'classifieds.wood', '=', 'wood.id')
				->join('packaging', 'classifieds.packaging', '=', 'packaging.id')
				->select(
					'classifieds.id AS id', 
					'classifieds.title AS title',
					'classifieds.permalink AS permalink',
					'classifieds.wood AS wood',
					'classifieds.packaging AS packaging',
					'classifieds.price AS price',
					'classifieds.description AS description',
					'classifieds.user AS user',
					'classifieds.region AS region',
					'classifieds.city AS city',
					'classifieds.published AS published',
					'classifieds.featured AS featured',
					'classifieds.image AS image',
					'classifieds.created_at AS created_at',
					'users.email AS email',
					'users.username AS username',
					'region.name AS regionname',
					'wood.name AS woodname',
					'wood.permalink AS woodpermalink',
					'packaging.permalink AS packagingpermalink',
					'region.permalink AS regionpermalink',
					'packaging.name AS packagingname'
				);

			$entry->where('classifieds.published', '=', '1');

			if (!empty($region)) {
			$entry->where('region.id', '=', $region);
			}

			if (!empty($packaging)) {
			$entry->where('packaging.id', '=', $packaging);
			}

			if (!empty($wood)) {
			$entry->where('wood.id', '=', $wood);
			}
 

			$classifieds = $entry->orderBy('id', 'ASC')->paginate(10);


		    $wood = mb_strtolower($wood, 'UTF-8');

		    $packaging = mb_strtolower($packaging, 'UTF-8');

		    $entry = $classifieds;

			$featuredclassifieds = Classifieds::getEntries(null, null, null, true, true, 4, null, null, null, null, null, null);

			// Getting wood permalink for title and description

			$woodname = Wood::getEntries($wood, null, null);
			if ($wood == null) {
				$wood = null;
				$woodname = $wood;
			}else{
				$woodname = $woodname['entry']->permalink;
			}			

			// Getting packaging permalink for title and description

			$packagingname = Packaging::getEntries($packaging, null, null);
			if ($packaging == null) {
				$packaging = null;
				$packagingname = $packaging;
			}else{
				$packagingname = $packagingname['entry']->permalink;
			}

			// Getting region permalink for title and description

			$regionname = Region::getEntries($region, null, null);
			if ($region == null) {
				$region = null;
				$regionname = $region;
			}else{
				$regionname = $regionname['entry']->permalink;
			}
			
			// Creating title and description by given parameters

			if ($woodname != null)
			{
				if ($packagingname != null)
				{
					if ($regionname != null)
					{
						$this->layout->title = 'Rezultati pretrage oglasa iz kategorija ' . $woodname . ' i ' . $packagingname . ' u županiji ' . $regionname . ' | Prodaja drva';

						$this->layout->description = 'Pretraga oglasa za ' . $woodname . ', ' . $packagingname . ', ' . $regionname;

						$this->layout->keywords = $woodname . ',' . $packagingname . ',' . $regionname;

					} else {
						$this->layout->title = 'Rezultati pretrage oglasa iz kategorija ' . $woodname . ' i ' . $packagingname . ' | Prodaja drva';

						$this->layout->description = 'Pretraga oglasa za ' . $woodname . ', ' . $packagingname;

						$this->layout->keywords = $woodname . ',' . $packagingname;
					}
				} 
				elseif ($regionname != null) 
				{
					$this->layout->title = 'Rezultati pretrage oglasa iz kategorije ' . $woodname . ' u županiji ' . $regionname . ' | Prodaja drva';

					$this->layout->description = 'Pretraga oglasa za ' . $woodname . ', ' . $regionname;

					$this->layout->keywords = $woodname . ',' . $regionname;
				} 
				elseif ($woodname != null)
				{
					$this->layout->title = 'Rezultati pretrage oglasa iz kategorije ' . $woodname . ' | Prodaja drva';

					$this->layout->description = 'Pretraga oglasa za ' . $woodname;

					$this->layout->keywords = $woodname;
				}
			}
			elseif ($packagingname != null)
			{
				if ($regionname != null)
				{
					$this->layout->title = 'Rezultati pretrage oglasa iz kategorije ' . $packagingname . ' u županiji ' . $regionname . ' | Prodaja drva';

					$this->layout->description = 'Pretraga oglasa za ' . $packagingname . ', ' . $regionname;

					$this->layout->keywords = $packagingname . ',' . $regionname;

				} else {
					$this->layout->title = 'Rezultati pretrage oglasa iz kategorije ' . $packagingname . ' | Prodaja drva';

					$this->layout->description = 'Pretraga oglasa za ' . $packagingname;

					$this->layout->keywords = $packagingname;
				}
			} 
			elseif ($regionname != null) {
				$this->layout->title = 'Rezultati pretrage oglasa iz županije ' . $regionname . ' | Prodaja drva';

				$this->layout->description = 'Pretraga oglasa za ' . $regionname;

				$this->layout->keywords = $regionname;
			} 
			elseif ($woodname == null)
			{
				if ($packagingname == null)
				{
					if ($regionname == null)
					{
						$this->layout->title = 'Rezultati pretrage | Prodaja drva';

						$this->layout->description = 'Pretraga svih oglasa';
					}
				}
			}

			$this->layout->css_files = array(

			'css/frontend/registration.css',
 			'css/frontend/style.css',
			'css/frontend/style.complete.css',
			'css/frontend/flat-ui.css',
			'css/frontend/style-library-1.css',
			'css/frontend/style-extra-pages.css',
			'css/frontend/custom.css'

			);

			$this->layout->js_footer_files = array(

				);

            //return display search result to user by using a view

            $this->layout->content = View::make('frontend.classified-list', array('entries' => $entry, 'featuredclassifieds' => $featuredclassifieds, 'postRoute' => 'SearchClassifieds', 'packaginglist' => $packaginglist, 'woodlist' => $woodlist, 'regionslist' => $regionslist, 'classifieds' => $classifieds));
	}


	// Show create-classified page

	public function CreateClassified()
	{ 

		$regionlist = array();
	 	$region = Region::getEntries(null, null);
	 	
		if ($region['status'] == 0)
		{
			return Redirect::route('getLanding')->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}
		foreach ($region['entries'] as $region)
		{
			$regionlist[$region->id] = $region->name;
		}


		$citylist = array();
	 	$city = City::getEntries(null, null);
	 	
		if ($city['status'] == 0)
		{
			return Redirect::route('getLanding')->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}
		foreach ($city['entries'] as $city)
		{
			$citylist[$city->id] = $city->name;
		}


		$woodlist = array();
	 	$wood = Wood::getEntries(null, null); 
		if ($wood['status'] == 0)
		{
			return Redirect::route('getLanding')->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}
		foreach ($wood['entries'] as $wood)
		{
			$woodlist[$wood->id] = $wood->name;
		}


		$packaginglist = array();
	 	$packaging = Packaging::getEntries(null, null); 
		if ($packaging['status'] == 0)
		{
			return Redirect::route('getLanding')->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}
		foreach ($packaging['entries'] as $packaging)
		{
			$packaginglist[$packaging->id] = $packaging->name;
		}


		$entries = Classifieds::getEntries(null, null, null, null, null, null);

		$user = Users::getEntries(Auth::user()->id, null);


		$this->layout->title = 'Objavite oglas | Prodaja drva';
		
 		$this->layout->css_files = array( 

			'css/frontend/custom.css'

		);

		$this->layout->js_footer_files = array( 

		);

		$this->layout->content = View::make('frontend.create-classified', array('postRoute' =>  'classifiedsStore', 'entries' => $entries['entries'], 'regionlist' => $regionlist, 'citylist' => $citylist, 'woodlist' => $woodlist, 'packaginglist' => $packaginglist, 'user' => $user['entry']));
	}

	// Storing classified in storage

	public function classifiedsStore()
	{
		Input::merge(array_map('trim', Input::all()));

		$entryValidator = Validator::make(Input::all(), Classifieds::$store_rules);
		
		if ($entryValidator->fails())
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_validating_entry'))->withErrors($entryValidator)->withInput();
		}

		$store = $this->repo->classifiedsStore( 
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
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_adding_classified'))->withErrors($entryValidator)->withInput();
		}
		else
		{
			return Redirect::route('CreateClassified')->with('success_message', Lang::get('core.msg_success_classified_added', array('name' => Input::get('name'))));
		}
	}


	// Show edit-classified page

	public function EditClassified($permalink)

	{ 
 
		$regionlist = array();
	 	$region = Region::getEntries(null, null);
	 	
		if ($region['status'] == 0)
		{
			return Redirect::route('getLanding')->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}
		foreach ($region['entries'] as $region)
		{
			$regionlist[$region->id] = $region->name;
		}

		$citylist = array();
	 	$city = City::getEntries(null, null);
	 	
		if ($city['status'] == 0)
		{
			return Redirect::route('getLanding')->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}
		foreach ($city['entries'] as $city)
		{
			$citylist[$city->id] = $city->name;
		}

		$woodlist = array();
	 	$wood = Wood::getEntries(null, null); 
		if ($wood['status'] == 0)
		{
			return Redirect::route('getLanding')->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}
		foreach ($wood['entries'] as $wood)
		{
			$woodlist[$wood->id] = $wood->name;
		}

		$packaginglist = array();
	 	$packaging = Packaging::getEntries(null, null); 
		if ($packaging['status'] == 0)
		{
			return Redirect::route('getLanding')->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}
		foreach ($packaging['entries'] as $packaging)
		{
			$packaginglist[$packaging->id] = $packaging->name;
		}

		
		$entry = Classifieds::getEntries(null, $permalink, null, null, null, null, null);

		$user = Users::getEntries(Auth::user()->id, null);
		
		$this->layout->title = 'Uredite oglas | Prodaja drva';
		
 		$this->layout->css_files = array( 
 			'css/frontend/custom.css'
		);

		$this->layout->js_footer_files = array( 

		);

		$this->layout->content = View::make('frontend.edit-classified', array('postRoute' =>  'UpdateClassified', 'entry' => $entry['entry'], 'regionlist' => $regionlist, 'citylist' => $citylist, 'woodlist' => $woodlist, 'packaginglist' => $packaginglist, 'user' => $user['entry']));
	}

	// Updating specific classified by id

	public function UpdateClassified($id)
	{
		Input::merge(array_map('trim', Input::all()));
		
		$entryValidator = Validator::make(Input::all(), Classifieds::$update_rules);

		if ($entryValidator->fails())
		{
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_validating_entry'))->withErrors($entryValidator)->withInput();
		}

		$update = $this->repo->UpdateClassified(
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
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_updating_classified'))->withErrors($entryValidator)->withInput();
		}
		else
		{
			return Redirect::route('getLanding')->with('success_message', Lang::get('core.msg_success_classified_updated', array('name' => Input::get('name'))));
		}
	}

	// Displays contact page

	public function contact() {

		$entries = Inquiry::getEntries(null, null);

		$this->layout->title = 'Kontaktirajte nas | Prodaja drva';

		$this->layout->css_files = array(

			'css/frontend/registration.css',
 			'css/frontend/style.css',
			'css/frontend/style.complete.css',
			'css/frontend/flat-ui.css',
			'css/frontend/style-library-1.css',
			'css/frontend/style-extra-pages.css',
			'css/frontend/custom.css'

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
			return Redirect::back()->with('error_message', Lang::get('core.msg_error_adding_inquiry'))->withErrors($entryValidator)->withInput();
		}
		else
		{
			return Redirect::route('contact')->with('success_message', Lang::get('core.msg_success_inquiry_added', array('name' => Input::get('name'))));
		}
	}

	// Displays about page

	public function about() {

		// Getting all regions
		$regionslist = array();

		$regions = Region::getEntries();

		if ($regions['status'] == 0)
		{
			return Redirect::route('getLanding')->with('error_message', Lang::get('core.msg_error_getting_entry'));
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
			return Redirect::route('getlanding')->with('error_message', Lang::get('core.msg_error_getting_entry'));
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
			return Redirect::route('getlanding')->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}

		foreach ($packaging['entries'] as $packaging)
		{
			$packaginglist[$packaging->id] = $packaging->name;
		}


			/* Magic */
	  	$wood = Input::get('wood');
	    $region = Input::get('region');
	    $packaging = Input::get('packaging');
	    $classifieds = $entry = DB::table('classifieds')
			->join('users', 'classifieds.user', '=', 'users.id')
			->join('region', 'classifieds.region', '=', 'region.id')
			->join('wood', 'classifieds.wood', '=', 'wood.id')
			->join('packaging', 'classifieds.packaging', '=', 'packaging.id')
			->select(
				'classifieds.id AS id', 
				'classifieds.title AS title',
				'classifieds.permalink AS permalink',
				'classifieds.wood AS wood',
				'classifieds.packaging AS packaging',
				'classifieds.price AS price',
				'classifieds.description AS description',
				'classifieds.user AS user',
				'classifieds.region AS region',
				'classifieds.city AS city',
				'classifieds.published AS published',
				'classifieds.featured AS featured',
				'classifieds.image AS image',
				'classifieds.created_at AS created_at',
				'users.email AS email',
				'users.username AS username',
				'region.name AS regionname',
				'wood.name AS woodname',
				'wood.permalink AS woodpermalink',
				'packaging.name AS packagingname'
			)
		->where('classifieds.published', 'LIKE', '1')
		->where('region.id', 'LIKE', '%'.$region.'%')
		->where('packaging.id', 'LIKE', ''.$packaging.'%')
		->where('wood.id', 'LIKE', ''.$wood.'%')
		->orderBy('id', 'ASC')
		->paginate(10);

		
	    $wood = mb_strtolower($wood, 'UTF-8');

	    $packaging = mb_strtolower($packaging, 'UTF-8');

	    $featuredclassifieds = Classifieds::getEntries(null, null, null, true, true, 4, null, null, null, null, null, null);

		$this->layout->title = 'O nama | Prodaja drva';

		$this->layout->css_files = array(

			'css/frontend/registration.css',
 			'css/frontend/style.css',
			'css/frontend/style.complete.css',
			'css/frontend/flat-ui.css',
			'css/frontend/style-library-1.css',
			'css/frontend/style-extra-pages.css',
			'css/frontend/custom.css'

			);

		$this->layout->js_footer_files = array(

			);

		$this->layout->content = View::make('frontend.about', array('featuredclassifieds' => $featuredclassifieds, 'postRoute' => 'SearchClassifieds', 'packaginglist' => $packaginglist, 'woodlist' => $woodlist, 'regionslist' => $regionslist, 'classifieds' => $classifieds));



	}

	// Shows uvjeti-koristenja page

	public function uvjetikoristenja() {

		// Getting all regions
		$regionslist = array();

		$regions = Region::getEntries();

		if ($regions['status'] == 0)
		{
			return Redirect::route('getLanding')->with('error_message', Lang::get('core.msg_error_getting_entry'));
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
			return Redirect::route('getlanding')->with('error_message', Lang::get('core.msg_error_getting_entry'));
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
			return Redirect::route('getlanding')->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}

		foreach ($packaging['entries'] as $packaging)
		{
			$packaginglist[$packaging->id] = $packaging->name;
		}


			/* Magic */
	  	$wood = Input::get('wood');
	    $region = Input::get('region');
	    $packaging = Input::get('packaging');
	    $classifieds = $entry = DB::table('classifieds')
			->join('users', 'classifieds.user', '=', 'users.id')
			->join('region', 'classifieds.region', '=', 'region.id')
			->join('wood', 'classifieds.wood', '=', 'wood.id')
			->join('packaging', 'classifieds.packaging', '=', 'packaging.id')
			->select(
				'classifieds.id AS id', 
				'classifieds.title AS title',
				'classifieds.permalink AS permalink',
				'classifieds.wood AS wood',
				'classifieds.packaging AS packaging',
				'classifieds.price AS price',
				'classifieds.description AS description',
				'classifieds.user AS user',
				'classifieds.region AS region',
				'classifieds.city AS city',
				'classifieds.published AS published',
				'classifieds.featured AS featured',
				'classifieds.image AS image',
				'classifieds.created_at AS created_at',
				'users.email AS email',
				'users.username AS username',
				'region.name AS regionname',
				'wood.name AS woodname',
				'wood.permalink AS woodpermalink',
				'packaging.name AS packagingname'
			)
		->where('classifieds.published', 'LIKE', '1')
		->where('region.id', 'LIKE', '%'.$region.'%')
		->where('packaging.id', 'LIKE', ''.$packaging.'%')
		->where('wood.id', 'LIKE', ''.$wood.'%')
		->orderBy('id', 'ASC')
		->paginate(10);

		
	    $wood = mb_strtolower($wood, 'UTF-8');

	    $packaging = mb_strtolower($packaging, 'UTF-8');

		$this->layout->title = 'Uvjeti korištenja | Prodaja drva';

		$this->layout->css_files = array(

			'css/frontend/registration.css',
 			'css/frontend/style.css',
			'css/frontend/style.complete.css',
			'css/frontend/flat-ui.css',
			'css/frontend/style-library-1.css',
			'css/frontend/style-extra-pages.css',
			'css/frontend/custom.css'

			);

		$this->layout->js_footer_files = array(

			);

		$this->layout->content = View::make('frontend.uvjeti-koristenja', array('postRoute' => 'SearchClassifieds', 'packaginglist' => $packaginglist, 'woodlist' => $woodlist, 'regionslist' => $regionslist, 'classifieds' => $classifieds));

	}


	// Shows izjava-o-privatnosti page

	public function izjavaoprivatnosti() {

		// Getting all regions
		$regionslist = array();

		$regions = Region::getEntries();

		if ($regions['status'] == 0)
		{
			return Redirect::route('getLanding')->with('error_message', Lang::get('core.msg_error_getting_entry'));
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
			return Redirect::route('getlanding')->with('error_message', Lang::get('core.msg_error_getting_entry'));
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
			return Redirect::route('getlanding')->with('error_message', Lang::get('core.msg_error_getting_entry'));
		}

		foreach ($packaging['entries'] as $packaging)
		{
			$packaginglist[$packaging->id] = $packaging->name;
		}


			/* Magic */
	  	$wood = Input::get('wood');
	    $region = Input::get('region');
	    $packaging = Input::get('packaging');
	    $classifieds = $entry = DB::table('classifieds')
			->join('users', 'classifieds.user', '=', 'users.id')
			->join('region', 'classifieds.region', '=', 'region.id')
			->join('wood', 'classifieds.wood', '=', 'wood.id')
			->join('packaging', 'classifieds.packaging', '=', 'packaging.id')
			->select(
				'classifieds.id AS id', 
				'classifieds.title AS title',
				'classifieds.permalink AS permalink',
				'classifieds.wood AS wood',
				'classifieds.packaging AS packaging',
				'classifieds.price AS price',
				'classifieds.description AS description',
				'classifieds.user AS user',
				'classifieds.region AS region',
				'classifieds.city AS city',
				'classifieds.published AS published',
				'classifieds.featured AS featured',
				'classifieds.image AS image',
				'classifieds.created_at AS created_at',
				'users.email AS email',
				'users.username AS username',
				'region.name AS regionname',
				'wood.name AS woodname',
				'wood.permalink AS woodpermalink',
				'packaging.name AS packagingname'
			)
		->where('classifieds.published', 'LIKE', '1')
		->where('region.id', 'LIKE', '%'.$region.'%')
		->where('packaging.id', 'LIKE', ''.$packaging.'%')
		->where('wood.id', 'LIKE', ''.$wood.'%')
		->orderBy('id', 'ASC')
		->paginate(10);

		
	    $wood = mb_strtolower($wood, 'UTF-8');

	    $packaging = mb_strtolower($packaging, 'UTF-8');

		$this->layout->title = 'Izjava o privatnosti | Prodaja drva';

		$this->layout->css_files = array(

			'css/frontend/registration.css',
 			'css/frontend/style.css',
			'css/frontend/style.complete.css',
			'css/frontend/flat-ui.css',
			'css/frontend/style-library-1.css',
			'css/frontend/style-extra-pages.css',
			'css/frontend/custom.css'

			);

		$this->layout->js_footer_files = array(

			);

		$this->layout->content = View::make('frontend.izjava-o-privatnosti', array('postRoute' => 'SearchClassifieds', 'packaginglist' => $packaginglist, 'woodlist' => $woodlist, 'regionslist' => $regionslist, 'classifieds' => $classifieds));

	}

}
