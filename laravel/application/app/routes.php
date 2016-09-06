<?php

/*
 *	Prodaja drva core routes
 */



// Test route
Route::get('test', array('as' => 'getTest', 'uses' => 'CoreController@getTest'));
 

Route::get('/updateapp', function()
{
	\Artisan::call('dump-autoload');
	echo 'dump-autoload complete';
});




// Sign in page for admin

Route::get('admin-sign-in', array('before' => 'guest', 'as' => 'AdminSignIn', 'uses' => 'CoreController@adminsignin'));

// Sign in processing --- 'before' => 'guest|csrf', 
Route::post('admin-sign-me-in', array('before' => 'guest', 'as' => 'AdminLogIn', 'uses' => 'CoreController@adminlogin'));

// Sign out
Route::get('sign-out', array('before' => 'auth', 'as' => 'SignOut', 'uses' => 'CoreController@signout'));

 /* 	 
 * 	Backend routes
 */
Route::group(array('prefix' => 'admin'), function()
{

	/*
	 *	Dashboard
	 *
	 *	- available only to logged in users
	 *	- Controller handles the type and file loading depending on user role
	 */ 

	Route::get('/', array('as' => 'getDashboard', 'uses' => 'DashboardController@index'));


		// Users accounts, create, save, edit, update, destroy
	Route::group(array('prefix' => 'users'), function()
	{
		Route::get('/', array('as' => 'UsersIndex', 'uses' => 'UsersController@index'));

		Route::get('show/{id}', array('as' => 'UsersShow', 'uses' => 'UsersController@show'));
 
		Route::get('create', array('as' => 'UsersCreate', 'uses' => 'UsersController@create'));

		Route::post('store', array('as' => 'UsersStore', 'uses' => 'UsersController@store'));

		Route::get('edit/{id}', array('as' => 'UsersEdit', 'uses' => 'UsersController@edit'));

		Route::post('update/{id}', array('as' => 'UsersUpdate', 'uses' => 'UsersController@update'));

		Route::get('destroy/{id}', array('as' => 'UsersDestroy', 'uses' => 'UsersController@destroy'));

	});

		// Classifieds entries, create, save, edit, update, destroy
	Route::group(array('prefix' => 'classifieds'), function()
	{
		Route::get('/', array('as' => 'ClassifiedsIndex', 'uses' => 'ClassifiedsController@index'));

		Route::get('show/{id}', array('as' => 'ClassifiedsShow', 'uses' => 'ClassifiedsController@show'));
 
		Route::get('create', array('as' => 'ClassifiedsCreate', 'uses' => 'ClassifiedsController@create'));

		Route::post('store', array('as' => 'ClassifiedsStore', 'uses' => 'ClassifiedsController@store'));

		Route::get('edit/{id}', array('as' => 'ClassifiedsEdit', 'uses' => 'ClassifiedsController@edit'));

		Route::post('update/{id}', array('as' => 'ClassifiedsUpdate', 'uses' => 'ClassifiedsController@update'));

		Route::get('destroy/{id}', array('as' => 'ClassifiedsDestroy', 'uses' => 'ClassifiedsController@destroy'));

	});


	// Review, create, save, edit, update, destroy
	Route::group(array('prefix' => 'review'), function()
	{
		Route::get('/', array('as' => 'ReviewIndex', 'uses' => 'ReviewController@index'));

		Route::get('show/{id}', array('as' => 'ReviewShow', 'uses' => 'ReviewController@show'));
 
		Route::get('create', array('as' => 'ReviewCreate', 'uses' => 'ReviewController@create'));

		Route::post('store', array('as' => 'ReviewStore', 'uses' => 'ReviewController@store'));

		Route::get('edit/{id}', array('as' => 'ReviewEdit', 'uses' => 'ReviewController@edit'));

		Route::post('update/{id}', array('as' => 'ReviewUpdate', 'uses' => 'ReviewController@update'));

		Route::get('destroy/{id}', array('as' => 'ReviewDestroy', 'uses' => 'ReviewController@destroy'));

	});

	// Inquiry, create, save, edit, update, destroy
	Route::group(array('prefix' => 'inquiry'), function()
	{
		Route::get('/', array('as' => 'InquiryIndex', 'uses' => 'InquiryController@index'));

		Route::get('show/{id}', array('as' => 'InquiryShow', 'uses' => 'InquiryController@show'));
 
		Route::get('create', array('as' => 'InquiryCreate', 'uses' => 'InquiryController@create'));

		Route::post('store', array('as' => 'InquiryStore', 'uses' => 'InquiryController@store'));

		Route::get('edit/{id}', array('as' => 'InquiryEdit', 'uses' => 'InquiryController@edit'));

		Route::post('update/{id}', array('as' => 'InquiryUpdate', 'uses' => 'InquiryController@update'));

		Route::get('destroy/{id}', array('as' => 'InquiryDestroy', 'uses' => 'InquiryController@destroy'));

	});

});


/*
 *	 Frontend routes
 */



 
	// Home / landing
	Route::get('/', array('as' => 'getLanding', 'uses' => 'FrontendController@index')); 


	// Sign in / out 

		// Sign in page
		Route::get('sign-in', array('before' => 'guest', 'as' => 'getSignIn', 'uses' => 'FrontendController@getSignIn'));

		// Sign in page
		Route::get('prijava', array('before' => 'guest', 'as' => 'getSignIn', 'uses' => 'FrontendController@getSignIn'));

		// Sign in processing --- 'before' => 'guest|csrf', 
		Route::post('prijavi-me', array('before' => 'guest', 'as' => 'postSignIn', 'uses' => 'FrontendController@postSignIn'));

		// Sign out
		Route::get('odjava', array('before' => 'auth', 'as' => 'SignOut', 'uses' => 'FrontendController@signout'));
  

	// Registration and verification 

		// Registration page
		Route::get('registracija', array('before' => 'guest', 'as' => 'getRegistration', 'uses' => 'FrontendController@getRegistration'));
		 
		// Post register page
		Route::post('registracija-korisnika', array('before' => 'csrf', 'as' => 'postRegister', 'uses' => 'FrontendController@postRegister'));

		// Get verify e-mail
		Route::get('email-potvrda', array('as' => 'getVerifyEmail', 'uses' => 'CoreController@getVerifyEmail'));




	// Forgot password and password recovery 

		// Forgot password page
		Route::get('forgot-password', array('as' => 'getForgotPassword', 'uses' => 'FrontendController@getForgotPassword'));

		// Forgot password processing
		Route::post('refresh-password', array('before' => 'csrf', 'as' => 'postRemind', 'uses' => 'RemindersController@postRemind'));

		// Reset password page
		Route::get('reset-password/{token}', array('as' => 'getResetPassword', 'uses' => 'CoreController@getResetPassword'));;

		// Post reset password
		Route::post('new-password', array('before' => 'csrf', 'as' => 'postResetPassword', 'uses' => 'CoreController@postResetPassword'));

		// Password recovery page
		Route::get('password-recovery', array('as' => 'passwordRecovery', 'uses' => 'FrontendController@passwordRecovery'));




	// Show, edit, update destroy profile 

		// Profile page
		Route::get('profil', array('before' => 'auth', 'as' => 'getProfile', 'uses' => 'CoreController@getProfile'));

		// Save profile changes
		Route::post('save-profile', array('before' => 'csrf', 'as' => 'postProfile', 'uses' => 'CoreController@postProfile'));

		// My profile page
		Route::get('moj-profil/{id}', array('as' => 'MyProfile', 'uses' => 'FrontendController@MyProfile'));

		// Update my profile page
		Route::get('moj-profil/uredi/{id}', array('as' => 'EditMyProfile', 'uses' => 'FrontendController@EditMyProfile'));

		// Update my profile page
		Route::post('moj-profil/azuriraj/{id}', array('as' => 'UpdateMyProfile', 'uses' => 'FrontendController@UpdateMyProfile'));

		// User profile page
		Route::get('profil-korisnika/{permalink}', array('as' => 'UserProfile', 'uses' => 'FrontendController@UserProfile'));




	// Create, edit, store, show, update, destroy classifieds 

		// Create classified
		Route::get('kreiraj-oglas', array('before' => 'auth', 'as' => 'CreateClassified', 'uses' => 'FrontendController@CreateClassified'));

		// Edit classified 
		Route::get('uredi-oglas/{id}', array('as' => 'EditClassified', 'uses' => 'FrontendController@EditClassified'));

		// Edit classified page
		Route::post('azuriraj-oglas/{id}', array('as' => 'UpdateClassified', 'uses' => 'FrontendController@UpdateClassified'));

		// Store classified 
		Route::post('spremi-oglas', array('as' => 'classifiedsStore', 'uses' => 'FrontendController@classifiedsStore'));

		// Classified list page
		Route::get('oglasi', array('as' => 'ClassifiedList', 'uses' => 'FrontendController@ClassifiedList'));

		// Single classified page
		Route::get('oglas/{permalink}', array('as' => 'ShowClassified', 'uses' => 'FrontendController@ShowClassified'));




	// Search classifieds by parameter 

		// Search by wood category
		Route::get('oglasi/drvo/{woodcategory}', array ('as' => 'ListClassifiedsByWoodCategory', 'uses' => 'FrontendController@listclassifiedsbywoodcategory'));

		// Search by region
		Route::get('oglasi/regija/{region}', array ('as' => 'ListClassifiedsByRegion', 'uses' => 'FrontendController@listclassifiedsbyregion'));

		// Search by packaging category
		Route::get('oglasi/pakiranje/{packagingcategory}', array ('as' => 'ListClassifiedsByPackagingCategory', 'uses' => 'FrontendController@listclassifiedsbypackagingcategory'));

		// Search classifieds
		Route::get('oglasi/rezultati-pretrage', array('as' => 'SearchClassifieds', 'uses' => 'FrontendController@SearchClassifieds'));



	// Info pages 

		// Contact page
		Route::get('kontakt', array('as' => 'contact', 'uses' => 'FrontendController@contact'));

		// About page
		Route::get('o-nama', array('as' => 'about', 'uses' => 'FrontendController@about'));

		// Uvjeti koristenja page
		Route::get('uvjeti-koristenja', array('as' => 'UvjetiKoristenja', 'uses' => 'FrontendController@uvjetikoristenja'));

		// Izjava o privatnosti page
		Route::get('izjava-o-privatnosti', array('as' => 'IzjavaOPrivatnosti', 'uses' => 'FrontendController@izjavaoprivatnosti'));



	// Inquiry page 

		// Store inquiry from contact page
		Route::post('store-inquiry', array('as' => 'inquiryStore', 'uses' => 'FrontendController@inquiryStore'));

	






