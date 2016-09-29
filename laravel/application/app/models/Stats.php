<?php

class Stats extends Eloquent
{
	protected $table = 'stats';

	 	/*
	*	Get entries  
	*	
	*	$permalink 		->	integer or null	->	if ID, retrieve specific entry
	*/
	public static function getEntries($permalink = null)
	{
		try
		{
			$entry = DB::table('stats') 
				->select(
					'stats.id AS id',
					'stats.permalink AS permalink', 
					'stats.hits AS hits'  
				);
			
			
			if ($permalink != null)
			{
				// Retrieve specific entry
				$entry = $entry->where('stats.permalink', '=', $permalink)->first();
				return array('status' => 1, 'entry' => $entry);
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