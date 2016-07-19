<?php

/*
*	UsersRepository 
*
*	Handles backend functions
*/



class UsersRepository {
 
    public function __construct(){

    }
 
 

	/**
	 * Store a newly created dentist(s) in storage.
	 *
	 * @return Response
	 */
	public function store($first_name, $last_name, $username, $region, $city, $date_of_birth, $email, $password, $contact1, $contact2, $additional_notes, $user_info)
	{ 
		try {
 
			$entry = new Users; 
			$entry->first_name = $first_name;
			$entry->last_name = $last_name;
			$entry->username = $username;
			$entry->region = $region;
			$entry->city = $city;
			$entry->date_of_birth = $date_of_birth; 
			$entry->email = $email;
			$entry->password = Hash::make($password);
			$entry->contact1 = $contact1;
			$entry->contact2 = $contact2;
			$entry->additional_notes = $additional_notes;
			$entry->user_info = $user_info;


			$entry->save();

			return array('status' => 1);
	 	} 

		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}   
	}
 
	/**
	 * Update the specified blog post(s) in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, $first_name, $last_name, $username, $region, $city, $date_of_birth, $email, $password, $contact1, $contact2, $additional_notes, $user_info)
	{ 
		try {
 
			$entry = Users::find($id);
			$entry->first_name = $first_name;
			$entry->last_name = $last_name;
			$entry->username = $username;
			$entry->region = $region;
			$entry->city = $city;
			$entry->date_of_birth = $date_of_birth; 
			$entry->email = $email;
			$entry->password = Hash::make($password);
			$entry->contact1 = $contact1;
			$entry->contact2 = $contact2;
			$entry->additional_notes = $additional_notes;
			$entry->user_info = $user_info;

			$entry->save();

			return array('status' => 1);
	 	} 

		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}   
	}


	/**
	 * Remove the specified dentist(s) from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
public function destroy($id)
	{
		try
		{
			$entry = Users::find($id);

			$entry->delete();

			return array('status' => 1);
		}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}
	}

}
