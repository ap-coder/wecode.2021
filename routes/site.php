<?php

Route::get('/', 'SiteController@index')->name('home');

Route::resource('blog', 'BlogController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

Route::resource('project', 'ProjectsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);