<?php

/*
*	UsersRepository 
*
*	Handles backend functions
*/



class UsersRepository {
 
    public function __construct(){

    }
 
 

	/**
	 * Store a newly created dentist(s) in storage.
	 *
	 * @return Response
	 */
	public function store($first_name, $last_name, $username, $region, $city, $date_of_birth, $email, $password, $contact1, $contact2, $additional_notes, $user_info, $published, $image = null)
	{ 
		try {
 
			$entry = new Users; 
			$entry->first_name = $first_name;
			$entry->last_name = $last_name;
			$entry->username = $username;
			$entry->region = $region;
			$entry->city = $city;
			$entry->date_of_birth = $date_of_birth; 
			$entry->email = $email;
			$entry->password = Hash::make($password);
			$entry->contact1 = $contact1;
			$entry->contact2 = $contact2;
			$entry->additional_notes = $additional_notes;
			$entry->user_info = $user_info;
			$entry->published =  $published;
			$string = $first_name . '-' . $last_name;

			$permalink = $username;

			if ($permalink != null)
			{
				$permalink = $username . '-' . (substr(md5(rand(1, 9)), 0, 5)); // renaming permalink

			}

			$entry->permalink = $permalink;

			$string = preg_replace('/[^A-Za-z0-9-]+/', '-', $string);

			if ($image != null)
			{
				// Image data
				$largeImagePath = public_path() . "/uploads/frontend/users/";
				$thumbImagePath = public_path() . "/uploads/frontend/users/thumbs/";

				// Image name is the same in thumbs and full size image
				$extension = $image->getClientOriginalExtension(); // getting image extension
				$imagename = $string . '-' . (substr(md5(rand(1, 9)), 0, 5)) . '-' . 'prodaja-drva' . $extension; // renaming image

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
 
	/**
	 * Update the specified blog post(s) in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, $first_name, $last_name, $username, $region, $city, $date_of_birth, $email, $password, $contact1, $contact2, $additional_notes, $user_info, $image = null)
	{ 
		try {
 
			$entry = Users::find($id);
			$entry->first_name = $first_name;
			$entry->last_name = $last_name;
			$entry->username = $username;
			$entry->region = $region;
			$entry->city = $city;
			$entry->date_of_birth = $date_of_birth; 
			$entry->email = $email;
			$entry->password = Hash::make($password);
			$entry->contact1 = $contact1;
			$entry->contact2 = $contact2;
			$entry->additional_notes = $additional_notes;
			$entry->user_info = $user_info;
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


	/**
	 * Remove the specified user(s) from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
public function destroy($id)
	{
		try
		{

			$classified = Classifieds::getEntries(null, null, $id, null, null, null, null, null, null, null, null, null);
			 

			foreach ($classified['entries'] as $classified) { 

				$classified = Classifieds::find($classified->id, null, null, null, null, null, null, null, null, null, null, null);

				$classified->published = '0';

				$classified->save();
 
			}

			$review = Review::getEntries(null, null, $id, null, null);

			foreach ($review['entries'] as $review) { 

				$review = Review::find($review->id, null, null, null, null);

				$review->published = '0';

				$review->save();
 
			}
				
			$user = Users::find($id);

			$user->published = '0';

			$user->save(); 

			return array('status' => 1);
		}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}
	}

}
