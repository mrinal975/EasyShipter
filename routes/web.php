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

Auth::routes();

Route::get('admin/home','AdminController@index');

Route::get('admin/login','Admin\LoginController@showLoginForm')->name('admin.login');
Route::POST('admin/login','Admin\LoginController@login');
Route::post('admin-password/email','Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('admin-password/reset','Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('admin-password/reset','Admin\ResetPasswordController@reset')->name('admin.password.request');
Route::get('admin-password/reset/{token}','Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');


Route::get('test','TestController@index');
Route::get('/','TestController@home');
Route::group(['middleware' => ['auth']], function () {
    Route::get('/owner','ProductController@ownerProduct')->name('owner');
    //adminpanel/product/save
    Route::get('/product/add','ProductController@addProduct');
    Route::post('/product/store','ProductController@storeProduct');
    Route::get('/product/manage','ProductController@manageProduct');
    Route::get('/producthome','ProductController@ProductHome');
    //Product Processing Route
    Route::post('/data/product','ProductController@processProduct')->name('dataProcessingProduct');
    Route::get('/product/edit/{id}','ProductController@EditProduct');
    Route::post('/product/update','ProductController@updateProduct');
    Route::get('/product/view/{id}','ProductController@ViewProduct');
    Route::get('/product/delete/{id}','ProductController@deleteProduct');

    //customer view product for order
    Route::get('/orderProduct/{id}','OrderController@orderProduct');
    Route::post('/storeOrderProduct','OrderController@storeOrderProduct');

    // owner viewing all order from customer
    Route::get('/ViewAllOrder','OrderController@ViewDetailOrder');
    Route::post('/ProcessingAllOrder','OrderController@ProcessingAllOrder')->name('dataProcessingAllOrder');
    Route::get('/ViewNewOrder','OrderController@NewOrder');
    Route::post('/ProcessingDetailsOrder','OrderController@processDetailsOrder')->name('dataProcessingAllOrderDetails');
    Route::get('/Orderview/{id}','OrderController@Orderview');
    Route::get('/Orderdelete/{id}','OrderController@Orderdelete');

});

Route::post('/messageSubmit','MessageController@StoreMessage');
Route::get('/ViewProduct/{type}','OrderController@ViewProduct');


Route::get('/query','Admin\CustomerController@query');

Route::group(array('prefix' =>'/admin'),function() {
    Route::group(['middleware' => ['auth:admin']], function () {
        Route::get('/home','AdminController@index');

        //admin watching order
        Route::get('/CustomerOrder','Admin\CustomerController@CustomerOrder');
        Route::post('/adminViewOrder','Admin\CustomerController@processAllOrder')->name('OrderProcessingVehicle');
        Route::get('/CustomerOrderView/{id}','Admin\CustomerController@CustomerOrderView');

        Route::get('/CustomerInfo','Admin\CustomerController@index');

        Route::get('/VehicleOwner','Admin\OwnerController@index');
        Route::post('/adminViewVehicle','Admin\OwnerController@processAllVehicle')->name('dataProcessingVehicle');
        Route::get('/VehicleOwner/{id}','Admin\OwnerController@VehicleOwner');

        //message route for admin
        Route::post('/adminViewMessage','Admin\MessageController@processAllMessage')->name('dataProcessingMessage');
        Route::get('/UserMessage','Admin\MessageController@index');
        Route::get('/viewMessage/{id}','Admin\MessageController@viewMessage');
    });
});


