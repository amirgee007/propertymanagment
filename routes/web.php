<?php

use App\Models\LotType;
use Barryvdh\Snappy\Facades\SnappyPdf as PDF;

Route::get('/download', function () {

    $lotTypes = LotType::all();

    $data = array(
        'lotTypes' => $lotTypes,
    );

    $pdf = PDF::loadView('admin/reports/pdf', $data);
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

    Route::group(['prefix' => 'invoices'], function () {
        Route::post('/owner/lots', 'InvoicesController@getOwnerLots')->name('filter.owner.lots');
        Route::get('/download/pdf/{invoice_id}', 'InvoicesController@getPDF')->name('invoices.pdf');
        Route::post('/record/payment', 'InvoicesController@recordPayment')->name('invoices.record.payment');
        Route::post('/send/payment/email', 'InvoicesController@sendMailPayment')->name('invoices.send.payment');
    });


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


    Route::group(['prefix' => 'dashboard/owner'], function () {

        Route::get('/index', array(
            'as' => 'owner.index',
            'uses' => 'OwnerController@index'));

        Route::get('/add', array(
            'as' => 'owner.add.new',
            'uses' => 'OwnerController@viewProfile'));


        Route::get('/show/{owner_id}', array(
            'as' => 'owner.show',
            'uses' => 'OwnerController@show'));


        Route::get('/edit/{owner_id}', array(
            'as' => 'owner.edit',
            'uses' => 'OwnerController@edit'));

        Route::delete('/destroy/{owner_id}', array(
            'as' => 'owner.destroy',
            'uses' => 'OwnerController@destroy'));

        Route::post('/store', array(
            'as' => 'post.owner.store',
            'uses' => 'OwnerController@store'));


        Route::post('/update', array(
            'as' => 'post.owner.update',
            'uses' => 'OwnerController@update'));

        Route::post('/verify', array(
            'as' => 'post.owner.verify',
            'uses' => 'OwnerController@verify'));


        Route::post('/car-park', array(
            'as' => 'post.owner.assign.carpark',
            'uses' => 'CarParkController@assignCarPark'));


        Route::get('/assign-lot', array(
            'as' => 'owner.assign.lot',
            'uses' => 'LotController@assignLotShow'));

        Route::post('/assign-lot/save', array(
            'as' => 'post.owner.assign.lot',
            'uses' => 'LotController@assignLotSave'));


        Route::get('/assign-lot/list', array(
            'as' => 'owner.list.assign.lot',
            'uses' => 'LotController@listOfAssignLot'));

        Route::get('/assign-lot/ajaxCall', array(
            'as' => 'owner.assign.lot.ajax',
            'uses' => 'LotController@ajaxCall'));


        Route::get('/sell-to-other', array(
            'as' => 'owner.lot.sell.other',
            'uses' => 'LotController@sellToOther'));

        Route::post('/sell-to-other', array(
            'as' => 'post.owner.sell.to.others',
            'uses' => 'LotController@sellToOtherStore'));

        Route::get('/check-owner-bills/ajaxCall', array(
            'as' => 'owner.bills.check',
            'uses' => 'LotController@checkOwnerBills'));
    });


//////////////////////////////////////////////////Lots Management/////////

    Route::get('/dashboard/lot/add', array(
        'as' => 'get.lot.list',
        'uses' => 'LotController@show'));

    Route::get('/dashboard/lot/show/{id}', array(
            'as' => 'get.lot.show',
            'uses' => 'LotController@showLotsTable'));

    Route::post('/dashboard/lot/add/save-lot-type', array(
        'as' => 'post.lot.save.lotType',
        'uses' => 'LotController@saveLotType'));

    Route::get('/dashboard/lot/delete{id}', array(
        'as' => 'lot.type.delete',
        'uses' => 'LotController@deleteLotType'));

    Route::get('/dashboard/lot/manage', array(
        'as' => 'get.lot.manage',
        'uses' => 'LotController@getLotManage'));

//////////////////////////////////////////////////


//////METER MANAGEMENT///////////
    Route::prefix('/dashboard/meter')->group(function () {

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

        Route::get('/type/{id}/edit', [
            'as' => 'meter.type.edit',
            'uses' => 'MeterController@meterTypeEdit'
        ]);

        Route::put('/type/{id}/edit', [
            'as' => 'meter.type.edit.put',
            'uses' => 'MeterController@meterTypeUpdate'
        ]);

        ////////////////***METER RATE***////////////////
        Route::get('/rate/', [
            'as' => 'meter.rate.index',
            'uses' => 'MeterController@meterRateIndex'
        ]);

        Route::post('/rate/create', [
            'as' => 'meter.rate.create',
            'uses' => 'MeterController@meterRateCreate'
        ]);

        Route::get('/rate/edit/{id}', [
            'as' => 'meter.rate.edit',
            'uses' => 'MeterController@meterRateEdit'
        ]);

        Route::put('/rate/{id}/edit', [
            'as' => 'meter.type.rate.put',
            'uses' => 'MeterController@meterRateUpdate'
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

    /////////////********METER ASSIGNMENT***********////////////
    Route::prefix('/dashboard/meter/assignment')->group(function () {
        Route::get('/', [
            'as' => 'meter.assignment.index',
            'uses' => 'MeterAssignmentController@index'
        ]);
        Route::post('/', [
            'as' => 'meter.assignment.store',
            'uses' => 'MeterAssignmentController@store'
        ]);

        Route::delete('/{id}/delete', [
            'as' => 'meter.assignment.delete',
            'uses' => 'MeterAssignmentController@delete'
        ]);
    });

    /////////////********METER READING*********//////////////
    Route::prefix('/dashboard/meter/reading')->group(function () {
        Route::get('/', [
            'as' => 'meter.reading.index',
            'uses' => 'MeterReadingController@index'
        ]);

        Route::get('/create' ,[
            'as' => 'meter.reading.create',
            'uses' => 'MeterReadingController@create'
        ]);

        Route::post('/create' ,[
            'as' => 'meter.reading.store',
            'uses' => 'MeterReadingController@store'
        ]);

        Route::post('/get/lotTypeLots/' ,[
            'as' => 'meter.reading.lot-type',
            'uses' => 'MeterReadingController@getLotsFromLotType'
        ]);

        Route::post('/get/lot/meters' ,[
            'as' => 'meter.reading.lot.meter',
            'uses' => 'MeterReadingController@getLotsMeters'
        ]);
    });


});


Route::group(['middleware' => 'admin', 'namespace' => 'AdminAuth'], function () {

    Route::get('/dashboard/logout', array(
        'as' => 'logout',
        'uses' => 'AuthController@logout'));
});

Route::prefix('/dashboard/system-setting')->namespace('Admin')->group(function () {
    Route::get('/create', array(
        'as' => 'system-setting.create',
        'uses' => 'SystemSettingController@create'));

    Route::post('/edit', array(
        'as' => 'system-setting.edit',
        'uses' => 'SystemSettingController@edit'));
});

Route::prefix('/dashboard/invoicing-setting')->namespace('Admin')->group(function () {
    Route::get('/add', array(
        'as' => 'invoicing-setting.add',
        'uses' => 'InvoicingSettingController@add'));

    Route::post('/edit', array(
        'as' => 'invoicing-setting.edit',
        'uses' => 'InvoicingSettingController@edit'));
});

