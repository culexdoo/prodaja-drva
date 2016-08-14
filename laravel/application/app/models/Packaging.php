<?php

class Packaging extends Eloquent
{
	protected $table = 'review';
 
	// New entry validation
	public static $store_rules = array(
		'name'					=>	'required'
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
	public static function getEntries($id = null, $items = null, $permalink = null)
	{
		try
		{
			$entry = DB::table('packaging') 
				->select(
					'packaging.id AS id', 
					'packaging.name AS name',
					'packaging.permalink AS permalink'
				);
			
			if ($permalink != null)
			{
				// Retrieve specific entry
				$entry = $entry->where('packaging.permalink', '=', $permalink)->first();
				return array('status' => 1, 'entry' => $entry);
			}
			
			if ($id != null)
			{
				// Retrieve specific entry
				$entry = $entry->where('packaging.id', '=', $id)->first();
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