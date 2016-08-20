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
	*	$user		->	integer	or null ->	id from reviewed user
	*	$published	->	true 	or null ->	if true, show review on page
	*	$count 		->	true 	or null ->  displays how many active reviews in database
	*	$active		->	true or null 	->	displays how many active reviews in database
	*/
	public static function getEntries($id = null, $items = null, $user = null, $published = null, $count = null, $active = null)
	{
		try
		{
			$entry = DB::table('review')
				->join('users', 'review.user', '=', 'users.id')
				->select(
					'review.id AS id',
					'review.user AS user',
					'review.reviewed_user AS reviewed_user',
					'review.review_content AS review_content',
					'review.rating AS rating',
					'review.published AS published',
					'users.username AS username'
				); 


			

			if ($id != null)
			{
				// Retrieve specific entry
				$entry = $entry->where('review.id', '=', $id)->first();
				return array('status' => 1, 'entry' => $entry);
			}

			elseif ($count != null) {
						// Retrieve number of active classifieds
						$countallreviews = DB::table('review')->count();
						return array('status' => 1, 'entry' => $countallreviews);
			}

			elseif ($active != null) {
						// Retrieve number of active classifieds
						$countactivereviews = DB::table('review')->where('review.published', '=', '1')->count();
						return array('status' => 1, 'entry' => $countactivereviews);
			}

			elseif ($user != null)
			{
				if ($published != null)
				{
					//Return published reviews for specific user
					$entries = $entry->where('review.reviewed_user', '=', $user)
									->where('review.published', '=', '1')->get();
					return array('status' => 1, 'entries' => $entries);
				}
				else {

					//Return all from specific user
					$entries = $entry->where('review.user', '=', $user)->get();
					return array('status' => 1, 'entries' => $entries);
				}	
				
			}

			elseif ($items == null)
			{
				// Return all entries
				$entries = $entry->get();
				return array('status' => 1, 'entries' => $entries);
			}
			else
			{
				// Return specific number of entries
				$entries = $entry->take($items)->get();
				return array('status' => 1, 'entries' => $entries);
			}

			 
			// Default return
			$entries = $entry;

			return array('status' => 1, 'entries' => $entries);
		}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}
	}


}