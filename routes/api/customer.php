<?php

//Events
Route::group(['prefix' => 'events', 'as' => 'events.'], function () {
    Route::get('listing', 'EventController@listing');
    Route::get('details/{slug}', 'EventController@details');
});

//Menus
Route::get('menus', 'MenuController@menuListing');
Route::get('categories', 'MenuController@categoryListing');

//Authenticated Routes
Route::group(['middleware' => 'auth:api_user'], function () {

   //Wallet and Voucher
    Route::get('wallet/balance', 'WalletController@getBalance');
    Route::get('voucher/balance', 'GiftVoucherController@getBalance');

    //Profile
    Route::get('profile', 'ProfileController@index');
    Route::post('profile/update', 'ProfileController@update');


    //Ticket
    Route::get('tickets', 'TicketController@index');

});

Route::group(['namespace' => 'Auth'], function() {
    Route::post('login', 'LoginController@login')->name('login');
    Route::post('register', 'RegisterController@register');
    Route::get( 'logout', 'LoginController@logout') ;

    Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::post('password/reset', 'ResetPasswordController@reset')->name('password.update');
    Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
});


//PAYMENT CONTROLLER
Route::group(['middleware' => 'auth:web', 'namespace' => 'Frontend'], function() {
    Route::post('process/ticket-purchase', 'PaymentController@processTicketPayment')->name('process.ticket.payment');
    Route::post('process/gift-voucher/purchase', 'PaymentController@processGiftVoucherPayment')->name('process.gift.voucher.payment');
    Route::get('payment/callback', 'PaymentController@paymentCallback');
});

