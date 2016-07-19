<?php
/*
*	Frontend Repository
*
*	Handles functions:
*/



class FrontendRepository
{
 
    public function __construct(){

    }



	// Register user
	public function registerUser($first_name, $last_name, $email, $username, $password)
	{
		try
		{
			$newUser = new User;
			$newUser->first_name = $first_name;
			$newUser->last_name = $last_name;

			$newUser->email = $email;
			$newUser->username = $username;

			$newUser->password = Hash::make($password);

			
			
 
			$newUser->save(); 

			return array('status' => 1);
		}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}
	}



}
