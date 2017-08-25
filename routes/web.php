<?php

use App\Models\LotType;
use Barryvdh\Snappy\Facades\SnappyPdf as PDF;

Route::get('/download', function () {

    $lotTypes = LotType::all();

    $data = array(
        'lotTypes' => $lotTypes,
    );

    $pdf = PDF::loadView('admin/reports/pdf',$data);
//    return $pdf->setOption('margin-top', 5)->stream();
    return $pdf->download('invoice.pdf');

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

Route::group(['middleware' => ['admin'], 'namespace' => 'Admin'], function () {

    Route::resource('invoices', 'InvoicesController');

    Route::post('/dashboard', array(
        'as' => 'post.dashboard',
        'uses' => 'AdminController@dashboard'));

    Route::get('/dashboard', array(
        'as' => 'get.dashboard',
        'uses' => 'AdminController@dashboard'));

    Route::get('/dashboard/profile', array(
        'as' => 'view.profile',
        'uses' => 'AdminController@viewProfile'));


////////////////////////////////Users Routes///////////////////////////////////
//    Route::get('/user', array(
//        'as' => 'user.index',
//        'uses' => 'UserController@index'));
//
//    Route::post('/user/add', array(
//        'as' => 'user.add',
//        'uses' => 'UserController@store'));
//
//
//    Route::get('/user/{id}', array(
//        'as' => 'user.edit',
//        'uses' => 'UserController@edit'));
//
//    Route::post('/user/{id}', array(
//        'as' => 'user.update',
//        'uses' => 'UserController@update'));
//
//
//    Route::get('/user/delete/{id}', array(
//        'as' => 'user.delete',
//        'uses' => 'UserController@destroy'));


////////////////////////////////owner Routes///////////////////////////////////

    Route::get('/dashboard/owner/add', array(
        'as' => 'owner.add.new',
        'uses' => 'OwnerController@viewProfile'));


    Route::get('/dashboard/owner/show', array(
        'as' => 'owner.show',
        'uses' => 'OwnerController@show'));


    Route::get('/dashboard/owner/edit', array(
        'as' => 'owner.edit',
        'uses' => 'OwnerController@edit'));


    Route::post('/dashboard/owner/store', array(
        'as' => 'post.owner.store',
        'uses' => 'OwnerController@store'));


    Route::post('/dashboard/owner/update', array(
        'as' => 'post.owner.update',
        'uses' => 'OwnerController@update'));

    Route::post('/dashboard/owner/verify', array(
        'as' => 'post.owner.verify',
        'uses' => 'OwnerController@verify'));


    Route::post('/dashboard/owner/car-park', array(
        'as' => 'post.owner.assign.carpark',
        'uses' => 'CarParkController@assignCarPark'));


    Route::get('/dashboard/owner/assign-lot', array(
        'as' => 'owner.assign.lot',
        'uses' => 'LotController@assignLotShow'));

    Route::post('/dashboard/owner/assign-lot/save', array(
        'as' => 'post.owner.assign.lot',
        'uses' => 'LotController@assignLotSave'));


    Route::get('/dashboard/owner/assign-lot/list', array(
        'as' => 'owner.list.assign.lot',
        'uses' => 'LotController@listOfAssignLot'));

    Route::get('/dashboard/owner/assign-lot/ajaxCall', array(
        'as' => 'owner.assign.lot.ajax',
        'uses' => 'LotController@ajaxCall'));



    Route::get('/dashboard/owner/sell-to-other', array(
        'as' => 'owner.lot.sell.other',
        'uses' => 'LotController@sellToOther'));

    Route::post('/dashboard/owner/sell-to-other', array(
        'as' => 'post.owner.sell.to.others',
        'uses' => 'LotController@sellToOtherStore'));

    Route::get('/dashboard/owner/check-owner-bills/ajaxCall', array(
        'as' => 'owner.bills.check',
        'uses' => 'LotController@checkOwnerBills'));


//////////////////////////////////////////////////Lots Management/////////

    Route::get('/dashboard/lot/add', array(
        'as' => 'get.lot.list',
        'uses' => 'LotController@show'));

    Route::post('/dashboard/lot/add/save-lot-type', array(
        'as' => 'post.lot.save.lotType',
        'uses' => 'LotController@saveLotType'));

    Route::get('/dashboard/lot/delete{id}', array(
        'as' => 'lot.type.delete',
        'uses' => 'LotController@deleteLotType'));

//////////////////////////////////////////////////
});

//////METER MANAGEMENT///////////
Route::prefix('/dashboard/meter')->namespace('Admin')->group(function () {

    Route::get('/', [
        'as' => 'meter.index',
        'uses' => 'MeterController@index'
    ]);

    Route::get('/create', [
        'as' => 'meter.create',
        'uses' => 'MeterController@create'
    ]);

    Route::post('/create', [
        'as' => 'meter.store',
        'uses' => 'MeterController@store'
    ]);

    Route::delete('/type/{id}', [
        'as' => 'meter.type.delete',
        'uses' => 'MeterController@deleteMeterType'
    ]);

    Route::delete('/rate/{id}', [
        'as' => 'meter.rate.delete',
        'uses' => 'MeterController@deleteMeterRate'
    ]);

});

Route::group(['middleware' => 'admin', 'namespace' => 'AdminAuth'], function () {

    Route::get('/dashboard/logout', array(
        'as' => 'logout',
        'uses' => 'AuthController@logout'));
});



