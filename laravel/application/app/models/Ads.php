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
	*	$id 				->	integer or null	->	if ID, retrieve specific entry
	*	$permalink			->	integer	or null ->	if permalink, retrieve specific entry
	*	$user				->	integer	or null ->	items of this user, fallback to all 
	*	$published			->	true 	or null ->	display published ads 
	*	$featured			->	true 	or null ->	display featured ads 
	*	$items				->	integer	or null ->	items of specific user, fallback to all 
	*	$paginate			->	true	or null ->	---
	*	$woodcategory		->	integer or null	->	displays ads by wood category
	*	$region 			->	integer or null	->	displays ads by region
	*	$packaging			->	integer or null ->	displays ads by packaging category
	*	$count				->	true or null 	->	displays how many active ads in database
	*	$new				->	true or null 	->	displays how many new ads in database
	*	$active				->	true or null 	->	displays how many active ads in database
	*/
	
	public static function getEntries($id = null, $permalink = null, $user = null, $published = null, $featured = null, $items = null, $paginate = null, $woodcategory = null, $region = null, $packaging = null, $count = null, $new = null, $active = null )
	{
		try
		{
			$entry = DB::table('ads') 
				->join('users', 'ads.user', '=', 'users.id')
				->join('region', 'ads.region', '=', 'region.id')
				->join('wood', 'ads.wood', '=', 'wood.id')
				->join('packaging', 'ads.packaging', '=', 'packaging.id')
				->select(
					'ads.id AS id', 
					'ads.title AS title',
					'ads.permalink AS permalink',
					'ads.wood AS wood',
					'ads.packaging AS packaging',
					'ads.price AS price',
					'ads.description AS description',
					'ads.user AS user',
					'ads.region AS region',
					'ads.city AS city',
					'ads.published AS published',
					'ads.featured AS featured',
					'ads.image AS image',
					'ads.created_at AS created_at',
					'ads.latitude AS latitude',
					'ads.longitude AS longitude',
					'users.email AS email',
					'users.username AS username',
					'region.name AS regionname',
					'wood.name AS woodname',
					'wood.permalink AS woodpermalink',
					'packaging.name AS packagingname'
				);			

			if ($new != null) {
						
						//get newest ads and displays on frontend
						$from = date('Y-m-d H:i:s', strtotime('-8 days'));
						$now = date('Y-m-d H:i:s');
						$new = Ads::whereBetween('created_at', array($from, $now))->count();
						return array('status' => 1, 'entry' => $new);
			}



			elseif ($count != null) {

						// Retrieve all ads
						$countallads = DB::table('ads')->count();
						return array('status' => 1, 'entry' => $countallads);
			}

			elseif ($active != null) {

						// Retrieve all ads
						$countactiveads = DB::table('ads')->where('ads.published', '=', '1')->count();
						return array('status' => 1, 'entry' => $countactiveads);
			}

			elseif 	($region != null) {

						// Retrieve specific entry
						$entries = $entry->where('ads.region', '=', $region)
											->where('ads.published', '=', '1')->paginate(10);
						return array('status' => 1, 'entries' => $entries);
			}

			elseif 	($woodcategory != null) {

						// Retrieve specific entry
						$entries = $entry->where('ads.wood', '=', $woodcategory)
											->where('ads.published', '=', '1')->paginate(10);
						return array('status' => 1, 'entries' => $entries);
			}

			elseif  ($packaging != null) {

						// Retrieve specific entry
						$entries = $entry->where('ads.packaging', '=', $packaging)
											->where('ads.published', '=', '1')->paginate(10);
						return array('status' => 1, 'entries' => $entries);
			}

			elseif 	($id != null) {
						
						// Retrieve specific entry
						$entry = $entry->where('ads.id', '=', $id)->first();
						return array('status' => 1, 'entry' => $entry);
				}

				

				elseif ($permalink != null) {
					if ($published != null) {
						
						// get one by permalink and published
						$entry = $entry->where('ads.published', '=', $published)->first();
						return array('status' => 1, 'entry' => $entry);
					}
					else {
						
						// get one by permalink 
						$entry = $entry->where('ads.permalink', '=', $permalink)->first();
						return array('status' => 1, 'entry' => $entry);
					}
				}

				else {
					if($user != null) {
						if ($items != null) {
							if ($published != null) {
								
								// get all by user with number and published
								$entry = $entry->where('ads.published', '=', $published)->take($items);
								return array('status' => 1, 'entry' => $entry);
							}
							else {
								// get all by user with number 
								$entry = $entry->where('ads.user', '=', $user)->take($items);
								return array('status' => 1, 'entry' => $entry);
							}

						}

						elseif ($published == 'true') {
								if ($featured == 'true') { 
								 	
								 	//get all  published and featured from specific user
									$entries = $entry->where('ads.featured', '=', '1')->get();
									return array('status' => 1, 'entries' => $entries);
								}
								else { 
									// get all published from specific user
									$entries = $entry->where('ads.published', '=', '1')->where('ads.user', '=', $user)->get();
									return array('status' => 1, 'entries' => $entries);

								}
							}

							else {

								// get all ads from specific user
								$entry = $entry->where('ads.user', '=', $user)->get();
								return array('status' => 1, 'entries' => $entry);

							}

					}
					else {
						
							if ($items != null) {
									if ($published != null) {
										if ($featured != null) {
									
										// get specific number of featured
										$entry = $entry->where('ads.featured', '=', '1')->take($items)->get();
										return array('status' => 1, 'entry' => $entry);
									}
									else {

										// get all published
										$entry = $entry->where('ads.published', '=', '1')->take($items)->orderBy('id', 'DESC')->get();
										return array('status' => 1, 'entry' => $entry);
								}
								}
								else {

										//get all 
										$entries = $entry->take($items)->get();
										return array ('status' => 1, 'entries' => $entries);

								}

							}
						}

						if ($published != null) {
							if ($featured != null) { 
							 	
							 	//get all  published and featured
								$entry = $entry->where('ads.featured', '=', '1')->get();
								return array('status' => 1, 'entries' => $entry);
							}
							else { 
								// get all published
								$entry = $entry->where('ads.published', '=', '1')->paginate(10);
								return array('status' => 1, 'entries' => $entry);
							}
						}
					}
					

			// Default return
			$entries = $entry->get(); 
		

			return array('status' => 1, 'entries' => $entries);
		}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		} 
	}
}


