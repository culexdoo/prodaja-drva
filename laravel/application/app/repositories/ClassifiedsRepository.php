<?php

/*
*	ClassifiedsRepository 
*
*	Handles backend functions
*/



class ClassifiedsRepository {
 
    public function __construct(){

    }

	/**
	 * Store a newly created dentist(s) in storage.
	 *
	 * @return Response
	 */
	public function store($title, $wood, $packaging, $price, $description, $user, $region, $city, $published, $featured, $image = null)
	{ 
		try {
 
			$entry = new Classifieds;
			$entry->title = $title;
			$entry->wood = $wood;
			$entry->packaging = $packaging;
			$entry->price = $price;
			$entry->description = $description;
			$entry->user = $user; 
			$entry->region = $region; 
			$entry->city = $city;
			$entry->published = $published;
			$entry->featured = $featured;
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
	public function update($id, $title, $wood, $packaging, $price, $description, $user, $region, $city, $published, $featured, $image = null)
	{ 
		try {
 
			$entry = Classifieds::find($id);
			$entry->title = $title;
			$entry->wood = $wood;
			$entry->packaging = $packaging;
			$entry->price = $price;
			$entry->description = $description; 
			$entry->user = $user; 
			$entry->region = $region; 
			$entry->city = $city;
			$entry->published = $published;
			$entry->featured = $featured;

			$oldImage = $entry->image;
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
					-->fit(540, 380)
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

			$entry->save();

			return array('status' => 1);
	 	} 

		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}   
	}


	/**
	 * Remove the specified dentist(s) from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
public function destroy($id)
	{
		try
		{
			$entry = Classifieds::find($id);

			$entry->published = '0';

			$entry->save();

			return array('status' => 1);
		}
		catch (Exception $exp)
		{
			return array('status' => 0, 'reason' => $exp->getMessage());
		}
	}

}
