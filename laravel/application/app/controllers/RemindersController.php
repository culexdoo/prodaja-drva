<?php

class RemindersController extends \CoreController {

	// Enviroment variables
	protected $repo;
	protected $moduleInfo;



	// Constructing default values
	public function __construct()
	{
		// Call CoreController constructor to get Layout and other variables
		parent::__construct();
	}

	/**
	 * Display the password reminder view.
	 *
	 * @return Response
	 */

	public function getRemind()
	{
		$this->layout->description = 'Prodaja drva je aplikacija za online kupovinu i prodaju drva';

		$this->layout->keywords = 'Prodaja-drva.com.hr, drva, ogrjevno drvo, briketi, pelet';

		$this->layout->bodyclass = 'login-page';

		$this->layout->title = 'Zaboravljena lozinka | Prodaja-drva.hr';

		$this->layout->css_files = array(
		);

		$this->layout->js_footer_files = array(
		);

		$this->layout->content = View::make('frontend.forgotpassword', array('postRoute' => 'postRemind'));

	}

	/**
	 * Handle a POST request to remind a user of their password.
	 *
	 * @return Response
	 */
	public function postRemind()
	{
		$response = Password::remind(Input::only('email'), function($message)
		{
			$message->subject('Prodaja-drva.com.hr: zahtjev za novom lozinkom');
		});

		switch ($response)
		{
			case Password::INVALID_USER:
				return Redirect::back()->with('error_message', Lang::get($response));
				break;

			case Password::REMINDER_SENT:
				return Redirect::to('/')->with('success_message', Lang::get($response));
				break;
		}
	}

	/**
	 * Display the password reset view for the given token.
	 *
	 * @param  string  $token
	 * @return Response
	 */
	public function getReset($token = null)
	{
		if (is_null($token)) App::abort(404);

		$this->layout->description = 'Prodaja drva je aplikacija za online kupovinu i prodaju drva';

		$this->layout->keywords = 'Prodaja-drva.com.hr, drva, ogrjevno drvo, briketi, pelet';

		$this->layout->bodyclass = 'login-page';

		$this->layout->title = 'Postavljanje nove lozinke | Prodaja-drva.hr';

		$this->layout->css_files = array(
		);

		$this->layout->js_footer_files = array(
		);

		return View::make('frontend.resetpassword')->with('token', $token);
	}

	/**
	 * Handle a POST request to reset a user's password.
	 *
	 * @return Response
	 */
	public function postReset()
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
				return Redirect::back()->with('error_message', Lang::get('messages.msg_error_password_dont_match'));
			case Password::INVALID_TOKEN:
				return Redirect::back()->with('error_message', Lang::get('messages.token_error'));
			case Password::INVALID_USER:
				return Redirect::back()->with('error_message', Lang::get('reminders.user'));

			case Password::PASSWORD_RESET:
				return Redirect::to('/')->with('success_message', Lang::get('messages.success_changed_password'));
		}
	}

}
