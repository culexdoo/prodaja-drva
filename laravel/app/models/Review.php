<?php

class Review extends Eloquent
{
	protected $table = 'review';
 
	// New entry validation
	public static $store_rules = array(
		'user'					=>	'required'
	);
 
	// Edit entry validation
	public static $update_rules = array(
		'id'					=>	'required|integer'
	);
 
	/*
	*	Get entries  
	*	
	*	$id 		->	integer or null	->	if ID, retrieve specific entry
	*	$items		->	integer	or null ->	number of items to retrieve, fallback to all 
	*/
	public static function getEntries($id = null, $items = null)
	{
		try
		{
			$entry = DB::table('review')

				->select(
					'review.id AS id',
					'review.user AS user',
					'review.reviewed_user AS reviewed_user',
					'review.review_content AS review_content',
					'review.rating AS rating'

				); 

			
			if ($id != null)
			{
				// Retrieve specific entry
				$entry = $entry->where('review.id', '=', $id)->first();
				return array('status' => 1, 'entry' => $entry);
			}

			// Default return
			$entries = $entry; 
		  
			if ($items == null)
			{
				// Return all entries
				$entries = $entries->get();
			}
			else
			{
				// Return specific number of entries
				$entries = $entries->take($items)->get();
			}

			return array('status' => 1, 'entries' => $entries);
		}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}
	}


}