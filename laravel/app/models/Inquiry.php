<?php

class Inquiry extends Eloquent
{
	protected $table = 'inquiry';
 
	// New entry validation
	public static $store_rules = array(
		'first_name'					=>	'required'
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
			$entry = DB::table('inquiry')

				->select(
					'inquiry.id AS id',
					'inquiry.first_name AS first_name',
					'inquiry.last_name AS last_name',
					'inquiry.contact AS contact',
					'inquiry.email AS email',
					'inquiry.content AS content'


				); 

			
			if ($id != null)
			{
				// Retrieve specific entry
				$entry = $entry->where('inquiry.id', '=', $id)->first();
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