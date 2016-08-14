<?php

class Blog extends Eloquent
{
	protected $table = 'blog';
 
	// New entry validation
	public static $store_rules = array(
		'title'					=>	'required',
		'intro'					=>	'required',
		'content'				=>	'required',
		'image'					=>	'required'
	);
 
	// Edit entry validation
	public static $update_rules = array(
		'id'					=>	'required|integer',
 		'title'					=>	'required',
 		'intro'					=>	'required',
		'content'				=>	'required'
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
			$entry = DB::table('blog') 
				->select(
					'blog.id AS id',
					'blog.title AS title', 
					'blog.author AS author',
					'blog.permalink AS permalink', 
					'blog.intro AS intro', 
					'blog.content AS content', 
					'blog.status AS status', 
					'blog.image AS image'  
				);
			
			
			if ($id != null)
			{
				// Retrieve specific entry
				$entry = $entry->where('blog.id', '=', $id)->first();
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