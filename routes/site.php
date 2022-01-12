<?php

Route::get('/', 'SiteController@index')->name('home');

Route::resource('blog', 'BlogController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

Route::resource('portfolio', 'ProjectsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

// Route::resource('/{pagepath}/{pageslug}', 'PagesController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

Route::get('/{pagepath}/{pageslug}', 'PagesController@show')->name('page.show');