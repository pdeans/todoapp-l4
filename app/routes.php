<?php

# Route-Model Binds
Route::bind('task', function($value, $route) {
   return Item::where('id', $value)->first();
});

# Homepage Route
Route::get('/', array(
   'as'     => 'home',
   'uses'   => 'HomeController@getIndex'
))->before('auth');
Route::post('/', array(
   'uses'   => 'HomeController@postIndex'
))->before('csrf');

# Create New Task Routes
Route::get('/new', array(
   'as'     => 'new',
   'uses'   => 'HomeController@getNew'
));
Route::post('/new', array(
   'uses'   => 'HomeController@postNew'
))->before('csrf');

# Delete Task Route
Route::get('/delete/{task}', array(
   'as'     => 'delete',
   'uses'   => 'HomeController@getDelete'
));

# User Login Routes
Route::get('/login', array(
   'as'     => 'login',
   'uses'   => 'AuthController@getLogin'
))->before('guest');
Route::post('login', array(
   'uses'   => 'AuthController@postLogin'
))->before('csrf');
