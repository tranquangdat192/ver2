<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('home');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'home'], function()
{
    Route::get('/{slug}', 'HomeController@showCategory')->name('category');
});

Route::get('/account', 'AccountController@index')->name('account');

Route::get('/shopping-cart', 'CartController@index')->name('shopping-cart');

Route::get('/checkout', function () {
    return view('components.checkout');
})->name('checkout');

Route::get('/contact', function () {
    return view('components.contact');
});

Route::get('/category', function () {
    return view('components.category');
});

Route::group(['prefix' => 'products'], function()
{
    Route::get('/{slug}', 'ProductController@detail')->where('slug', '[0-9]+')->name('product');
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('/login', 'AdminController@login')->name('pageLoginAdmin');
    Route::group(['middleware' => 'admin'], function(){
        Route::get('/', 'AdminController@index')->name('admin');
        Route::get('/{slug}', 'AdminController@detail')->name('adminDetail');
        Route::get('/{slug}/{id}', 'AdminController@editAdmin')->where('id', '[0-9]+')->name('adminEdit');
        Route::post('/edit', 'AdminController@edit')->name('edit');
        Route::get('/{slug}/add', 'AdminController@addAdmin')->name('adminAdd');
        Route::post('/add', 'AdminController@add')->name('add');
        Route::post('/delete', 'AdminController@delete')->name('delete');
        Route::post('/deleteAll', 'AdminController@deleteAll')->name('deleteAll');
    });
});

Route::post('checkGuest', 'CheckoutController@checkGuest');
Route::post('checkBilling', 'CheckoutController@checkBilling');
Route::post('save', 'CheckoutController@save');
Route::get('/thankyou', function () {
    return view('components.thankyou');
});

Route::post('checkRegister', 'Auth\RegisterController@checkRegister');
Route::post('loginUser', 'Auth\LoginController@loginUser');
Route::post('loginAdmin', 'AdminController@loginAdmin')->name('loginAdmin');
Route::get('logout', 'Auth\LoginController@logout');
Route::get('logoutAdmin', 'AdminController@logout')->name('logoutAdmin');
Auth::routes();