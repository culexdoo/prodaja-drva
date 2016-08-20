<?php
/*
*	Frontend Repository
*
*	Handles functions:
*/



class FrontendRepository
{
 
    public function __construct(){

    }



	// Register user
	public function registerUser($first_name, $last_name, $region, $city, $email, $username, $password, $permalink = null)
	{
		try
		{
			$newUser = new User;
			$newUser->first_name = $first_name;
			$newUser->last_name = $last_name;

			$newUser->region = $region;
			$newUser->city = $city;

			$newUser->email = $email;
			$newUser->username = $username;

			$newUser->password = Hash::make($password);

			$permalink = $username;
			$permalink = preg_replace('/[^A-Za-z0-9-]+/', '-', $permalink);

			if ($permalink != null)
			{
				$permalink = $username . '-' . (substr(md5(rand(1, 9)), 0, 5)); // renaming permalink

			}

			$newUser->permalink = $permalink;			
			
 
			$newUser->save(); 

			return array('status' => 1);
		}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}
	}
	

	/**
	 * Store a newly created classifieds in storage.
	 *
	 * @return Response
	 */
	public function classifiedsStore($user, $title, $wood, $packaging, $region, $city, $price, $description, $image = null, $permalink = null, $latitude, $longitude)
	{ 
		try {
 
			$entry = new Classifieds;
			$entry->user = $user;
			$entry->title = $title;
			$entry->wood = $wood;
			$entry->packaging = $packaging;
			$entry->region = $region;
			$entry->city = $city; 
			$entry->price = $price;
			$entry->description = $description;
			$entry->latitude = $latitude;
			$entry->longitude = $longitude;
			$string = $title;
			$string = preg_replace('/[^A-Za-z0-9-]+/', '-', $string);

			if ($image != null)
			{
				// Image data
				$largeImagePath = public_path() . "/uploads/frontend/classifieds/";
				$thumbImagePath = public_path() . "/uploads/frontend/classifieds/thumbs/";

				// Image name is the same in thumbs and full size image
				$extension = $image->getClientOriginalExtension(); // getting image extension
				$imagename = $string . '-' . (substr(md5(rand(1, 9)), 0, 5)) . '-' . date("Y-m-d.") . $extension; // renaming image

				$uploadSuccess = Image::make($image->getRealPath())
					->orientate()
					->fit(800, 600)
					->crop(400, 300)
					->save($largeImagePath . $imagename) // original
					->fit(540, 380)
					->resize(270, 190)
					->save($thumbImagePath . $imagename) // thumb
					->destroy();

				if ($uploadSuccess)
				{
					$entry->image = $imagename;
				}
			}

			$permalink = $title;
		    $search = array(
		        'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Ă'=>'A', 'Ā'=>'A', 'Ą'=>'A', 'Æ'=>'A', 'Ǽ'=>'A',
		        'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'ă'=>'a', 'ā'=>'a', 'ą'=>'a', 'æ'=>'a', 'ǽ'=>'a',

		        'Þ'=>'B', 'þ'=>'b', 'ß'=>'Ss',

		        'Ç'=>'C', 'Č'=>'C', 'Ć'=>'C', 'Ĉ'=>'C', 'Ċ'=>'C',
		        'ç'=>'c', 'č'=>'c', 'ć'=>'c', 'ĉ'=>'c', 'ċ'=>'c',

		        'Đ'=>'Dj', 'Ď'=>'D', 'Đ'=>'D',
		        'đ'=>'dj', 'ď'=>'d',

		        'È'=>'E', 'É'=>'E', 'Ê'=>'E', 'Ë'=>'E', 'Ĕ'=>'E', 'Ē'=>'E', 'Ę'=>'E', 'Ė'=>'E',
		        'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ĕ'=>'e', 'ē'=>'e', 'ę'=>'e', 'ė'=>'e',

		        'Ĝ'=>'G', 'Ğ'=>'G', 'Ġ'=>'G', 'Ģ'=>'G',
		        'ĝ'=>'g', 'ğ'=>'g', 'ġ'=>'g', 'ģ'=>'g',

		        'Ĥ'=>'H', 'Ħ'=>'H',
		        'ĥ'=>'h', 'ħ'=>'h',

		        'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'İ'=>'I', 'Ĩ'=>'I', 'Ī'=>'I', 'Ĭ'=>'I', 'Į'=>'I',
		        'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'į'=>'i', 'ĩ'=>'i', 'ī'=>'i', 'ĭ'=>'i', 'ı'=>'i',

		        'Ĵ'=>'J',
		        'ĵ'=>'j',

		        'Ķ'=>'K',
		        'ķ'=>'k', 'ĸ'=>'k',

		        'Ĺ'=>'L', 'Ļ'=>'L', 'Ľ'=>'L', 'Ŀ'=>'L', 'Ł'=>'L',
		        'ĺ'=>'l', 'ļ'=>'l', 'ľ'=>'l', 'ŀ'=>'l', 'ł'=>'l',

		        'Ñ'=>'N', 'Ń'=>'N', 'Ň'=>'N', 'Ņ'=>'N', 'Ŋ'=>'N',
		        'ñ'=>'n', 'ń'=>'n', 'ň'=>'n', 'ņ'=>'n', 'ŋ'=>'n', 'ŉ'=>'n',

		        'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ō'=>'O', 'Ŏ'=>'O', 'Ő'=>'O', 'Œ'=>'O',
		        'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ō'=>'o', 'ŏ'=>'o', 'ő'=>'o', 'œ'=>'o', 'ð'=>'o',

		        'Ŕ'=>'R', 'Ř'=>'R',
		        'ŕ'=>'r', 'ř'=>'r', 'ŗ'=>'r',

		        'Š'=>'S', 'Ŝ'=>'S', 'Ś'=>'S', 'Ş'=>'S',
		        'š'=>'s', 'ŝ'=>'s', 'ś'=>'s', 'ş'=>'s',

		        'Ŧ'=>'T', 'Ţ'=>'T', 'Ť'=>'T',
		        'ŧ'=>'t', 'ţ'=>'t', 'ť'=>'t',

		        'Ù'=>'U', 'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ũ'=>'U', 'Ū'=>'U', 'Ŭ'=>'U', 'Ů'=>'U', 'Ű'=>'U', 'Ų'=>'U',
		        'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ü'=>'u', 'ũ'=>'u', 'ū'=>'u', 'ŭ'=>'u', 'ů'=>'u', 'ű'=>'u', 'ų'=>'u',

		        'Ŵ'=>'W', 'Ẁ'=>'W', 'Ẃ'=>'W', 'Ẅ'=>'W',
		        'ŵ'=>'w', 'ẁ'=>'w', 'ẃ'=>'w', 'ẅ'=>'w',

		        'Ý'=>'Y', 'Ÿ'=>'Y', 'Ŷ'=>'Y',
		        'ý'=>'y', 'ÿ'=>'y', 'ŷ'=>'y',

		        'Ž'=>'Z', 'Ź'=>'Z', 'Ż'=>'Z', 'Ž'=>'Z',
		        'ž'=>'z', 'ź'=>'z', 'ż'=>'z', 'ž'=>'z',

		        '“'=>'"', '”'=>'"', '‘'=>"'", '’'=>"'", '•'=>'-', '…'=>'...', '—'=>'-', '–'=>'-', '¿'=>'?', '¡'=>'!', '°'=>' degrees ',
		        '¼'=>' 1/4 ', '½'=>' 1/2 ', '¾'=>' 3/4 ', '⅓'=>' 1/3 ', '⅔'=>' 2/3 ', '⅛'=>' 1/8 ', '⅜'=>' 3/8 ', '⅝'=>' 5/8 ', '⅞'=>' 7/8 ',
		        '÷'=>' divided by ', '×'=>' times ', '±'=>' plus-minus ', '√'=>' square root ', '∞'=>' infinity ',
		        '≈'=>' almost equal to ', '≠'=>' not equal to ', '≡'=>' identical to ', '≤'=>' less than or equal to ', '≥'=>' greater than or equal to ',
		        '←'=>' left ', '→'=>' right ', '↑'=>' up ', '↓'=>' down ', '↔'=>' left and right ', '↕'=>' up and down ',
		        '℅'=>' care of ', '℮' => ' estimated ',
		        'Ω'=>' ohm ',
		        '♀'=>' female ', '♂'=>' male ',
		        '©'=>' Copyright ', '®'=>' Registered ', '™' =>' Trademark ',
		        '-'=>'-', ' '=>'-', '  '=>'-', ' - '=>'-', '- '=>'-', ' -'=>'-',
		    );

		    $permalink = strtr($permalink, $search);
		    // Currency symbols: £¤¥€  - we dont bother with them for now
		    $permalink = preg_replace("/[^\x9\xA\xD\x20-\x7F]/u", "", $permalink);
			$permalink = mb_strtolower($permalink);

			if ($permalink != null)
			{
				$permalink = $permalink . '-' . (substr(md5(rand(1, 9)), 0, 5)); // renaming permalink

			}

			$entry->permalink = $permalink;

			$entry->save();
			
			return array('status' => 1);
	 	} 

		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}   
	}

	public function UpdateClassified($id, $user, $title, $wood, $packaging, $region, $city, $price, $description, $image = null, $permalink, $latitude, $longitude)
	{ 
		
	try {


 
			$entry = Classifieds::find($id);
			$entry->user = $user;
			$entry->title = $title;
			$entry->wood = $wood;
			$entry->packaging = $packaging;
			$entry->region = $region;
			$entry->city = $city;
			$entry->price = $price;
			$entry->description = $description; 
			$entry->permalink = $permalink;
			$oldImage = $entry->image;
			$entry->latitude = $latitude;
			$entry->longitude = $longitude;
			$string = $title;
			$string = preg_replace('/[^A-Za-z0-9-]+/', '-', $string);

			if ($image != null)
			{
				// Image data
				$largeImagePath = public_path() . "/uploads/frontend/classifieds/";
				$thumbImagePath = public_path() . "/uploads/frontend/classifieds/thumbs/";

				// Image name is the same in thumbs and full size image
				$extension = $image->getClientOriginalExtension(); // getting image extension
				$imagename = $string . '-' . (substr(md5(rand(1, 9)), 0, 5)) . '-' . date("Y-m-d.") . $extension; // renaming image

				$uploadSuccess = Image::make($image->getRealPath())
					->orientate()
					->fit(800, 600)
					->crop(400, 300)
					->save($largeImagePath . $imagename) // original
					->fit(540, 380)
					->resize(270, 190)
					->save($thumbImagePath . $imagename) // thumb
					->destroy();

				if ($uploadSuccess)
				{
					$largeOldImagePath = public_path() . "/uploads/frontend/classifieds/" . $oldImage;
					$thumbOldImagePath = public_path() . "/uploads/frontend/classifieds/thumbs"  . $oldImage;

					if (File::exists($largeOldImagePath))
					{
						File::delete($largeOldImagePath);
					}
					if (File::exists($thumbOldImagePath))
					{
						File::delete($thumbOldImagePath);
					}

					$entry->image = $imagename;
				}
			}

			$permalink = $title;
		    $search = array(
		        'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Ă'=>'A', 'Ā'=>'A', 'Ą'=>'A', 'Æ'=>'A', 'Ǽ'=>'A',
		        'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'ă'=>'a', 'ā'=>'a', 'ą'=>'a', 'æ'=>'a', 'ǽ'=>'a',

		        'Þ'=>'B', 'þ'=>'b', 'ß'=>'Ss',

		        'Ç'=>'C', 'Č'=>'C', 'Ć'=>'C', 'Ĉ'=>'C', 'Ċ'=>'C',
		        'ç'=>'c', 'č'=>'c', 'ć'=>'c', 'ĉ'=>'c', 'ċ'=>'c',

		        'Đ'=>'Dj', 'Ď'=>'D', 'Đ'=>'D',
		        'đ'=>'dj', 'ď'=>'d',

		        'È'=>'E', 'É'=>'E', 'Ê'=>'E', 'Ë'=>'E', 'Ĕ'=>'E', 'Ē'=>'E', 'Ę'=>'E', 'Ė'=>'E',
		        'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ĕ'=>'e', 'ē'=>'e', 'ę'=>'e', 'ė'=>'e',

		        'Ĝ'=>'G', 'Ğ'=>'G', 'Ġ'=>'G', 'Ģ'=>'G',
		        'ĝ'=>'g', 'ğ'=>'g', 'ġ'=>'g', 'ģ'=>'g',

		        'Ĥ'=>'H', 'Ħ'=>'H',
		        'ĥ'=>'h', 'ħ'=>'h',

		        'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'İ'=>'I', 'Ĩ'=>'I', 'Ī'=>'I', 'Ĭ'=>'I', 'Į'=>'I',
		        'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'į'=>'i', 'ĩ'=>'i', 'ī'=>'i', 'ĭ'=>'i', 'ı'=>'i',

		        'Ĵ'=>'J',
		        'ĵ'=>'j',

		        'Ķ'=>'K',
		        'ķ'=>'k', 'ĸ'=>'k',

		        'Ĺ'=>'L', 'Ļ'=>'L', 'Ľ'=>'L', 'Ŀ'=>'L', 'Ł'=>'L',
		        'ĺ'=>'l', 'ļ'=>'l', 'ľ'=>'l', 'ŀ'=>'l', 'ł'=>'l',

		        'Ñ'=>'N', 'Ń'=>'N', 'Ň'=>'N', 'Ņ'=>'N', 'Ŋ'=>'N',
		        'ñ'=>'n', 'ń'=>'n', 'ň'=>'n', 'ņ'=>'n', 'ŋ'=>'n', 'ŉ'=>'n',

		        'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ō'=>'O', 'Ŏ'=>'O', 'Ő'=>'O', 'Œ'=>'O',
		        'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ō'=>'o', 'ŏ'=>'o', 'ő'=>'o', 'œ'=>'o', 'ð'=>'o',

		        'Ŕ'=>'R', 'Ř'=>'R',
		        'ŕ'=>'r', 'ř'=>'r', 'ŗ'=>'r',

		        'Š'=>'S', 'Ŝ'=>'S', 'Ś'=>'S', 'Ş'=>'S',
		        'š'=>'s', 'ŝ'=>'s', 'ś'=>'s', 'ş'=>'s',

		        'Ŧ'=>'T', 'Ţ'=>'T', 'Ť'=>'T',
		        'ŧ'=>'t', 'ţ'=>'t', 'ť'=>'t',

		        'Ù'=>'U', 'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ũ'=>'U', 'Ū'=>'U', 'Ŭ'=>'U', 'Ů'=>'U', 'Ű'=>'U', 'Ų'=>'U',
		        'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ü'=>'u', 'ũ'=>'u', 'ū'=>'u', 'ŭ'=>'u', 'ů'=>'u', 'ű'=>'u', 'ų'=>'u',

		        'Ŵ'=>'W', 'Ẁ'=>'W', 'Ẃ'=>'W', 'Ẅ'=>'W',
		        'ŵ'=>'w', 'ẁ'=>'w', 'ẃ'=>'w', 'ẅ'=>'w',

		        'Ý'=>'Y', 'Ÿ'=>'Y', 'Ŷ'=>'Y',
		        'ý'=>'y', 'ÿ'=>'y', 'ŷ'=>'y',

		        'Ž'=>'Z', 'Ź'=>'Z', 'Ż'=>'Z', 'Ž'=>'Z',
		        'ž'=>'z', 'ź'=>'z', 'ż'=>'z', 'ž'=>'z',

		        '“'=>'"', '”'=>'"', '‘'=>"'", '’'=>"'", '•'=>'-', '…'=>'...', '—'=>'-', '–'=>'-', '¿'=>'?', '¡'=>'!', '°'=>' degrees ',
		        '¼'=>' 1/4 ', '½'=>' 1/2 ', '¾'=>' 3/4 ', '⅓'=>' 1/3 ', '⅔'=>' 2/3 ', '⅛'=>' 1/8 ', '⅜'=>' 3/8 ', '⅝'=>' 5/8 ', '⅞'=>' 7/8 ',
		        '÷'=>' divided by ', '×'=>' times ', '±'=>' plus-minus ', '√'=>' square root ', '∞'=>' infinity ',
		        '≈'=>' almost equal to ', '≠'=>' not equal to ', '≡'=>' identical to ', '≤'=>' less than or equal to ', '≥'=>' greater than or equal to ',
		        '←'=>' left ', '→'=>' right ', '↑'=>' up ', '↓'=>' down ', '↔'=>' left and right ', '↕'=>' up and down ',
		        '℅'=>' care of ', '℮' => ' estimated ',
		        'Ω'=>' ohm ',
		        '♀'=>' female ', '♂'=>' male ',
		        '©'=>' Copyright ', '®'=>' Registered ', '™' =>' Trademark ',
		        '-'=>'-', ' '=>'-', '  '=>'-', ' - '=>'-', '- '=>'-', ' -'=>'-',
		    );

		    $permalink = strtr($permalink, $search);
		    // Currency symbols: £¤¥€  - we dont bother with them for now
		    $permalink = preg_replace("/[^\x9\xA\xD\x20-\x7F]/u", "", $permalink);
			$permalink = mb_strtolower($permalink);

			if ($permalink != null)
			{
				$permalink = $permalink . '-' . (substr(md5(rand(1, 9)), 0, 5)); // renaming permalink

			}

			$entry->permalink = $permalink;

			$entry->save();

			return array('status' => 1);
	 	} 

	 	catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}  
	}


	public function inquiryStore($first_name, $last_name, $contact, $email, $content)
	{ 
		try {
 
			$entry = new Inquiry;
			$entry->first_name = $first_name;
			$entry->last_name = $last_name;
			$entry->contact = $contact;
			$entry->email = $email;
			$entry->content = $content;

			


			$entry->save();
			
			return array('status' => 1);
	 	} 

		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}   
	}


	public function UpdateMyProfile($id, $permalink, $user_info, $first_name, $last_name, $username, $email, $city, $contact1, $region, $contact2, $date_of_birth, $image = null)
	{ 
		try {


 
			$entry = Users::find($id);
			$entry->permalink = $permalink;
			$entry->user_info = $user_info;
			$entry->first_name = $first_name;
			$entry->last_name = $last_name;
			$entry->username = $username;
			$entry->email = $email;
			$entry->city = $city;
			$entry->contact1 = $contact1; 
			$entry->region = $region;
			$entry->contact2 = $contact2;
			$entry->date_of_birth = $date_of_birth;
			$oldImage = $entry->image;
			$string = $first_name . '-' . $last_name;
			$string = preg_replace('/[^A-Za-z0-9-]+/', '-', $string);

			if ($image != null)
			{
				// Image data
				$largeImagePath = public_path() . "/uploads/frontend/users/";
				$thumbImagePath = public_path() . "/uploads/frontend/users/thumbs/";

				// Image name is the same in thumbs and full size image
				$extension = $image->getClientOriginalExtension(); // getting image extension
				$imagename = $string . '-' . (substr(md5(rand(1, 9)), 0, 5)) . '-' . date("Y-m-d.") . $extension; // renaming image

				$uploadSuccess = Image::make($image->getRealPath())
					->orientate()
					->fit(768, 1024)
					->save($largeImagePath . $imagename) // original
					->crop(768, 768)
					->resize(270, 270)
					->save($thumbImagePath . $imagename) // thumb
					->destroy();

				if ($uploadSuccess)
				{
					$largeOldImagePath = public_path() . "/uploads/frontend/users/" . $oldImage;
					$thumbOldImagePath = public_path() . "/uploads/frontend/users/thumbs"  . $oldImage;

					if (File::exists($largeOldImagePath))
					{
						File::delete($largeOldImagePath);
					}
					if (File::exists($thumbOldImagePath))
					{
						File::delete($thumbOldImagePath);
					}

					$entry->image = $imagename;
				}
			}

			$entry->save();

			return array('status' => 1);
	 	} 

		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}   
	}


}
