<?php

Route::pattern('id', '[0-9]+');
Route::pattern('id2', '[0-9]+');
Route::pattern('slug', '[a-zA-Z0-9-]+');
Route::pattern('category', '[a-zA-Z0-9-]+');
Route::pattern('subCategory', '[a-zA-Z0-9-]+');
Route::pattern('city', '[a-zA-Z0-9-]+');
/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the Closure to execute when that URI is requested.
  |
 */

//Route::get('/',                             ['as' => 'user.home',                                'uses' => 'User\StoreController@home']);
Route::get('/', ['as' => 'user.home', 'uses' => 'User\CompanyController@home']);
Route::get('maintenance', ['as' => 'website.maintenance', 'uses' => 'User\WebsiteController@maintenance']);
Route::get('help', ['as' => 'user.help', 'uses' => 'User\CompanyController@help']);
Route::get('terms-and-condition', ['as' => 'user.terms', 'uses' => 'User\CompanyController@termsandcondition']);
Route::get('howitworks', ['as' => 'user.howitworks', 'uses' => 'User\CompanyController@howitworks']);
Route::get('privacy-policy', ['as' => 'user.privacy', 'uses' => 'User\CompanyController@privacypolicy']);
Route::get('business/search', ['as' => 'store.search', 'uses' => 'User\StoreController@search']);
Route::get('business/profSearch', ['as' => 'store.profsearch', 'uses' => 'User\StoreController@profSearch']);
Route::get('professional/detail/{slug}', ['as' => 'store.detailpro', 'uses' => 'User\StoreController@detailProfile']);
Route::get('business/detail/{slug}', ['as' => 'store.detail', 'uses' => 'User\StoreController@detailProfile']);
Route::get('business/detail/{slug}/photo', ['as' => 'store.detail.photo', 'uses' => 'User\StoreController@detailPhoto']);
Route::get('blog', ['as' => 'store.posts', 'uses' => 'User\PostController@viewPosts']);
Route::get('world-of-profession', ['as' => 'post.professions', 'uses' => 'User\PostController@viewProfessionPosts']);
Route::get('blog/{slug}', ['as' => 'post.detail', 'uses' => 'User\PostController@detail']);
Route::get('world-of-professional/{slug}', ['as' => 'wof.detail', 'uses' => 'User\PostController@wofdetail']);
Route::get('world-of-profession/{slug}', ['as' => 'post.profdetail', 'uses' => 'User\PostController@profdetail']);
Route::get('post/category/{slug}', ['as' => 'post.category', 'uses' => 'User\PostController@getPostByCategory']);
Route::get('post/author/{slug}', ['as' => 'post.author', 'uses' => 'User\PostController@getPostByAuthor']);
Route::get('post/search', ['as' => 'post.search', 'uses' => 'User\PostController@search']);
Route::get('language-chooser/{slug}', 'User\LanguageController@chooser');
Route::post('change-language', 'Admin\LanguageController@chooser');

Route::get('professional/detail/{slug}', ['as' => 'company.detail', 'uses' => 'User\CompanyController@detailProfile']);

Route::get('message', ['as' => 'user.message', 'uses' => 'User\MessageController@index']);
Route::post('message/doSend', ['as' => 'user.message.doSend', 'uses' => 'User\MessageController@doSend']);
Route::get('message/detail/{id}', ['as' => 'user.message.detail', 'uses' => 'User\MessageController@detail']);


Route::post('send/message', ['as' => 'user.sendMessage', 'uses' => 'User\UserController@sendMessage']);
Route::post('send/message1', ['as' => 'user.sendMessagepro', 'uses' => 'User\UserController@sendMessagepro']);
Route::post('give/feedback', ['as' => 'user.giveFeedback', 'uses' => 'User\UserController@giveFeedback']);
Route::post('upload/photo', ['as' => 'user.uploadPhoto', 'uses' => 'User\UserController@uploadPhoto']);

Route::get('requests', ['as' => 'user.requests', 'uses' => 'User\PostRequestController@index']);
Route::get('messages', ['as' => 'user.messages', 'uses' => 'User\MessageController@index']);
Route::get('message/delete/{id}', ['as' => 'user.message.delete', 'uses' => 'User\MessageController@delete']);
Route::get('request/create', ['as' => 'request.create', 'uses' => 'User\PostRequestController@create']);
Route::get('request/detail/{id}', ['as' => 'request.detail', 'uses' => 'User\PostRequestController@detail']);
Route::get('request/reply/{id}', ['as' => 'request.reply', 'uses' => 'User\PostRequestController@reply']);
Route::post('request/doReply',['as' => 'request.doReply', 'uses' => 'User\PostRequestController@doReply']);
Route::post('request/add',['as' => 'request.add', 'uses' => 'User\PostRequestController@add']);
Route::get('user/request/delete/{id}',['as' => 'user.request.delete', 'uses' => 'User\PostRequestController@delete']);
Route::get('user/request/status/{id}/{status}',['as' => 'user.request.status', 'uses' => 'User\PostRequestController@status']);


Route::get('professional/requests',['as' => 'company.request', 'uses' => 'Company\PostRequestController@index']);
Route::get('request/delete/{id}',['as' => 'company.request.delete', 'uses' => 'Company\PostRequestController@delete']);
Route::get('request/status/{id}/{status}',['as' => 'company.request.status', 'uses' => 'Company\PostRequestController@status']);

Route::get('login', ['as' => 'user.login', 'uses' => 'User\UserController@login']);
Route::post('doLogin', ['as' => 'user.doLogin', 'uses' => 'User\UserController@doLogin']);
Route::get('signup', ['as' => 'user.signup', 'uses' => 'User\UserController@signup']);
Route::get('contactus', ['as' => 'user.contactus', 'uses' => 'User\UserController@contactus']);
Route::post('docontact', ['as' => 'user.docontact', 'uses' => 'User\UserController@docontact']);
Route::post('doSignup', ['as' => 'user.doSignup', 'uses' => 'User\UserController@doSignup']);
Route::get('doSignout', ['as' => 'user.doSignout', 'uses' => 'User\UserController@doSignout']);
Route::get('forgotpwd', ['as' => 'user.forgotpwd', 'uses' => 'User\UserController@forgotPassword']);
Route::get('reset/{slug}', ['as' => 'user.resetPassword', 'uses' => 'User\UserController@resetPassword']);
Route::post('doReset/{slug}', ['as' => 'user.doResetPassword', 'uses' => 'User\UserController@doResetPassword']);
Route::post('sendResetPasswordEmail', ['as' => 'user.sendResetPasswordEmail', 'uses' => 'User\UserController@sendResetPasswordEmail']);
Route::get('user/active/{slug}', ['as' => 'user.active', 'uses' => 'User\UserController@active']);
Route::get('professional/active/{slug}', ['as' => 'professional.active', 'uses' => 'Company\AuthController@active']);

Route::get('user/profile', ['as' => 'user.profile', 'uses' => 'User\UserController@profile']);
Route::post('user/updateProfile', ['as' => 'user.updateProfile', 'uses' => 'User\UserController@updateProfile']);
Route::get('user/offers', ['as' => 'user.offers', 'uses' => 'User\UserController@offers']);
Route::get('user/cart', ['as' => 'user.cart', 'uses' => 'User\UserController@cart']);
Route::post('comment', ['as' => 'async.user.comment', 'uses' => 'User\UserController@comment']);
Route::any('chatbox/{slug}', ['as' => 'async.company.chatbox', 'uses' => 'User\CompanyController@chatbox']);
Route::post('savechat', ['as' => 'async.company.savechat', 'uses' => 'User\CompanyController@savechat']);
Route::post('invite', ['as' => 'async.company.invite', 'uses' => 'User\CompanyController@invite']);

Route::any('business/detail/{slug}/success', ['as' => 'offer.purchase.success', 'uses' => 'User\OfferController@purchaseSuccess']);
Route::any('business/detail/{slug}/failed', ['as' => 'offer.purchase.failed', 'uses' => 'User\OfferController@purchaseFailed']);
Route::any('offer/purchase/ipn', ['as' => 'offer.purchase.ipn', 'uses' => 'User\OfferController@purchaseIPN']);

Route::any('business/detail/{slug}/success', ['as' => 'book.purchase.success', 'uses' => 'User\StoreController@purchaseSuccess']);
Route::any('business/detail/{slug}/failed', ['as' => 'book.purchase.failed', 'uses' => 'User\StoreController@purchaseFailed']);
Route::any('book/purchase/ipn', ['as' => 'book.purchase.ipn', 'uses' => 'User\StoreController@purchaseIPN']);

Route::group(['prefix' => 'message'], function () {
                        Route::get('professionalmsg', ['as' => 'admin.professionalmsg', 'uses' => 'Admin\MessageController@professionalmsg']);
                        Route::get('generalmsg', ['as' => 'admin.generalmsg', 'uses' => 'Admin\MessageController@generalmsg']);
                        Route::post('usermessage', ['as' => 'admin.message.usermessage', 'uses' => 'Admin\MessageController@usermessage']);
                        Route::post('profes_msg', ['as' => 'admin.message.profes_msg', 'uses' => 'Admin\MessageController@profes_msg']);
                    });

Route::group(['prefix' => 'async/user', 'before' => 'async-auth',], function () {
            Route::post('cart/add', ['as' => 'async.user.cart.add', 'uses' => 'User\UserController@asyncAddCart']);
            Route::post('cart/freeadd', ['as' => 'async.user.cart.free_add', 'uses' => 'User\UserController@asyncAddFreeCart']);
            Route::post('cart/remove', ['as' => 'async.user.cart.remove', 'uses' => 'User\UserController@asyncRemoveCart']);

            Route::post('join/add', ['as' => 'async.user.store.join', 'uses' => 'User\StoreController@asyncJoin']);
            Route::post('chat/save', ['as' => 'async.user.savechat', 'uses' => 'User\StoreController@chatsave']);
            Route::post('book/getTime', ['as' => 'async.user.bookTime', 'uses' => 'User\StoreController@asyncBookTime']);
        });

Route::group(['prefix' => 'async/company', 'before' => 'async-auth',], function () {
            Route::post('stamp/add', ['as' => 'async.company.stamp.add', 'uses' => 'Company\UserController@asyncAddStamp']);
            Route::get('email/autoComplete', ['as' => 'async.company.email.autoComplete', 'uses' => 'Company\UserController@asyncAutoCompleteEmail']);
        });

Route::group(['prefix' => 'professional'], function () {
            Route::get('/', ['as' => 'company.auth', 'uses' => 'Company\AuthController@index']);
            Route::get('login', ['as' => 'company.auth.login', 'uses' => 'Company\AuthController@login']);
            Route::post('doLogin', ['as' => 'company.auth.doLogin', 'uses' => 'Company\AuthController@doLogin']);
            Route::get('logout', ['as' => 'company.auth.logout', 'uses' => 'Company\AuthController@logout']);
            Route::get('signup/{type}/{price}', ['as' => 'company.auth.signup', 'uses' => 'Company\AuthController@signup']);
            Route::get('membership', ['as' => 'company.auth.membership', 'uses' => 'Company\AuthController@membership']);
            Route::post('doSignup', ['as' => 'company.auth.doSignup', 'uses' => 'Company\AuthController@doSignup']);
            Route::any('signup/failed', ['as' => 'company.auth.signFailed', 'uses' => 'Company\AuthController@signFailed']);
            Route::any('signup/success', ['as' => 'company.auth.success', 'uses' => 'Company\AuthController@signSuccess']);
            Route::any('subscribe/webhook', ['as' => 'company.subscribe.webhook', 'uses' => 'Company\SubscribeController@webhook']);
            Route::any('signup/purchase/ipn', ['as' => 'company.purchase.ipn', 'uses' => 'Company\AuthController@purchaseIPN']);
        });

Route::group(['prefix' => 'professional', 'before' => 'company-auth',], function () {
            Route::get('profile/{id?}', ['as' => 'company.profile', 'uses' => 'Company\AuthController@profile']);
            Route::post('update/opening-hours', ['as' => 'company.profile.updateOpeningHours', 'uses' => 'Company\AuthController@updateOpeningHours']);
            Route::post('change/password', ['as' => 'company.profile.changePassword', 'uses' => 'Company\AuthController@changePassword']);
            Route::post('update/professional', ['as' => 'company.profile.updateCompany', 'uses' => 'Company\AuthController@updateCompany']);
            Route::post('update/invoice', ['as' => 'company.profile.updateInvoiceMgmt', 'uses' => 'Company\AuthController@updateInvoiceMgmt']);
            Route::post('update/photo', ['as' => 'company.profile.updatePhoto', 'uses' => 'Company\AuthController@updatePhoto']);
            Route::post('update/holidays', ['as' => 'company.profile.updateHolidays', 'uses' => 'Company\AuthController@updateHolidays']);

            Route::get('dashboard', ['as' => 'company.dashboard', 'uses' => 'Company\PageController@dashboard']);

            Route::get('subscribe', ['as' => 'company.subscribe', 'uses' => 'Company\SubscribeController@index']);
            Route::get('subscribe/success', ['as' => 'company.subscribe.success', 'uses' => 'Company\SubscribeController@success']);
            Route::post('subscribe/create/{slug}', ['as' => 'company.subscribe.create', 'uses' => 'Company\SubscribeController@create']);
            Route::get('subscribe/cancel', ['as' => 'company.subscribe.cancel', 'uses' => 'Company\SubscribeController@cancel']);

            Route::group(['prefix' => 'user'], function () {
                        Route::get('/', ['as' => 'company.user', 'uses' => 'Company\UserController@index']);
                        Route::get('register', ['as' => 'company.user.register', 'uses' => 'Company\UserController@register']);
                        Route::post('doRegister', ['as' => 'company.user.doRegister', 'uses' => 'Company\UserController@doRegister']);
                        Route::get('detail/{id}', ['as' => 'company.user.detail', 'uses' => 'Company\UserController@detail']);
                        Route::get('useOffer/{id}/{id2}', ['as' => 'company.user.useOffer', 'uses' => 'Company\UserController@useOffer']);
                        Route::get('useLoyalty/{id}/{id2}', ['as' => 'company.user.useLoyalty', 'uses' => 'Company\UserController@useLoyalty']);
                        Route::post('doMarketing', ['as' => 'company.user.doMarketing', 'uses' => 'Company\UserController@doMarketing']);
                    });

            Route::group(['prefix' => 'store'], function () {
                        Route::get('/', ['as' => 'company.store', 'uses' => 'Company\StoreController@index']);
                        Route::get('create', ['as' => 'company.store.create', 'uses' => 'Company\StoreController@create']);
                        Route::get('edit/{id}', ['as' => 'company.store.edit', 'uses' => 'Company\StoreController@edit']);
                        Route::post('store', ['as' => 'company.store.store', 'uses' => 'Company\StoreController@store']);
                        Route::get('delete/{id}', ['as' => 'company.store.delete', 'uses' => 'Company\StoreController@delete']);
                    });

            Route::group(['prefix' => 'office'], function () {
                        Route::get('/', ['as' => 'company.office', 'uses' => 'Company\OfficeController@index']);
                        Route::get('create', ['as' => 'company.office.create', 'uses' => 'Company\OfficeController@create']);
                        Route::get('edit/{id}', ['as' => 'company.office.edit', 'uses' => 'Company\OfficeController@edit']);
                        Route::post('store', ['as' => 'company.office.store', 'uses' => 'Company\OfficeController@store']);
                        Route::get('delete/{id}', ['as' => 'company.office.delete', 'uses' => 'Company\OfficeController@delete']);
                    });

            Route::group(['prefix' => 'book'], function () {
                        Route::get('/', ['as' => 'company.book', 'uses' => 'Company\BookController@index']);
                        Route::get('delete/{id}', ['as' => 'company.book.delete', 'uses' => 'Company\BookController@delete']);
                        Route::get('view/{id}', ['as' => 'company.book.view', 'uses' => 'Company\BookController@view']);
                        Route::post('update', ['as' => 'company.book.update', 'uses' => 'Company\BookController@update']);
                    });

            Route::group(['prefix' => 'post'], function () {
                        Route::get('/', ['as' => 'company.post', 'uses' => 'Company\PostController@index']);
                        Route::get('create', ['as' => 'company.post.create', 'uses' => 'Company\PostController@create']);
                        Route::post('store', ['as' => 'company.post.store', 'uses' => 'Company\PostController@store']);
                        Route::get('edit/{id}', ['as' => 'company.post.edit', 'uses' => 'Company\PostController@edit']);
                        Route::get('delete/{id}', ['as' => 'company.post.delete', 'uses' => 'Company\PostController@delete']);
                        Route::get('view/{id}', ['as' => 'company.post.view', 'uses' => 'Company\PostController@view']);
                        Route::post('update', ['as' => 'company.post.update', 'uses' => 'Company\PostController@update']);
                    });

            Route::group(['prefix' => 'comment'], function () {
                        Route::get('/', ['as' => 'company.comment', 'uses' => 'Company\CommentController@index']);
                        Route::get('/delete/{id}', ['as' => 'company.comment.delete', 'uses' => 'Company\CommentController@delete']);
                    });

            Route::group(['prefix' => 'feedback'], function () {
                        Route::get('/', ['as' => 'company.feedback', 'uses' => 'Company\FeedbackController@index']);
                        Route::get('/delete/{id}', ['as' => 'company.feedback.delete', 'uses' => 'Company\FeedbackController@delete']);
                        Route::get('/changeStatus/{id}/{slug}', ['as' => 'company.feedback.changeStatus', 'uses' => 'Company\FeedbackController@changeStatus']);
                    });

            Route::group(['prefix' => 'contact'], function () {
                        Route::get('/', ['as' => 'company.contact', 'uses' => 'Company\ContactController@index']);
                    });

            Route::group(['prefix' => 'message'], function () {
                        Route::get('/', ['as' => 'company.message', 'uses' => 'Company\MessageController@index']);
                        Route::post('/doSend', ['as' => 'company.message.doSend', 'uses' => 'Company\MessageController@doSend']);
                        Route::get('/detail/{id}', ['as' => 'company.message.detail', 'uses' => 'Company\MessageController@detail']);
                        Route::get('/delete/{id}', ['as' => 'company.message.delete', 'uses' => 'Company\MessageController@delete']);
                    });

            Route::group(['prefix' => 'offer'], function () {
                        Route::get('/', ['as' => 'company.offer', 'uses' => 'Company\OfferController@index']);
                        Route::get('activity/create', ['as' => 'company.offer.activity.create', 'uses' => 'Company\OfferController@createActivity']);
                        Route::get('activity/edit/{id}', ['as' => 'company.offer.activity.edit', 'uses' => 'Company\OfferController@editActivity']);
                        Route::get('purchase/create', ['as' => 'company.offer.purchase.create', 'uses' => 'Company\OfferController@createPurchase']);
                        Route::get('purchase/edit/{id}', ['as' => 'company.offer.purchase.edit', 'uses' => 'Company\OfferController@editPurchase']);
                        Route::post('store', ['as' => 'company.offer.store', 'uses' => 'Company\OfferController@store']);
                        Route::get('delete/{id}', ['as' => 'company.offer.delete', 'uses' => 'Company\OfferController@delete']);
                        Route::get('sold/{id}', ['as' => 'company.offer.sold', 'uses' => 'Company\OfferController@sold']);
                    });

            Route::group(['prefix' => 'rating-type'], function () {
                        Route::get('/', ['as' => 'company.ratingType', 'uses' => 'Company\RatingTypeController@index']);
                        Route::get('create', ['as' => 'company.ratingType.create', 'uses' => 'Company\RatingTypeController@create']);
                        Route::get('edit/{id}', ['as' => 'company.ratingType.edit', 'uses' => 'Company\RatingTypeController@edit']);
                        Route::post('store', ['as' => 'company.ratingType.store', 'uses' => 'Company\RatingTypeController@store']);
                        Route::get('delete/{id}', ['as' => 'company.ratingType.delete', 'uses' => 'Company\RatingTypeController@delete']);
                    });

            Route::group(['prefix' => 'loyalty'], function () {
                        Route::get('/', ['as' => 'company.loyalty', 'uses' => 'Company\LoyaltyController@index']);
                        Route::get('create', ['as' => 'company.loyalty.create', 'uses' => 'Company\LoyaltyController@create']);
                        Route::get('edit/{id}', ['as' => 'company.loyalty.edit', 'uses' => 'Company\LoyaltyController@edit']);
                        Route::post('store', ['as' => 'company.loyalty.store', 'uses' => 'Company\LoyaltyController@store']);
                        Route::get('delete/{id}', ['as' => 'company.loyalty.delete', 'uses' => 'Company\LoyaltyController@delete']);
                    });

            Route::group(['prefix' => 'widget'], function () {
                        Route::get('/', ['as' => 'company.widget.index', 'uses' => 'Company\WidgetController@index']);
                        Route::post('store', ['as' => 'company.widget.store', 'uses' => 'Company\WidgetController@store']);
                    });
        });

Route::group(['prefix' => 'permiofiglio'], function () {
            Route::get('/', ['as' => 'admin.auth', 'uses' => 'Admin\AuthController@index']);
            Route::get('login', ['as' => 'admin.auth.login', 'uses' => 'Admin\AuthController@login']);
            Route::post('doLogin', ['as' => 'admin.auth.doLogin', 'uses' => 'Admin\AuthController@doLogin']);
            Route::get('logout', ['as' => 'admin.auth.logout', 'uses' => 'Admin\AuthController@logout']);
        });

Route::group(['prefix' => 'admin', 'before' => 'admin-auth',], function () {
            Route::get('dashboard', ['as' => 'admin.dashboard', 'uses' => 'Admin\DashboardController@index']);

            Route::group(['prefix' => 'company'], function () {
                        Route::get('/', ['as' => 'admin.company', 'uses' => 'Admin\CompanyController@index']);
                        Route::get('create', ['as' => 'admin.company.create', 'uses' => 'Admin\CompanyController@create']);
                        Route::get('edit/{id}', ['as' => 'admin.company.edit', 'uses' => 'Admin\CompanyController@edit']);
                        Route::get('unblock/{id}', ['as' => 'admin.company.unblock', 'uses' => 'Admin\CompanyController@unblock']);
                        Route::get('block/{id}', ['as' => 'admin.company.block', 'uses' => 'Admin\CompanyController@block']);
                        Route::post('store', ['as' => 'admin.company.store', 'uses' => 'Admin\CompanyController@store']);
                        Route::post('verify', ['as' => 'admin.company.verify', 'uses' => 'Admin\CompanyController@verify']);
                        Route::get('delete/{id}', ['as' => 'admin.company.delete', 'uses' => 'Admin\CompanyController@delete']);
                        Route::get('feedback/{id}', ['as' => 'admin.company.feedback', 'uses' => 'Admin\CompanyController@feedback']);
                    });

            Route::group(['prefix' => 'store'], function () {
                        Route::get('/', ['as' => 'admin.store', 'uses' => 'Admin\StoreController@index']);
                        Route::get('create', ['as' => 'admin.store.create', 'uses' => 'Admin\StoreController@create']);
                        Route::get('edit/{id}', ['as' => 'admin.store.edit', 'uses' => 'Admin\StoreController@edit']);
                        Route::post('store', ['as' => 'admin.store.store', 'uses' => 'Admin\StoreController@store']);
                        Route::get('delete/{id}', ['as' => 'admin.store.delete', 'uses' => 'Admin\StoreController@delete']);
                    });

            Route::group(['prefix' => 'post'], function () {
                        Route::get('/', ['as' => 'admin.post', 'uses' => 'Admin\PostController@index']);
                        Route::get('create', ['as' => 'admin.post.create', 'uses' => 'Admin\PostController@create']);
                        Route::get('edit/{id}', ['as' => 'admin.post.edit', 'uses' => 'Admin\PostController@edit']);
                        Route::post('store', ['as' => 'admin.post.store', 'uses' => 'Admin\PostController@store']);
                        Route::get('delete/{id}', ['as' => 'admin.post.delete', 'uses' => 'Admin\PostController@delete']);
                    });

            Route::group(['prefix' => 'policy'], function () {
                        Route::get('/', ['as' => 'admin.policy', 'uses' => 'Admin\PolicyController@index']);
                        Route::get('create', ['as' => 'admin.policy.create', 'uses' => 'Admin\PolicyController@create']);
                        Route::get('edit/{id}', ['as' => 'admin.policy.edit', 'uses' => 'Admin\PolicyController@edit']);
                        Route::post('store', ['as' => 'admin.policy.store', 'uses' => 'Admin\PolicyController@store']);
                        Route::get('delete/{id}', ['as' => 'admin.policy.delete', 'uses' => 'Admin\PolicyController@delete']);
                    });

            Route::group(['prefix' => 'terms'], function () {
                        Route::get('/', ['as' => 'admin.terms', 'uses' => 'Admin\TermsController@index']);
                        Route::get('create', ['as' => 'admin.terms.create', 'uses' => 'Admin\TermsController@create']);
                        Route::get('edit/{id}', ['as' => 'admin.terms.edit', 'uses' => 'Admin\TermsController@edit']);
                        Route::post('store', ['as' => 'admin.terms.store', 'uses' => 'Admin\TermsController@store']);
                        Route::get('delete/{id}', ['as' => 'admin.terms.delete', 'uses' => 'Admin\TermsController@delete']);
                    });

            Route::group(['prefix' => 'help'], function () {
                        Route::get('/', ['as' => 'admin.help', 'uses' => 'Admin\HelpController@index']);
                        Route::get('create', ['as' => 'admin.help.create', 'uses' => 'Admin\HelpController@create']);
                        Route::get('edit/{id}', ['as' => 'admin.help.edit', 'uses' => 'Admin\HelpController@edit']);
                        Route::post('store', ['as' => 'admin.help.store', 'uses' => 'Admin\HelpController@store']);
                        Route::get('delete/{id}', ['as' => 'admin.help.delete', 'uses' => 'Admin\HelpController@delete']);
                    });

            Route::group(['prefix' => 'howitworks'], function () {
                        Route::get('/', ['as' => 'admin.howitworks', 'uses' => 'Admin\HowitworksController@index']);
                        Route::get('create', ['as' => 'admin.howitworks.create', 'uses' => 'Admin\HowitworksController@create']);
                        Route::get('edit/{id}', ['as' => 'admin.howitworks.edit', 'uses' => 'Admin\HowitworksController@edit']);
                        Route::post('store', ['as' => 'admin.howitworks.store', 'uses' => 'Admin\HowitworksController@store']);
                        Route::get('delete/{id}', ['as' => 'admin.howitworks.delete', 'uses' => 'Admin\HowitworksController@delete']);
                    });

            Route::group(['prefix' => 'worldofprofession'], function () {
                        Route::get('/', ['as' => 'admin.worldofprofession', 'uses' => 'Admin\WorldofprofessionController@index']);
                        Route::get('create', ['as' => 'admin.worldofprofession.create', 'uses' => 'Admin\WorldofprofessionController@create']);
                        Route::get('edit/{id}', ['as' => 'admin.worldofprofession.edit', 'uses' => 'Admin\WorldofprofessionController@edit']);
                        Route::post('store', ['as' => 'admin.worldofprofession.store', 'uses' => 'Admin\WorldofprofessionController@store']);
                        Route::get('delete/{id}', ['as' => 'admin.worldofprofession.delete', 'uses' => 'Admin\WorldofprofessionController@delete']);
                    });

            Route::group(['prefix' => 'postcategory'], function () {
                        Route::get('/', ['as' => 'admin.postcategory', 'uses' => 'Admin\PostCategoryController@index']);
                        Route::get('create', ['as' => 'admin.postcategory.create', 'uses' => 'Admin\PostCategoryController@create']);
                        Route::get('edit/{id}', ['as' => 'admin.postcategory.edit', 'uses' => 'Admin\PostCategoryController@edit']);

                        Route::group(['prefix' => 'postsub'], function () {
                                    Route::get('create/{id}', ['as' => 'admin.postsub.category.create', 'uses' => 'Admin\PostSubCategoryController@create']);
                                    Route::get('edit/{id}', ['as' => 'admin.postsub.category.edit', 'uses' => 'Admin\PostSubCategoryController@edit']);
                                    Route::post('store', ['as' => 'admin.postsub.category.store', 'uses' => 'Admin\PostSubCategoryController@store']);
                                    Route::get('delete/{id}', ['as' => 'admin.postsub.category.delete', 'uses' => 'Admin\PostSubCategoryController@delete']);
                                });
                    });

            Route::group(['prefix' => 'office'], function () {
                        Route::get('/', ['as' => 'admin.office', 'uses' => 'Admin\OfficeController@index']);
                        Route::get('create', ['as' => 'admin.office.create', 'uses' => 'Admin\OfficeController@create']);
                        Route::get('edit/{id}', ['as' => 'admin.office.edit', 'uses' => 'Admin\OfficeController@edit']);
                        Route::post('store', ['as' => 'admin.office.store', 'uses' => 'Admin\OfficeController@store']);
                        Route::get('delete/{id}', ['as' => 'admin.office.delete', 'uses' => 'Admin\OfficeController@delete']);
                    });

            Route::group(['prefix' => 'user'], function () {
                        Route::get('/', ['as' => 'admin.user', 'uses' => 'Admin\UserController@index']);
                        Route::get('create', ['as' => 'admin.user.create', 'uses' => 'Admin\UserController@create']);
                        Route::get('edit/{id}', ['as' => 'admin.user.edit', 'uses' => 'Admin\UserController@edit']);
                        Route::get('unblock/{id}', ['as' => 'admin.user.unblock', 'uses' => 'Admin\UserController@unblock']);
                        Route::get('block/{id}', ['as' => 'admin.user.block', 'uses' => 'Admin\UserController@block']);
                        Route::post('store', ['as' => 'admin.user.store', 'uses' => 'Admin\UserController@store']);
                        Route::get('delete/{id}', ['as' => 'admin.user.delete', 'uses' => 'Admin\UserController@delete']);
                    });

            Route::group(['prefix' => 'city'], function () {
                        Route::get('/', ['as' => 'admin.city', 'uses' => 'Admin\CityController@index']);
                        Route::get('create', ['as' => 'admin.city.create', 'uses' => 'Admin\CityController@create']);
                        Route::get('edit/{id}', ['as' => 'admin.city.edit', 'uses' => 'Admin\CityController@edit']);
                        Route::post('store', ['as' => 'admin.city.store', 'uses' => 'Admin\CityController@store']);
                        Route::get('delete/{id}', ['as' => 'admin.city.delete', 'uses' => 'Admin\CityController@delete']);
                    });

            Route::group(['prefix' => 'offer'], function () {
                        Route::get('/', ['as' => 'admin.offer', 'uses' => 'Admin\OfferController@index']);
                        Route::get('create', ['as' => 'admin.offer.create', 'uses' => 'Admin\OfferController@create']);
                        Route::get('edit/{id}', ['as' => 'admin.offer.edit', 'uses' => 'Admin\OfferController@edit']);
                        Route::post('store', ['as' => 'admin.offer.store', 'uses' => 'Admin\OfferController@store']);
                        Route::get('delete/{id}', ['as' => 'admin.offer.delete', 'uses' => 'Admin\OfferController@delete']);
                    });


            Route::group(['prefix' => 'loyalty'], function () {
                        Route::get('/', ['as' => 'admin.loyalty', 'uses' => 'Admin\LoyaltyController@index']);
                        Route::get('create', ['as' => 'admin.loyalty.create', 'uses' => 'Admin\LoyaltyController@create']);
                        Route::get('edit/{id}', ['as' => 'admin.loyalty.edit', 'uses' => 'Admin\LoyaltyController@edit']);
                        Route::post('store', ['as' => 'admin.loyalty.store', 'uses' => 'Admin\LoyaltyController@store']);
                        Route::get('delete/{id}', ['as' => 'admin.loyalty.delete', 'uses' => 'Admin\LoyaltyController@delete']);
                    });

            Route::group(['prefix' => 'plan'], function () {
                        Route::get('/', ['as' => 'admin.plan', 'uses' => 'Admin\PlanController@index']);
                        Route::get('create', ['as' => 'admin.plan.create', 'uses' => 'Admin\PlanController@create']);
                        Route::get('edit/{id}', ['as' => 'admin.plan.edit', 'uses' => 'Admin\PlanController@edit']);
                        Route::post('store', ['as' => 'admin.plan.store', 'uses' => 'Admin\PlanController@store']);
                        Route::get('delete/{id}', ['as' => 'admin.plan.delete', 'uses' => 'Admin\PlanController@delete']);
                    });

            Route::group(['prefix' => 'website'], function () {
                        Route::get('/', ['as' => 'admin.website', 'uses' => 'Admin\PlanController@website']);
                        Route::post('managewebsite', ['as' => 'admin.plan.managewebsite', 'uses' => 'Admin\PlanController@managewebsite']);
                    });

            Route::group(['prefix' => 'category'], function () {
                        Route::get('/', ['as' => 'admin.category', 'uses' => 'Admin\CategoryController@index']);
                        Route::get('create', ['as' => 'admin.category.create', 'uses' => 'Admin\CategoryController@create']);
                        Route::get('edit/{id}', ['as' => 'admin.category.edit', 'uses' => 'Admin\CategoryController@edit']);
                        Route::post('store', ['as' => 'admin.category.store', 'uses' => 'Admin\CategoryController@store']);
                        Route::get('delete/{id}', ['as' => 'admin.category.delete', 'uses' => 'Admin\CategoryController@delete']);

                        Route::group(['prefix' => 'sub'], function () {
                                    Route::get('create/{id}', ['as' => 'admin.sub.category.create', 'uses' => 'Admin\SubCategoryController@create']);
                                    Route::get('edit/{id}', ['as' => 'admin.sub.category.edit', 'uses' => 'Admin\SubCategoryController@edit']);
                                    Route::post('store', ['as' => 'admin.sub.category.store', 'uses' => 'Admin\SubCategoryController@store']);
                                    Route::get('delete/{id}', ['as' => 'admin.sub.category.delete', 'uses' => 'Admin\SubCategoryController@delete']);
                                });
                    });

            Route::group(['prefix' => 'postcategory'], function () {
                        Route::get('/', ['as' => 'admin.postcategory', 'uses' => 'Admin\PostCategoryController@index']);
                        Route::get('create', ['as' => 'admin.postcategory.create', 'uses' => 'Admin\PostCategoryController@create']);
                        Route::get('edit/{id}', ['as' => 'admin.postcategory.edit', 'uses' => 'Admin\PostCategoryController@edit']);
                        Route::post('store', ['as' => 'admin.postcategory.store', 'uses' => 'Admin\PostCategoryController@store']);
                        Route::get('delete/{id}', ['as' => 'admin.postcategory.delete', 'uses' => 'Admin\PostCategoryController@delete']);

                        Route::group(['prefix' => 'sub'], function () {
                                    Route::get('create/{id}', ['as' => 'admin.post.sub.category.create', 'uses' => 'Admin\PostSubCategoryController@create']);
                                    Route::get('edit/{id}', ['as' => 'admin.post.sub.category.edit', 'uses' => 'Admin\PostSubCategoryController@edit']);
                                    Route::post('store', ['as' => 'admin.post.sub.category.store', 'uses' => 'Admin\PostSubCategoryController@store']);
                                    Route::get('delete/{id}', ['as' => 'admin.post.sub.category.delete', 'uses' => 'Admin\PostSubCategoryController@delete']);
                                });
                    });

            Route::group(['prefix' => 'class'], function () {
                        Route::get('/', ['as' => 'admin.class', 'uses' => 'Admin\PclassController@index']);
                        Route::get('create', ['as' => 'admin.class.create', 'uses' => 'Admin\PclassController@create']);
                        Route::get('edit/{id}', ['as' => 'admin.class.edit', 'uses' => 'Admin\PclassController@edit']);
                        Route::post('store', ['as' => 'admin.class.store', 'uses' => 'Admin\PclassController@store']);
                        Route::get('delete/{id}', ['as' => 'admin.class.delete', 'uses' => 'Admin\PclassController@delete']);

                        Route::group(['prefix' => 'sub'], function () {
                                    Route::get('create/{id}', ['as' => 'admin.sub.class.create', 'uses' => 'Admin\SubClassController@create']);
                                    Route::get('edit/{id}', ['as' => 'admin.sub.class.edit', 'uses' => 'Admin\SubClassController@edit']);
                                    Route::post('store', ['as' => 'admin.sub.class.store', 'uses' => 'Admin\SubClassController@store']);
                                    Route::get('delete/{id}', ['as' => 'admin.sub.class.delete', 'uses' => 'Admin\SubClassController@delete']);
                                });
                    });

            Route::group(['prefix' => 'type'], function () {
                        Route::get('/', ['as' => 'admin.type', 'uses' => 'Admin\TypeController@index']);
                        Route::get('create', ['as' => 'admin.type.create', 'uses' => 'Admin\TypeController@create']);
                        Route::get('edit/{id}', ['as' => 'admin.type.edit', 'uses' => 'Admin\TypeController@edit']);
                        Route::post('store', ['as' => 'admin.type.store', 'uses' => 'Admin\TypeController@store']);
                        Route::get('delete/{id}', ['as' => 'admin.type.delete', 'uses' => 'Admin\TypeController@delete']);
                    });
        });

Route::group(['prefix' => 'api/v1', 'before' => 'api-auth',], function () {
            Route::group(['prefix' => 'user'], function () {
                        Route::post('login', ['as' => 'api.v1.user.login', 'uses' => 'Api\UserController@login']);
                        Route::post('signup', ['as' => 'api.v1.user.signup', 'uses' => 'Api\UserController@signup']);
                        Route::post('profile', ['as' => 'api.v1.user.profile', 'uses' => 'Api\UserController@profile']);
                        Route::post('updateProfile', ['as' => 'api.v1.user.updateProfile', 'uses' => 'Api\UserController@updateProfile']);
                        Route::post('cart', ['as' => 'api.v1.user.cart', 'uses' => 'Api\UserController@cart']);
                        Route::post('offers', ['as' => 'api.v1.user.offers', 'uses' => 'Api\UserController@offers']);
                        Route::post('addCart', ['as' => 'api.v1.user.addCart', 'uses' => 'Api\UserController@addCart']);
                        Route::post('removeCart', ['as' => 'api.v1.user.removeCart', 'uses' => 'Api\UserController@removeCart']);
                    });

            Route::post('categories', ['as' => 'api.v1.categories', 'uses' => 'Api\CategoryController@index']);
            Route::post('cities', ['as' => 'api.v1.cities', 'uses' => 'Api\CityController@index']);

            Route::group(['prefix' => 'company'], function () {
                        Route::post('featured', ['as' => 'api.v1.company.featured', 'uses' => 'Api\CompanyController@featured']);
                        Route::post('search', ['as' => 'api.v1.company.search', 'uses' => 'Api\CompanyController@search']);
                        Route::post('detail', ['as' => 'api.v1.company.detail', 'uses' => 'Api\CompanyController@detail']);
                        Route::post('reviewTypes', ['as' => 'api.v1.company.reviewTypes', 'uses' => 'Api\CompanyController@reviewTypes']);
                    });
        });


Route::get('{slug}', ['as' => 'widget.embed.home', 'uses' => 'Widget\EmbedController@home']);
Route::group(['prefix' => 'embed'], function () {
            Route::get('{slug}/login', ['as' => 'widget.embed.login', 'uses' => 'Widget\EmbedController@login']);
            Route::get('{slug}/signup', ['as' => 'widget.embed.signup', 'uses' => 'Widget\EmbedController@signup']);
            Route::post('{slug}/doLogin', ['as' => 'widget.embed.doLogin', 'uses' => 'Widget\EmbedController@doLogin']);
            Route::post('{slug}/doSignup', ['as' => 'widget.embed.doSignup', 'uses' => 'Widget\EmbedController@doSignup']);
            Route::get('{slug}/doLogout', ['as' => 'widget.embed.doLogout', 'uses' => 'Widget\EmbedController@doLogout']);
            Route::post('{slug}/submitReview', ['as' => 'widget.embed.submitReview', 'uses' => 'Widget\EmbedController@submitReview']);
            Route::post('{slug}/uploadPhoto', ['as' => 'widget.embed.uploadPhoto', 'uses' => 'Widget\EmbedController@uploadPhoto']);
        });


Route::group(['prefix' => 'registration'], function () {
            Route::get('{slug}', ['as' => 'widget.registration.home', 'uses' => 'Widget\RegistrationController@home']);
            Route::get('{slug}/signup', ['as' => 'widget.registration.doSignup', 'uses' => 'Widget\RegistrationController@doSignup']);
        });

Route::get('offer/{slug}', ['as' => 'widget.offer.home', 'uses' => 'Widget\OfferController@home']);