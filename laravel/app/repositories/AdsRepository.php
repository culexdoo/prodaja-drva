<?php

/*
*	AdsRepository 
*
*	Handles backend functions
*/



class AdsRepository {
 
    public function __construct(){

    }
 
 

	/**
	 * Store a newly created dentist(s) in storage.
	 *
	 * @return Response
	 */
	public function store($title, $wood, $packaging, $price, $description, $username, $region, $city, $email, $contact1, $contact2)
	{ 
		try {
 
			$entry = new Ads;
			$entry->title = $title;
			$entry->wood = $wood;
			$entry->packaging = $packaging;
			$entry->price = $price;
			$entry->description = $description;
			$entry->username = $username; 
			$entry->region = $region; 
			$entry->city = $city;
			$entry->email = $email;
			$entry->contact1 = $contact1;
			$entry->contact2 = $contact2;
			


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
	public function update($id, $title, $wood, $packaging, $price, $description, $username, $region, $city, $email, $contact1, $contact2)
	{ 
		try {
 
			$entry = Ads::find($id);
			$entry->title = $title;
			$entry->wood = $wood;
			$entry->packaging = $packaging;
			$entry->price = $price;
			$entry->description = $description; 
			$entry->username = $username; 
			$entry->region = $region; 
			$entry->city = $city;
			$entry->email = $email;
			$entry->contact1 = $contact1;
			$entry->contact2 = $contact2;

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
			$entry = Ads::find($id);

			$entry->delete();

			return array('status' => 1);
		}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}
	}

}
