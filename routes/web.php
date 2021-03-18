<?php


Route::group(['namespace' => 'Frontend\Customer'], function() {
    Route::get('', 'HomeController@index')->name('home');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/faq', 'HomeController@getFaqs')->name('faq');
    Route::get('/page', 'HomeController@getPage')->name('page');

    //Events
    Route::group(['prefix' => 'events', 'as' => 'events.'], function () {
        Route::get('listing', 'EventController@listing')->name('listing');
        Route::get('details/{slug}', 'EventController@details')->name('details');
    });

    //Organizer Page
    Route::get('organizer-profile/{organizer}', 'OrganizerController@showProfile')->name('organizer.profile');

    //Blog
    Route::group(['prefix' => 'blog', 'as' => 'blog.'], function () {
        Route::get('', 'BlogController@index')->name('index');
        Route::get('details/{slug}', 'BlogController@details')->name('details');
    });

    //Contact Us
    Route::get('/contact-us', 'ContactUsController@showContactUsForm')->name('contact.us');
    Route::post('/contact-us/send-message', 'ContactUsController@sendContactUsMessage')
        ->middleware('spam.filter')
        ->name('contact.us.send.message');

    //Newletter
    Route::post('newsletter/subscribe', 'NewsletterController@subscribe')->name('newsletter.subscribe');
    Route::post('newsletter/unsubscribe', 'NewsletterController@unSubscribe')->name('newsletter.unsubscribe');

    //Help
    Route::group(['prefix' => 'help', 'as' => 'help.'], function() {
        Route::get('', 'HelpController@index')->name('index');
        Route::get('details/{help}', 'HelpController@details')->name('details');
    });

    //Authenticated Routes
    Route::group(['middleware' => 'auth:web'], function () {

        //Profile
        Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {
            Route::get('', 'ProfileController@index')->name('index');
            Route::get('edit', 'ProfileController@edit')->name('edit');
            Route::post('update', 'ProfileController@update')->name('update');
            Route::get('wallet-and-voucher', 'ProfileController@voucherLog')->name('voucher.log');
        });

        //Ticket
        Route::group(['prefix' => 'ticket', 'as' => 'ticket.'], function () {
            Route::get('', 'TicketController@index')->name('index');

        });

        //Checkout
        Route::get('event/{event}/checkout/{eventPrice}', 'EventController@checkout')->name('event.checkout');
        Route::post('event/{event}/validate/ticker/purchase/{eventPrice}', 'EventController@validateEventTicketPurchase')->name('event.validate.ticket.purchase');

        //Gift Voucher
        Route::post('gift-voucher/validate/purchase','GiftVoucherController@validateGiftVoucherPurchase')->name('gift.voucher.validate.purchase');

    });

    Route::group(['namespace' => 'Auth'], function() {
        Route::match(['get', 'post'], 'login', 'LoginController@login')->name('login');
        Route::match(['get', 'post'], 'register', 'RegisterController@register')
            ->middleware('spam.filter')
            ->name('register');
        Route::get( 'logout', 'LoginController@logout')->name('logout');

        Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
        Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
        Route::post('password/reset', 'ResetPasswordController@reset')->name('password.update');
        Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
    });

});

//PAYMENT CONTROLLER
Route::group(['middleware' => 'auth:web', 'namespace' => 'Frontend'], function() {
    Route::post('process/ticket-purchase', 'PaymentController@processTicketPayment')->name('process.ticket.payment');
    Route::post('process/gift-voucher/purchase', 'PaymentController@processGiftVoucherPayment')->name('process.gift.voucher.payment');
    Route::get('payment/callback', 'PaymentController@paymentCallback');
});

