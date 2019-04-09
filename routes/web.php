<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('welcome');
})->name('home')->middleware('verified');

Auth::routes(['verify' => true]);

Route::get('auth/social', 'Auth\SocialAuthController@show')->name('social.login');
Route::get('oauth/{driver}', 'Auth\SocialAuthController@redirectToProvider')->name('social.oauth');
Route::get('oauth/{driver}/callback', 'Auth\SocialAuthController@handleProviderCallback')->name('social.callback');

Route::get('/likes', 'Api\Social\LikeController@getLikesForCurrentUser');

Route::get('@{username}', 'Users\UserController@show');
Route::get('users/{country}/{city}', 'Users\UserController@indexByCity')->middleware('cacheResponse:5');
Route::get('users/{country}', 'Users\UserController@indexByCountry')->middleware('cacheResponse:5');
Route::get('users', 'Users\UserController@index')->middleware('cacheResponse:5');
Route::get('account', 'Users\AccountController@getAccount')->middleware('verified');

Route::post('search', 'Search\SearchController@getResults');

Route::view('sponsors', 'static.sponsors');
Route::view('about', 'static.about')->middleware('cacheResponse');
Route::view('terms', 'static.terms')->middleware('cacheResponse');
Route::view('privacy', 'static.privacy')->middleware('cacheResponse');
Route::view('imprint', 'static.imprint')->middleware('cacheResponse');

Route::view('resources', 'tools.index');

Route::group(['prefix' => 'forums'], function () {
    Route::view('/', 'forums.threads.list');
    Route::resource('categories', 'Forums\ThreadCategoryController');
    Route::resource('threads', 'Forums\ThreadController');
    Route::resource('threads.replies', 'Forums\ThreadReplyController');
});

Route::ohDearWebhooks('/security/checks/ohdear');

Route::group(['prefix' => 'payments'], function () {
    Route::apiResource('subscription', 'Api\Payments\SponsorController');
});
