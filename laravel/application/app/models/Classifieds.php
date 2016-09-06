<?php

class Classifieds extends Eloquent
{
	protected $table = 'classifieds';
 
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
	*	$published			->	true 	or null ->	display published classifieds 
	*	$featured			->	true 	or null ->	display featured classifieds 
	*	$items				->	integer	or null ->	items of specific user, fallback to all 
	*	$paginate			->	true	or null ->	---
	*	$woodcategory		->	integer or null	->	displays classifieds by wood category
	*	$region 			->	integer or null	->	displays classifieds by region
	*	$packaging			->	integer or null ->	displays classifieds by packaging category
	*	$count				->	true or null 	->	displays how many active classifieds in database
	*	$new				->	true or null 	->	displays how many new classifieds in database
	*	$active				->	true or null 	->	displays how many active classifieds in database
	*/
	
	public static function getEntries($id = null, $permalink = null, $user = null, $published = null, $featured = null, $items = null, $paginate = null, $woodcategory = null, $region = null, $packaging = null, $count = null, $new = null, $active = null )
	{
		try
		{
			$entry = DB::table('classifieds') 
				->join('users', 'classifieds.user', '=', 'users.id')
				->join('region', 'classifieds.region', '=', 'region.id')
				->join('wood', 'classifieds.wood', '=', 'wood.id')
				->join('packaging', 'classifieds.packaging', '=', 'packaging.id')
				->select(
					'classifieds.id AS id', 
					'classifieds.title AS title',
					'classifieds.permalink AS permalink',
					'classifieds.wood AS wood',
					'classifieds.packaging AS packaging',
					'classifieds.price AS price',
					'classifieds.description AS description',
					'classifieds.user AS user',
					'classifieds.region AS region',
					'classifieds.city AS city',
					'classifieds.published AS published',
					'classifieds.featured AS featured',
					'classifieds.image AS image',
					'classifieds.created_at AS created_at',
					'classifieds.latitude AS latitude',
					'classifieds.longitude AS longitude',
					'users.email AS email',
					'users.username AS username',
					'users.permalink AS userpermalink',
					'region.name AS regionname',
					'wood.name AS woodname',
					'wood.permalink AS woodpermalink',
					'packaging.permalink AS packagingpermalink',
					'region.permalink AS regionpermalink',
					'packaging.name AS packagingname'
				);		

			if ($new != null) {
						
						//get newest classifieds and displays on frontend
						$from = date('Y-m-d H:i:s', strtotime('-8 days'));
						$now = date('Y-m-d H:i:s');
						$new = Classifieds::whereBetween('created_at', array($from, $now))->count();
						return array('status' => 1, 'entry' => $new);
			}

			elseif ($count != null) {

						// Retrieve all classifieds
						$countallclassifieds = DB::table('classifieds')->count();
						return array('status' => 1, 'entry' => $countallclassifieds);
			}

			elseif ($active != null) {

						// Retrieve all classifieds
						$countactiveclassifieds = DB::table('classifieds')->where('classifieds.published', '=', '1')->count();
						return array('status' => 1, 'entry' => $countactiveclassifieds);
			}

			elseif 	($region != null) {

						// Retrieve specific entry
						$entries = $entry->where('classifieds.region', '=', $region)
											->where('classifieds.published', '=', '1')->paginate(6);
						return array('status' => 1, 'entries' => $entries);
			}

			elseif 	($woodcategory != null) {

						// Retrieve specific entry
						$entries = $entry->where('classifieds.wood', '=', $woodcategory)
											->where('classifieds.published', '=', '1')->paginate(6);
						return array('status' => 1, 'entries' => $entries);
			}

			elseif  ($packaging != null) {

						// Retrieve specific entry
						$entries = $entry->where('classifieds.packaging', '=', $packaging)
											->where('classifieds.published', '=', '1')->paginate(6);
						return array('status' => 1, 'entries' => $entries);
			}

			elseif 	($id != null) {
						
						// Retrieve specific entry
						$entry = $entry->where('classifieds.id', '=', $id)->first();
						return array('status' => 1, 'entry' => $entry);
				}

				

				elseif ($permalink != null) {
					if ($published != null) {
						
						// get one by permalink and published
						$entry = $entry->where('classifieds.published', '=', $published)->first();
						return array('status' => 1, 'entry' => $entry);
					}
					else {
						
						// get one by permalink 
						$entry = $entry->where('classifieds.permalink', '=', $permalink)->first();
						return array('status' => 1, 'entry' => $entry);
					}
				}

				else {
					if($user != null) {
						if ($items != null) {
							if ($published != null) {
								
								// get all by user with number and published
								$entry = $entry->where('classifieds.published', '=', $published)->take($items);
								return array('status' => 1, 'entry' => $entry);
							}
							else {
								// get all by user with number 
								$entry = $entry->where('classifieds.user', '=', $user)->take($items);
								return array('status' => 1, 'entry' => $entry);
							}

						}

						elseif ($published == 'true') {
								if ($featured == 'true') { 
								 	
								 	//get all  published and featured from specific user
									$entries = $entry->where('classifieds.featured', '=', '1')->get();
									return array('status' => 1, 'entries' => $entries);
								}
								else { 
									// get all published from specific user
									$entries = $entry->where('classifieds.published', '=', '1')->where('classifieds.user', '=', $user)->get();
									return array('status' => 1, 'entries' => $entries);

								}
							}

							else {

								// get all classifieds from specific user
								$entry = $entry->where('classifieds.user', '=', $user)->orderBy('id', 'DESC')->get();
								return array('status' => 1, 'entries' => $entry);

							}

					}
					else {
						
							if ($items != null) {
									if ($published != null) {
										if ($featured != null) {
									
										// get specific number of featured
										$entry = $entry->where('classifieds.featured', '=', '1')->take($items)->get();
										return array('status' => 1, 'entry' => $entry);
									}
									else {

										// get all published
										$entry = $entry->where('classifieds.published', '=', '1')->take($items)->orderBy('id', 'DESC')->get();
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
								$entry = $entry->where('classifieds.featured', '=', '1')->get();
								return array('status' => 1, 'entries' => $entry);
							}
							else { 
								// get all published
								$entry = $entry->where('classifieds.published', '=', '1')->orderBy('id', 'DESC')->paginate(10);
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


