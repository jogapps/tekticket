<?php

Route::group(['middleware' => 'auth:admin'], function() {

    //DASHBOARD
    Route::group(['as' => 'dashboard.'], function () {
        Route::get('', 'DashboardController@index')->name('index');
    });

    //ADMINISTRATOR
    Route::group(['prefix' => 'administrator','as' => 'administrator.'], function () {
        Route::get('', 'AdministratorController@index')->name('index');
        Route::post('create','AdministratorController@create')->name('create');
        Route::get('delete/{id}','AdministratorController@delete')->name('delete');
    });

    //USER
    Route::group(['prefix' => 'user','as' => 'user.'], function () {
        Route::get('', 'UserController@index')->name('index');
        Route::get('show/{user}', 'UserController@show')->name('show');
    });

    //ORGNIZERS
    Route::group(['prefix' => 'organizers','as' => 'organizers.'], function () {
        Route::get('', 'OrganizerController@index')->name('index');
        Route::get('show/{organizer}', 'OrganizerController@show')->name('show');
        Route::post('update/{organizer}', 'OrganizerController@update')->name('update');
    });

    //EVENT
    Route::group(['prefix' => 'events','as' => 'events.'], function () {
        Route::get('', 'EventController@index')->name('index');
        Route::get('details/{event}', 'EventController@details')->name('details');
        Route::match(['get', 'post'],'edit/{event}', 'EventController@edit')->name('edit');
        Route::match(['get', 'post'],'create', 'EventController@create')->name('create');
        Route::get('open/{event}', 'EventController@openEvent')->name('open');
        Route::get('close/{event}', 'EventController@closeEvent')->name('close');
        Route::get('disable/{event}', 'EventController@disableEvent')->name('disable');
        Route::get('enable/{event}', 'EventController@enableEvent')->name('enable');
        Route::get('stop/all/ticket/sales/{event}', 'EventController@stopTicketSales')->name('stop.all.ticket.sales');
        Route::get('start/all/ticket/sales/{event}', 'EventController@startTicketSales')->name('start.all.ticket.sales');
        Route::get('stop/eventPrice/sale/{eventPrice}', 'EventController@stopEventPriceSale')->name('stop.event.price.sales');
        Route::get('start/eventPrice/sale/{eventPrice}', 'EventController@startEventPriceSale')->name('start.event.price.sales');
    });

    //TICKET
    Route::group(['prefix' => 'ticket','as' => 'ticket.'], function () {
        Route::get('', 'TicketController@index')->name('index');
    });

    //WALLET
    Route::group(['prefix' => 'wallet','as' => 'wallet.'], function () {
        Route::get('', 'WalletController@index')->name('index');
        Route::get('config', 'WalletController@config')->name('config');
        Route::post('config-update', 'WalletController@updateConfig')->name('update.config');
    });

    //Voucher
    Route::group(['prefix' => 'voucher','as' => 'voucher.'], function () {
        Route::get('', 'VoucherController@index')->name('index');
    });

    //MENU AND CATEGORY
    Route::group(['prefix' => 'menu','as' => 'menu.'], function () {
        Route::get('', 'MenuController@index')->name('index');
        Route::get('details/{menu}', 'MenuController@details')->name('details');
        Route::post('update/{menu}', 'MenuController@update')->name('update');
        Route::get('disable/{menu}', 'MenuController@disable')->name('enable');
        Route::get('enable/{menu}', 'MenuController@enable')->name('disable');
        Route::get('disable-category/{category}', 'MenuController@disableCategory')->name('enable.category');
        Route::get('enable-category/{category}', 'MenuController@enableCategory')->name('disable.category');
        Route::post('update-category/{category}', 'MenuController@updateCategory')->name('update.category');

        Route::post('create','MenuController@create')->name('create');
        Route::post('add-category/{menu_id}','MenuController@addCategory')->name('add.category');
    });

    //BLOG
    Route::group(['prefix' => 'blog','as' => 'blog.'], function () {
        Route::get('', 'BlogController@index')->name('index');
        Route::get('details/{blog}', 'BlogController@details')->name('details');
        Route::match(['get', 'post'],'update/{blog}', 'BlogController@update')->name('update');
        Route::match(['get', 'post'],'create', 'BlogController@create')->name('create');
        Route::get('delete/{blog}', 'BlogController@delete')->name('delete');
    });

    //Page
    Route::group(['prefix' => 'pages','as' => 'pages.'], function () {
        Route::get('', 'PagesController@index')->name('index');
        Route::match(['get', 'post'],'update/{page}', 'PagesController@update')->name('update');
        Route::match(['get', 'post'],'create', 'PagesController@create')->name('create');
        Route::get('delete/{page}', 'PagesController@delete')->name('delete');
    });

    //Page
    Route::group(['prefix' => 'help','as' => 'help.'], function () {
        Route::get('', 'HelpsController@index')->name('index');
        Route::match(['get', 'post'],'update/{help}', 'HelpsController@update')->name('update');
    });

    //FAQ
    Route::group(['prefix' => 'faqs', 'as' => 'faqs.'], function () {
        Route::get('', 'FaqController@index')->name('index');
        Route::post('create', 'FaqController@create')->name('create');
        Route::post('update/{faq}', 'FaqController@update')->name('update');
        Route::get('delete/{faq}', 'FaqController@delete')->name('delete');
    });

    //Other Information
    Route::group(['prefix' => 'other-information','as' => 'other-information.'], function () {
        Route::get('', 'OtherInformationController@index')->name('index');
        Route::post('update', 'OtherInformationController@update')->name('update');
    });

});


/**
 * ADMIN AUTHENTICATION
 */
Route::group(['prefix' => 'auth','namespace' => 'Auth'], function() {
    Route::match(['get','post'],'login','LoginController@login')->name('login');
    Route::get('logout','LoginController@logout')->name('logout')->middleware('auth:admin');

});
