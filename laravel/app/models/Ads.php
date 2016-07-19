<?php

class Ads extends Eloquent
{
	protected $table = 'ads';
 
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
			$entry = DB::table('ads') 
				->join('users', 'ads.username', '=', 'users.id')
				->select(
					'ads.id AS id', 
					'ads.title AS title',
					'ads.wood AS wood',
					'ads.packaging AS packaging',
					'ads.price AS price',
					'ads.description AS description',
					'ads.username AS username',
					'ads.region AS region',
					'ads.city AS city',
					'ads.email AS email',
					'ads.contact1 AS contact1',
					'ads.contact2 AS contact2',
					'users.username AS username',
					'users.email AS email' 
				);
			
			
			if ($id != null)
			{
				// Retrieve specific entry
				$entry = $entry->where('ads.id', '=', $id)->first();
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