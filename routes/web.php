<?php

//admin login
Route::get('admin/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('admin/login', 'Auth\AdminLoginController@login');

Route::get('/','test2Controller@displaycategory');
Route::get('/event/name/{id}','test2Controller@displayevents');

Auth::routes();
Route::group(["middleware"=>"auth"], function(){

	Route::get('/editProfile', 'UserProfileController@viewEditProfile');
	Route::post('/editProfile', 'UserProfileController@editProfile');
	Route::get('/profile/user/{id}',"UserProfileController@logviewProfile");
	Route::get('/profile/user',"UserProfileController@viewMyProfile");

	Route::get('/userprofile', 'UserProfileController@index');
	
	Route::get('/event/profile/{name}', "UserProfileController@selectEvents")->where('{name}','=','accepted'|'waiting'|'rejected '|'interested '); 
	Route::get('/create','EventController@showCreateForm');
	Route::post('/create',"EventController@store");

	Route::get('/edit/{id}','EventController@showEvents');
	Route::post("/edit/{id}","EventController@editEvents");

	Route::get("/delete/{id}","EventController@delete");
	Route::get('contact', 'FeedbackController@getFeedback');
    Route::post('contact', 'FeedbackController@postFeedback');

    Route::post('/comment/{id}','EventDetailsController@storecomment');

});

// Route::get('user','TestController@displayloc');

Route::get('index', function () {
    return view('layouts/index');
});


Route::group(["middleware"=>["auth:admin", "admin"]], function(){

	Route::get('/dash','AdminController@display')->name('admin.dashboard');

	//edit admin profile
	Route::get('/editadminprofile','AdminController@ShowAdminProfile');
	Route::post('/editadminprofile','AdminController@EditAdminProfile');
	//admin event 
	Route::get('/adminmanageevents','AdminController@showAllEvents');
	Route::post('/adminmanageevents/{id}','AdminController@approve');

	//admin category
	Route::get('/editCategory','AdminController@showAllCategory');
	Route::post('/editCategory','AdminController@addCategory');
	Route::get("/delete/category/{id}","AdminController@deleteCategory");
	Route::post("editCategory/cat","AdminController@editCategory");

	//admin user
	Route::get('/adminManageUsers','AdminController@getAllUsers');
	Route::get('/adminManageUsers/{id}','AdminController@deleteUser');

	//admin location
	Route::get('/adminmanagelocation','AdminController@getAllLocation');
	Route::get('/adminmanagelocation/{id}','AdminController@deleteLocation');
	Route::post('/adminmanagelocation','AdminController@addLocation');

	//create event
	Route::get('/adminCreateEvent','AdminController@showCreateForm');
	Route::post('/adminCreateEvent',"AdminController@store");
	//edit event
	Route::get('/adminEditEvent/{id}','AdminController@showEvents');
	Route::post("/adminEditEvent/{id}","AdminController@editEvents");

	Route::get('/admin/manage/waitings','AdminController@adminManageWiatings');
	Route::post('/admin/manage/waitings/{id}','AdminController@adminApproveWiatings');

	Route::get('/adminManageComments','CommentsController@getAllComments');
	Route::post('/toggle-approve','CommentsController@approval');

});

//user view user
Route::get('/user/view/user/profile/{id}',"UserProfileController@viewUserProfile");

Route::get('/details/{id}','EventDetailsController@get_event_details');
Route::post('/details/{id}','EventDetailsController@post_event_details');
