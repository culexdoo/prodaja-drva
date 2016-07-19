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

		// Ads entries, create, save, edit, update, destroy
	Route::group(array('prefix' => 'ads'), function()
	{
		Route::get('/', array('as' => 'AdsIndex', 'uses' => 'AdsController@index'));

		Route::get('show/{id}', array('as' => 'AdsShow', 'uses' => 'AdsController@show'));
 
		Route::get('create', array('as' => 'AdsCreate', 'uses' => 'AdsController@create'));

		Route::post('store', array('as' => 'AdsStore', 'uses' => 'AdsController@store'));

		Route::get('edit/{id}', array('as' => 'AdsEdit', 'uses' => 'AdsController@edit'));

		Route::post('update/{id}', array('as' => 'AdsUpdate', 'uses' => 'AdsController@update'));

		Route::get('destroy/{id}', array('as' => 'AdsDestroy', 'uses' => 'AdsController@destroy'));

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

});


/*
 *	 Frontend routes
 */

 
// Home / landing
Route::get('/', array('as' => 'getLanding', 'uses' => 'FrontendController@index')); 

// Sign in page
Route::get('sign-in', array('before' => 'guest', 'as' => 'getSignIn', 'uses' => 'FrontendController@getSignIn'));
  
// Register page
Route::get('registration', array('before' => 'guest', 'as' => 'getRegistration', 'uses' => 'FrontendController@getRegistration'));
 
// Post register page
Route::post('register-user', array('before' => 'csrf', 'as' => 'postRegister', 'uses' => 'FrontendController@postRegister'));

// Forgot password page
Route::get('forgot-password', array('as' => 'getForgotPassword', 'uses' => 'FrontendController@getForgotPassword'));
 
// Sign in processing --- 'before' => 'guest|csrf', 
Route::post('sign-me-in', array('before' => 'guest', 'as' => 'postSignIn', 'uses' => 'FrontendController@postSignIn'));

// Change language route (with redirect to Dashboard)
Route::get('change-language/{id}', array('as' => 'changeLang', 'uses' => 'CoreController@getChangeLanguage'));

// Change language route (with redirect back())
Route::get('switch-language/{id}', array('as' => 'switchLang', 'uses' => 'CoreController@getSwitchLanguage'));

// Update password when creating new user via social networks
Route::get('set-password', array('before' => 'auth', 'as' => 'getUpdatePassword', 'uses' => 'CoreController@getUpdatePassword'));

// Post update 
Route::post('update-informations', array('before' => 'auth', 'as' => 'postUpdatePassword', 'uses' => 'CoreController@postUpdatePassword'));

// Forgot password processing
Route::post('refresh-password', array('before' => 'csrf', 'as' => 'postForgotPassword', 'uses' => 'CoreController@postForgotPassword'));

// Reset password page
Route::get('reset-password/{token}', array('as' => 'getResetPassword', 'uses' => 'CoreController@getResetPassword'));;

// Post reset password
Route::post('new-password', array('before' => 'csrf', 'as' => 'postResetPassword', 'uses' => 'CoreController@postResetPassword'));

// Get verify e-mail
Route::get('verify-email', array('as' => 'getVerifyEmail', 'uses' => 'CoreController@getVerifyEmail'));

// Profile page
Route::get('profile', array('before' => 'auth', 'as' => 'getProfile', 'uses' => 'CoreController@getProfile'));

// Save profile changes
Route::post('save-profile', array('before' => 'csrf', 'as' => 'postProfile', 'uses' => 'CoreController@postProfile'));


  
