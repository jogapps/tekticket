<?php

Route::group(['middleware' => ['auth:api_organizer', 'verified']], function() {

    Route::get('dashboard', 'DashboardController@index');

    //Events
    Route::group(['prefix' => 'events', 'as' => 'events.'], function() {
        Route::get('', 'EventController@index');
        Route::get('show/{event}', 'EventController@show');
        Route::post('create', 'EventController@create');
        Route::post('update/{event}', 'EventController@update');
        Route::get('open/{event}', 'EventController@openEvent');
        Route::get('close/{event}', 'EventController@closeEvent');
        Route::get('stop/all/ticket/sales/{event}', 'EventController@stopTicketSales');
        Route::get('start/all/ticket/sales/{event}', 'EventController@startTicketSales');
        Route::get('stop/event-price/sale/{eventPrice}', 'EventController@stopEventPriceSale');
        Route::get('start/event-price/sale/{eventPrice}', 'EventController@startEventPriceSale');
    });

    //Categories
    Route::get('categories', 'CategoryController@index');

    //Ticket
    Route::get('tickets', 'TicketController@index');
    Route::post('tickets/validate', 'TicketController@validateTicket');

    //Profile
    Route::group(['prefix' => 'profile', 'as' => 'profile.'], function() {
        Route::get('', 'ProfileController@index');
        Route::post('update', 'ProfileController@update');
    });

    //Need Help?
    Route::get('faq', 'FaqController@index')->name('faq');
    Route::post('contact-us', 'ContactUsController@contactUs')->name('contact.us');

});


//Authentication
Route::group(['namespace' => 'Auth'], function() {
    Route::post('login', 'LoginController@login')->name('login');
    Route::post('register', 'RegisterController@register');
    Route::get('verify/email', 'VerificationController@verifyEmail')->name('verification.verify')->middleware('signed');
    Route::get('resend/verify/email', 'VerificationController@resendVerification')->name('resend.verification');
    Route::get('logout', 'LoginController@logout')->middleware('auth:api_organizer');

    Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::post('password/reset', 'ResetPasswordController@reset')->name('password.update');
    Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
});
