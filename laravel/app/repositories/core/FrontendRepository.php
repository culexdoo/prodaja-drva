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

	public function store($title, $wood, $packaging, $region, $city, $price, $description)
	{ 
		try {
 
			$entry = new Ads;
			$entry->title = $title;
			$entry->wood = $wood;
			$entry->packaging = $packaging;
			$entry->region = $region;
			$entry->city = $city; 
			$entry->price = $price;
			$entry->description = $description;
			


			$entry->save();
			
			return array('status' => 1);
	 	} 

		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}   
	}


	public function inquiryStore($first_name, $last_name, $contact, $email, $content)
	{ 
		try {
 
			$entry = new Inquiry;
			$entry->first_name = $first_name;
			$entry->last_name = $last_name;
			$entry->contact = $contact;
			$entry->email = $email;
			$entry->content = $content;

			


			$entry->save();
			
			return array('status' => 1);
	 	} 

		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}   
	}


}
