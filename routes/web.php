<?php

Route::get('/form', function () {


});

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

Route::get('/', 'AdminAuth\AuthController@showLoginForm')->name('login');


Route::get('/logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
Route::post('/logout', 'Auth\LoginController@logout')->name('userLogout');
Route::get('/password-reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password-reset');


//// Authentication Routes...
//Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
//Route::post('login', 'Auth\LoginController@login');
//Route::post('logout', 'Auth\LoginController@logout')->name('logout');
//
//// Registration Routes...
//Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
//Route::post('register', 'Auth\RegisterController@register');
//
//// Password Reset Routes...
//Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
//Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
//Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
//Route::post('password/reset', 'Auth\ResetPasswordController@reset');
//

Auth::routes();


////////////////////////////////////////////////////Admin Panel/////////////////////////

Route::group(['middleware' => ['admin']], function () {

    Route::post('/dashboard', array(
        'as' => 'post.dashboard',
        'uses' => 'Admin\AdminController@dashboard'));

    Route::get('/dashboard', array(
        'as' => 'get.dashboard',
        'uses' => 'Admin\AdminController@dashboard'));


    Route::get('/dashboard/logout', array(
        'as' => 'logout',
        'uses' => 'AdminAuth\AuthController@logout'));

    Route::get('/dashboard/profile', array(
        'as' => 'view.profile',
        'uses' => 'Admin\AdminController@viewProfile'));


////////////////////////////////Users Routes///////////////////////////////////
    Route::get('/user', array(
        'as' => 'user.index',
        'uses' => 'Admin\UserController@index'));

    Route::post('/user/add', array(
        'as' => 'user.add',
        'uses' => 'Admin\UserController@store'));


    Route::get('/user/{id}', array(
        'as' => 'user.edit',
        'uses' => 'Admin\UserController@edit'));

    Route::post('/user/{id}', array(
        'as' => 'user.update',
        'uses' => 'Admin\UserController@update'));


    Route::get('/user/delete/{id}', array(
        'as' => 'user.delete',
        'uses' => 'Admin\UserController@destroy'));


////////////////////////////////owner Routes///////////////////////////////////

    Route::get('/dashboard/owner/add', array(
        'as' => 'owner.add.new',
        'uses' => 'Admin\OwnerController@viewProfile'));


    Route::get('/dashboard/owner/show', array(
        'as' => 'owner.show',
        'uses' => 'Admin\OwnerController@show'));


    Route::get('/dashboard/owner/edit', array(
        'as' => 'owner.edit',
        'uses' => 'Admin\OwnerController@edit'));


    Route::post('/dashboard/owner/store', array(
        'as' => 'post.owner.store',
        'uses' => 'Admin\OwnerController@store'));


    Route::post('/dashboard/owner/update', array(
        'as' => 'post.owner.update',
        'uses' => 'Admin\OwnerController@update'));

    Route::post('/dashboard/owner/verify', array(
        'as' => 'post.owner.verify',
        'uses' => 'Admin\OwnerController@verify'));

    Route::post('/dashboard/owner/addlot', array(
        'as' => 'post.owner.assign.lot',
        'uses' => 'Admin\LotController@assignLot'));

    Route::post('/dashboard/owner/carpark', array(
        'as' => 'post.owner.assign.carpark',
        'uses' => 'Admin\CarParkController@assignCarPark'));

    Route::get('/dashboard/owner/assign-lot', array(
        'as' => 'owner.assign.lot',
        'uses' => 'Admin\OwnerController@assignLot'));

    Route::get('/dashboard/owner/list-assign-lot', array(
        'as' => 'owner.list.assign.lot',
        'uses' => 'Admin\OwnerController@listOfAssignLot'));

    Route::get('/dashboard/owner/sell-to-other', array(
        'as' => 'owner.lot.sell.other',
        'uses' => 'Admin\OwnerController@settToOther'));


////////////////////////////////////////////////////////////////////////
});



