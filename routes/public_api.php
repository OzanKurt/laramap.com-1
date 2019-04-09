<?php

Route::get('users', 'Api\Users\UserController@index');
Route::get('users/countries', 'Api\Users\UserController@countries');
Route::get('users/cities/{country}', 'Api\Users\UserController@cities');
Route::get('users/{id}', 'Api\Users\UserController@show');
Route::get('users/filterByLocation/{country}', 'Api\Users\UserController@indexByCountry');
Route::get('users/filterByLocation/{country}/{city}', 'Api\Users\UserController@indexByCity');

Route::group(['prefix' => 'forums'], function () {
    Route::get('categories', 'Api\Forums\ThreadCategoryController@index');
    Route::get('threads', 'Api\Forums\ThreadController@index');
    Route::get('threads/{id}', 'Api\Forums\ThreadController@show');
    Route::get('threads.replies', 'Api\Forums\ThreadReplyController@index');
});
