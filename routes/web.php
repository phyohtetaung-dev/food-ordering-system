<?php

// Index
Route::get('/', function () {
    return view('index');
});

// Subscribe
Route::get('/subscribe', [
    'uses' => 'SubscribeController@index',
    'as' => 'subscribe.index'
]);

Route::post('/subscribe/{id}', [
    'uses' => 'SubscribeController@store',
    'as' => 'subscribe.store'
]);

// Admin
Route::get('/admin/show-admin', [
    'uses' => 'AdminController@index',
    'as' => 'admin.index'
]);

Route::get('/admin/order-detail/{id}', [
    'uses' => 'AdminController@orderDetail',
    'as' => 'admin.order-detail'
]);

Route::get('/admin/deliver/{id}', [
    'uses' => 'AdminController@deliver',
    'as' => 'admin.deliver' 
]);

Route::post('/index-to-subscribe', [
    'uses' => 'AdminController@storeAdminData',
    'as' => 'admin.store-admin-data'
]);

Route::post('/login-admin', [
    'uses' => 'AdminController@loginAdmin',
    'as' => 'admin.login-admin'
]);

Route::get('/redirect', [
    'uses' => "AdminController@redirect",
    'as' => 'admin.redirect'
]);

Route::get('/callback', [
    'uses' => "AdminController@callback",
    'as' => 'admin.callback'
]);

Route::get('/google-redirect', [
    'uses' => "AdminController@googleRedirect",
    'as' => 'admin.google-redirect'
]);

Route::get('/google-callback', [
    'uses' => "AdminController@googleCallback",
    'as' => 'admin.google-callback'
]);

// User
Route::get('/user/user-sign-in', 'UserController@userSignIn');

// Route::get('/user/user-sign-up', 'UserController@userSignUp');

Route::post('/user/user-sign-in', [
    'uses' => 'UserController@signIn',
    'as' => 'user.signIn'
]);

// Route::post('/user/user-sign-up', [
//     'uses' => 'UserController@signUp',
//     'as' => 'user.signUp'
// ]);

Route::get('/user/user-logout', 'UserController@userLogout');

// Menu
Route::get('/menu/home', [
    'uses' => 'MenuController@home',
    'as' => 'menu.home'
]);

Route::get('/menu/contact', [
    'uses' => 'MenuController@contact',
    'as' => 'menu.contact'
]);

Route::get('/menu/about', [
    'uses' => 'MenuController@about',
    'as' => 'menu.about'
]);

Route::get('/menu/show-menu', [
    'uses' => 'MenuController@menus',
    'as' => 'menu.menus'
]);

Route::get('/menu/show-menu/{id}', 'MenuController@relatedMenus');

Route::get('/menu/add-to-cart/{id}', [
    'uses' => 'MenuController@getAddToCart',
    'as' => 'menu.addToCart'
]);

Route::get('/menu/view-cart', [
    'uses' => 'MenuController@getCart',
    'as' => 'menu.viewCart'
]);

Route::get('/menu/view-cart-add/{id}', [
    'uses' => 'MenuController@addQty',
    'as' => 'menu.addQty' 
]);

Route::get('/menu/view-cart-sub/{id}', [
    'uses' => 'MenuController@subQty',
    'as' => 'menu.subQty' 
]);

Route::get('/menu/view-cart-delete-item/{id}', [
    'uses' => 'MenuController@deleteItem',
    'as' => 'menu.deleteItem'
]);

Route::get('/menu/view-cart-delete', [
    'uses' => 'MenuController@delete',
    'as' => 'menu.deleteCart' 
]);

Route::get('/menu/checkout', [
    'uses' => 'MenuController@checkout',
    'as' => 'menu.checkout'
]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
