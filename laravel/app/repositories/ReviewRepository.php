<?php

/*
*	ReviewRepository 
*
*	Handles backend functions
*/



class ReviewRepository {
 
    public function __construct(){

    }
 
 

	/**
	 * Store a newly created dentist(s) in storage.
	 *
	 * @return Response
	 */
	public function store($user, $reviewed_user, $review_content, $rating)
	{ 
/*		try {  */
 
			$entry = new Review; 
			$entry->user = $user; 
			$entry->reviewed_user = $reviewed_user;
			$entry->review_content = $review_content;
			$entry->rating = $rating;


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
	public function update($id, $user, $reviewed_user, $review_content, $rating)
	{ 
		try {
 
			$entry = Review::find($id);
			$entry->user = $user; 
			$entry->reviewed_user = $reviewed_user;
			$entry->review_content = $review_content;
			$entry->rating = $rating;

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
			$entry = Review::find($id);

			$entry->delete();

			return array('status' => 1);
		}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}
	}

}
