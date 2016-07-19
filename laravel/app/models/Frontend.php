<?php

class Frontend extends Eloquent
{
	protected $table = 'users';
 
	// New entry validation
	public static $store_rules = array(
		'title'					=>	'required'
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
	/*	try 
		{*/
			$entry = DB::table('users') 
				->select(
					'users.id AS id',
					'users.first_name AS first_name',
					'users.last_name AS last_name',
					'users.username AS username',
					'users.region AS region',
					'users.city AS city',
					'users.date_of_birth AS date_of_birth',
					'users.email AS email',
					'users.password AS password',
					'users.contact1 AS contact1',
					'users.contact2 AS contact2',
					'users.additional_notes AS additional_notes',
					'users.user_info AS user_info',
					'users.user_group AS user_group',
					'users.profile_image AS profile_image',
					'users.created_at AS created_at',
					'users.updated_at AS updated_at'
				);
			if ($id != null)
			{
				// Retrieve specific entry
				$entry = $entry->where('users.id', '=', $id)->first();
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
	/*	}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		} */
	}


	


}