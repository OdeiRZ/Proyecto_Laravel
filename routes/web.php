<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', 'PagesController@home');
Route::get('/messages/{message}', 'MessagesController@show');
Route::get('/locale', 'PagesController@locale');
Route::get('/auth/facebook', 'SocialAuthController@facebook');
Route::get('/auth/facebook/callback', 'SocialAuthController@callback');
Route::post('/auth/facebook/register', 'SocialAuthController@register');
Route::get('/messages', 'MessagesController@search');
Route::group(['middleware' => 'auth'], function() {
    Route::post('/messages/create', 'MessagesController@create');
    Route::get('/conversation/{conversation}', 'UsersController@showConversation');
    Route::post('/{username}/dms', 'UsersController@sendPrivateMessage');
    Route::post('/{username}/follow', 'UsersController@follow');
    Route::post('/{username}/unfollow', 'UsersController@unfollow');
    Route::get('/api/notifications', 'UsersController@notifications');
});
Route::get('/api/messages/{message}/responses', 'MessagesController@responses');
Route::get('/{username}', 'UsersController@show');
Route::get('/{username}/follows', 'UsersController@follows');
Route::get('/{username}/followers', 'UsersController@followers');
Route::get('/messages/{username}', 'UsersController@show');
