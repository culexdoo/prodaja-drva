<?php

/*
*	InquiryRepository 
*
*	Handles backend functions
*/



class InquiryRepository {
 
    public function __construct(){

    }
 
 

	/**
	 * Store a newly created dentist(s) in storage.
	 *
	 * @return Response
	 */
	public function store($first_name, $last_name, $contact, $email, $content)
	{ 
/*		try {  */
 
			$entry = new Inquiry; 
			$entry->first_name = $first_name; 
			$entry->last_name = $last_name;
			$entry->contact = $contact;
			$entry->email = $email;
			$entry->content = $content;



			$entry->save();

			return array('status' => 1);
/*	 	} 

		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}   */
	}
 
	/**
	 * Update the specified blog post(s) in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, $first_name, $last_name, $contact, $email, $content)
	{ 
		try {
 
			$entry = Inquiry::find($id);
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
			$entry = Inquiry::find($id);

			$entry->delete();

			return array('status' => 1);
		}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}
	}

}
