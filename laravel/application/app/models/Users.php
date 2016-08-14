<?php

class Users extends Eloquent
{
	protected $table = 'users';
 
	// New entry validation
	public static $store_rules = array(
		'first_name'					=>	'required'
	);
 
	// Edit entry validation
	public static $update_rules = array(
		'id'					=>	'required|integer'
	);

	// New registration
	public static $register_rules = array(
		'username'					=>	'required' 
	);
 
	/*
	*	Get entries  
	*	
	*	$id 		->	integer or null	->	if ID, retrieve specific entry
	*	$items		->	integer	or null ->	number of items to retrieve, fallback to all 
	*	$permalink 	->	integer or null	->	if permalink, retrieve specific entry
	*	$count		->	true or null 	->	displays how many active users in database
	*	$active		->	true or null 	->	displays how many active users in database
	*/
	public static function getEntries($id = null, $items = null, $permalink = null, $count = null, $active = null)
	{
		 try
		{    
			$entry = DB::table('users') 
				->join('city', 'users.city', '=', 'city.id')
				->select(
					'users.id AS id',
					'users.permalink AS permalink',
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
					'users.created_at AS created_at',
					'users.image AS image',
					'users.published AS published',
					'city.name AS name'

				);

			if ($count != null) {

				// Retrieve all users
				$countallusers = DB::table('users')->count();
				return array('status' => 1, 'entry' => $countallusers);
			}

			elseif ($active != null) {

				// Retrieve number of active users
				$countactiveusers = DB::table('users')->where('users.published', '=', '1')->count();
				return array('status' => 1, 'entry' => $countactiveusers);
			}
			
			
			elseif ($id != null)
			{
				// Retrieve specific entry
				$entry = $entry->where('users.id', '=', $id)->first();
				return array('status' => 1, 'entry' => $entry);
			}

			elseif ($permalink != null)
			{
				// Retrieve specific entry
				$entry = $entry->where('users.permalink', '=', $permalink)->first();
				return array('status' => 1, 'entry' => $entry);
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