<?php

Route::get('/', 'SiteController@index')->name('home');

Route::resource('services', 'ServiceController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

Route::resource('blog', 'BlogController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

Route::resource('portfolio', 'ProjectsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

Route::resource('faqs', 'FaqsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

Route::resource('our-clients', 'OurClientController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

Route::resource('discuss', 'DiscussionsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

Route::get('discuss/{topic?}/{slug?}', 'DiscussionsController@show')->name('discuss.show');
Route::post('storeReply', 'DiscussionsController@storeReply')->name('discuss.storeReply');

// Route::resource('/{pagepath}/{pageslug}', 'PagesController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

Route::get('/{pagepath}/{pageslug}', 'PagesController@show')->name('page.show');