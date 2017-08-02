<?php
use Illuminate\Support\Facades\App;

Route::get('/form',function (){

    $snappy = App::make('snappy.pdf');
//To file
    $html = '<h1>Bill</h1><p>You owe me money, dude.</p>';
    $snappy->generateFromHtml($html, '/tmp/bill-123.pdf');
    $snappy->generate('http://www.github.com', '/tmp/github.pdf');
//Or output:
    return new Response(
        $snappy->getOutputFromHtml($html),
        200,
        array(
            'Content-Type'          => 'application/pdf',
            'Content-Disposition'   => 'attachment; filename="file.pdf"'
        )
    );

    return view('admin/original/form-element');

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



////////////////////////////////////////////////////Admin Pannel/////////////////////////


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
        'as' => 'post.owner.add.lots',
        'uses' => 'Admin\OwnerController@verify'));



////////////////////////////////////////////////////////////////////////
});



