<?php

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/', 'IndexController@index');
Route::get('/About', 'AboutController@About');
Route::get('/Contacts', 'ContactsController@Contacts');
Route::get('/Features', 'FeaturesController@Features');
Route::get('/Hosting', 'HostingController@Hosting');
Route::get('/Support', 'SupportController@Support');



Route::get('login', function () {
    return view('auth.login');
});

Auth::routes();
Route::get('logout', 'Auth\LoginController@logout');
/*
|------------------------------------------------------------------------------------
| Admin
|------------------------------------------------------------------------------------
*/
Route::group(['prefix' => ADMIN, 'as' => ADMIN . '.', 'middleware'=>['auth']], function() {
    Route::get('/', ['uses'=>'DashboardController@index', 'as'=>'dash']);
    Route::resource('categories', 'CategoriesController');
    Route::resource('users', 'UsersController')->middleware('Role:Superadmin|Admin');
    Route::get('profileedit/{id}', 'ProfileController@edit');
    Route::put('profileupdate/{id}', 'ProfileController@update');
});
