<?php

Route::view('home', 'frontend.organizer.index')->name('home');

Route::group(['middleware' => ['auth:organizer', 'verified']], function() {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');

    //Events
    Route::group(['prefix' => 'events', 'as' => 'events.'], function() {
        Route::get('', 'EventController@index')->name('index');
        Route::match(['get', 'post'],'create', 'EventController@create')->name('create');
        Route::get('show/{event}', 'EventController@show')->name('show');
        Route::post('update/{event}', 'EventController@update')->name('update');
        Route::get('open/{event}', 'EventController@openEvent')->name('open');
        Route::get('close/{event}', 'EventController@closeEvent')->name('close');
        Route::get('stop/all/ticket/sales/{event}', 'EventController@stopTicketSales')->name('stop.all.ticket.sales');
        Route::get('start/all/ticket/sales/{event}', 'EventController@startTicketSales')->name('start.all.ticket.sales');
        Route::get('stop/event-price/sale/{eventPrice}', 'EventController@stopEventPriceSale')->name('stop.event.price.sales');
        Route::get('start/event-price/sale/{eventPrice}', 'EventController@startEventPriceSale')->name('start.event.price.sales');
    });

    //Ticket
    Route::get('tickets', 'TicketController@index')->name('tickets');
    Route::post('tickets/validate', 'TicketController@validateTicket')->name('tickets.validate');

    //Profile
    Route::group(['prefix' => 'profile', 'as' => 'profile.'], function() {
        Route::get('', 'ProfileController@index')->name('index');
        Route::match(['get', 'post'],'update', 'ProfileController@update')->name('update');
    });

    //Need Help?
    Route::get('faq', 'FaqController@index')->name('faq');
    Route::match(['get', 'post'],'contact-us', 'ContactUsController@contactUs')->name('contact.us');

});


//Authentication
Route::group(['namespace' => 'Auth'], function() {
    Route::match(['get', 'post'],'login', 'LoginController@login')->name('login');
    Route::match(['get', 'post'],'register', 'RegisterController@register')
        ->middleware('spam.filter')
        ->name('register');
    Route::get('verify/email', 'VerificationController@verifyEmail')->name('verification.verify')->middleware('signed');
    Route::get('resend/verify/email', 'VerificationController@resendVerification')->name('resend.verification');
    Route::get('logout', 'LoginController@logout')->name('logout');

    Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::post('password/reset', 'ResetPasswordController@reset')->name('password.update');
    Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
});
