<?php

Route::apiResource('users', 'Api\Users\UserController');
Route::apiResource('notifications', 'Api\Users\NotificationController');
Route::apiResource('countries', 'Api\Countries\CountryController');

Route::post('notifications/clear', 'Api\Users\NotificationController@destroy');

Route::group(['prefix' => 'forums'], function () {
    Route::apiResource('categories', 'Api\Forums\ThreadCategoryController');
    Route::apiResource('threads', 'Api\Forums\ThreadController');
    Route::apiResource('threads.replies', 'Api\Forums\ThreadReplyController');
});
