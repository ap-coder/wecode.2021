<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Staff
    Route::post('staff/media', 'StaffApiController@storeMedia')->name('staff.storeMedia');
    Route::apiResource('staff', 'StaffApiController');

    // Pages
    Route::apiResource('pages', 'PagesApiController');

    // Category
    Route::post('categories/media', 'CategoryApiController@storeMedia')->name('categories.storeMedia');
    Route::apiResource('categories', 'CategoryApiController');

    // Video Content
    Route::post('video-contents/media', 'VideoContentApiController@storeMedia')->name('video-contents.storeMedia');
    Route::apiResource('video-contents', 'VideoContentApiController');

    // Post
    Route::post('posts/media', 'PostApiController@storeMedia')->name('posts.storeMedia');
    Route::apiResource('posts', 'PostApiController');

    // Faq Category
    Route::apiResource('faq-categories', 'FaqCategoryApiController');

    // Pagesection
    Route::apiResource('pagesections', 'PagesectionApiController');

    // Content Section
    Route::apiResource('content-sections', 'ContentSectionApiController');
});
