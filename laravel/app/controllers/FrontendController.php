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
		
	 
		$this->layout->title = 'Prodaja drva';

		$this->layout->css_files = array(

		);


		$this->layout->js_footer_files = array(

		);

		$this->layout->content = View::make('frontend.index');
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




	// Show Sign in page
	public function getSignIn()
	{

 		$this->layout->css_files = array( 
		);
		$this->layout->js_footer_files = array( 
		);
		$this->layout->content = View::make('frontend.signIn');

	}


	/*
	 *	Sign in / out segment
	 */




	// Post sign in
	public function postSignIn()
	{
		Input::merge(array_map('trim', Input::all()));

		if (Auth::attempt(array('email' => Input::get('sign_in_email'), 'password' => Input::get('sign_in_password'))))
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



	/*
	 *	Forgot password segment
	 */



	// Show Forgot password page
	public function getForgotPassword()
	{
		$this->layout->css_files = array( 
		);
		$this->layout->content = View::make('core.forgotPassword');
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

 		$this->layout->css_files = array( 
 			'css/frontend/registration.css'

		);
		$this->layout->js_footer_files = array( 
		);
		$this->layout->content = View::make('frontend.registration');
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

		$tryNewUser = $this->repo->registerUser(Input::get('first_name'), Input::get('last_name'), Input::get('email'), Input::get('username'), Input::get('password'));

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

 
		 
		    return Redirect::intended('getLanding')->with('success_message', Lang::get('messages.sign_in_success'));
	 

			Session::put('lang', 'hr');
			App::setLocale('hr');

			return Redirect::intended('getLanding')->with('success_message', Lang::get('messages.sign_in_success'));
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


	/*
	*	Language management
	*/


	// Switch language and redirect to home or Dashboard
	public function getChangeLanguage($id)
	{
		$languages = Language::getLanguage();

		if (Auth::user())
		{
			if ($languages['status'] == 0)
			{
				return Redirect::route('getLanding')->with('error_message', Lang::get('messages.no_languages'));
			}

			foreach($languages['languages'] as $language)
			{
				if ($language->iso_tag == $id)
				{
					Session::put('lang', $id);

					App::setLocale($id);

					$fn = $this->repo->setUserLanguage($language->id);
				}
			}

			return Redirect::route('getLanding');
		}
		else
		{
			if ($languages['status'] == 0)
			{
				return Redirect::route('getLanding')->with('error_message', Lang::get('messages.no_languages'));
			}

			foreach($languages['languages'] as $language)
			{
				if ($language->iso_tag == $id)
				{
					Session::put('lang', $id);

					App::setLocale($id);
				}
			}

			return Redirect::route('getLanding');
		}
	}



	// Switch language and go back
	public function getSwitchLanguage($id)
	{
		$languages = Language::getLanguage();

		if (Auth::user())
		{
			if ($languages['status'] == 0)
			{
				return Redirect::back()->with('error_message', Lang::get('messages.no_languages'));
			}

			foreach($languages['languages'] as $language)
			{
				if ($language->iso_tag == $id)
				{
					Session::put('lang', $id);

					App::setLocale($id);

					$fn = $this->repo->setUserLanguage($language->id);
				}
			}

			return Redirect::back();
		}
		else
		{
			if ($languages['status'] == 0)
			{
				return Redirect::back()->with('error_message', Lang::get('messages.no_languages'));
			}

			foreach($languages['languages'] as $language)
			{
				if ($language->iso_tag == $id)
				{
					Session::put('lang', $id);

					App::setLocale($id);
				}
			}

			return Redirect::back();
		}
	}






	// Do the sign out
	public function getSignOut()
	{
		if (Auth::check())
		{
			Auth::logout();
			Session::flush();

			return Redirect::route('getFrontendLanding')->with('info_message', Lang::get('messages.sign_out_success'));

		}

		else
		{
			return Redirect::route('getSignIn')->with('info_message', Lang::get('messages.sign_out_resign'));
		}

	}


	// Display reset password
	public function getResetPassword($token = null)
	{
		if (is_null($token)) App::abort(404);

		$this->layout->css_files = array(
			'css/core/forgotPassword.css'
		);
		$this->layout->content = View::make('core.resetPassword', array('token' => $token));
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



	// Show profile page
	public function getProfile() 
	{
		$user = User::getUserInfos(Auth::user()->id);

		if ($user['status'] == 0)
		{
			return Redirect::back()->with('error_message', Lang::get('messages.error_getting_user_info'));
		}
 
		$this->layout->title = 'Uredi profil';

		$this->layout->content = View::make('core.profile', array('title' => 'Uredi profil', 'user' => $user['user']));
	}



	// Save profile changes
	public function postProfile()
	{
		Input::merge(array_map('trim', Input::all()));

		$userValidator = Validator::make(Input::all(), User::edit_profile_rules(Auth::user()->id));

		if ($userValidator->fails()) 
		{
			return Redirect::back()->with('error_message', Lang::get('messages.error_validating_profile'))->withErrors($userValidator)->withInput();
		}
		else
		{
			if (Input::get('old_password') != null || Input::get('old_password') != '')
			{
				if (Hash::check(Input::get('old_password'), Auth::user()->password))
				{
					$updateProfileResponse = $this->repo->updateProfile(Input::get('email'), Input::get('new_password'), Input::get('first_name'), Input::get('last_name'));

					if ($updateProfileResponse['status'] == 0)
					{
						return Redirect::back()->with('error_message', Lang::get('messages.error_password_no_update'))->withErrors($userValidator)->withInput();
					}

					return Redirect::route('getProfile')->with('success_message', Lang::get('messages.success_password_updated'));
				}
				else
				{
					return Redirect::back()->with('error_message', Lang::get('messages.error_password_mismatch'))->withErrors($userValidator)->withInput();
				}
			}
			else
			{
				$updateProfileResponse = $this->repo->updateProfile(Input::get('email'), null, Input::get('first_name'), Input::get('last_name'));

				if ($updateProfileResponse['status'] == 0)
				{
					return Redirect::back()->with('error_message', Lang::get('messages.error_password_no_update'))->withErrors($userValidator)->withInput();
				}

				return Redirect::route('getProfile')->with('success_message', Lang::get('messages.success_password_updated'));
			}
		}
	}



 

}
