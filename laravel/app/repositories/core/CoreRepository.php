<?php
/*
*
*	Handles functions:
*/



class CoreRepository
{
	/*
	*	Users section
	*/
    public function __construct(){

    }

 
	// Verify user e-mail
	public function verifyEmail($email, $code)
	{
		try
		{
			$user = User::getUserByEmail($email);
			if ($user['status'] == 0)
			{
				return Redirect::route('getDashboard')->with('error_message', Lang::get('messages.error_validating_email'));
			}

			$userItem = User::find($user['user']->id);

			if ($code == $userItem->verify_code)
			{
				$userItem->verify_code = null;
				$userItem->email_is_verified = true;
				$userItem->save();

				return array('status' => 1, 'verified' => true);
			}
			else
			{
				return array('status' => 1, 'verified' => false);
			}

		}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}
	}

  



	// Edit profile
	public function updateProfile($email, $password = null, $first_name, $last_name)
	{


		try
		{

			$profileUser = User::find(Auth::user()->id);

			if ($password != null || $password != '')
			{
				$profileUser->password = Hash::make($password);
			}

			$profileUser->first_name = $first_name;
			$profileUser->last_name = $last_name;

			$profileUser->save();

			return array('status' => 1);
		}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}
	}
 

 


	// Insert password into current profile
	public function insertPassword($password, $language)
	{
		try
		{
			$user = User::find(Auth::user()->id);
			$user->password = Hash::make($password);
			$user->is_temp_password = false;
			$user->language = $language;

			$user->save();

			return array('status' => 1, 'name' => $user->first_name);
		}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}
	}
 

	/*
	*	Languages section
	*/
 

	// Get User Language
	public function getUserLanguage()
	{
		try
		{
			$user = User::getUserInfos(Auth::user()->id);

			if ($user['status'] == 1)
			{
				return array('status' => 1, 'language_id' => $user['user']->language_id, 'language_iso_tag' => $user['user']->language_iso_tag, 'language' => $user['user']->language, 'language_local_name' => $user['user']->language_local_name);
			}
			else
			{
				return array('status' => 0, 'reason' => 'Failure retrieving user informations.');
			}
		}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}
	}

	// Get User landing page
	public function getUserLandingPage()
	{
		try
		{
			$user = User::getUserInfos(Auth::user()->id);

			if ($user['status'] == 1)
			{
				return array('status' => 1, 'landing_page' => $user['user']->landing_page);
			}
			else
			{
				return array('status' => 0, 'reason' => 'Failure retrieving user informations.');
			}
		}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}
	}


	// Set user language
	public function setUserLanguage($id = null)
	{
		if ($id != null)
		{
			try
			{
				$theUser = User::find(Auth::user()->id);
				$theUser->language = $id;

				$theUser->save();

				return array('status' => 1);
			}
			catch (Exception $exp)
			{
				return array('status' => 0, 'reason' => $exp->getMessage());
			}
		}
		else
		{
			return array('status' => 0, 'reason' => 'No language selected.');
		}
	}
  
}
 


						  