<?php

use Core\Router;


Router::post('/admin/news/add', 'Controllers\AdminController@store');
Router::get('/admin/news/add', 'Controllers\AdminController@create');
Router::get('/admin/news/{newsId}/edit', 'Controllers\AdminController@edit');
Router::post('/admin/news/{newsId}/delete', 'Controllers\AdminController@delete');
Router::post('/admin/news/{newsId}/edit', 'Controllers\AdminController@update');
Router::get('/admin/news', 'Controllers\AdminController@news');
Router::get('/logout', 'Controllers\AccountsController@logout');
Router::get('/subscribe', 'Controllers\AccountsController@subscription');
Router::post('/subscribe', 'Controllers\AccountsController@subscribe');
Router::get('/login', 'Controllers\AccountsController@login');
Router::post('/login', 'Controllers\AccountsController@auth');
Router::post('/{section}/{newsId}', 'Controllers\NewsController@comment');
Router::get('/{section}/{newsId}', 'Controllers\NewsController@news');
Router::get('/{section}', 'Controllers\HomeController@section');
Router::get('/', 'Controllers\HomeController@home');
