<?php

use App\Http\Controllers\QrCode\QrCodeController;
use Illuminate\Support\Facades\Route;



use Illuminate\Http\Request;
use App\Http\Controllers\UserController;


Route::group(['middleware' => 'admin', 'prefix' => 'admin'], function () {
    Route::get('/', 'Admin\HomeCtrl@index')->name('admin_home');

    Route::get('/maintainance/mode', 'Live\LiveController@index')->name('maintainance');
    Route::get('live', 'Live\LiveController@activate');

    Route::resource('permissions', 'Admin\Permission\PermissionsController', ['names' => 'permissions']);
    Route::resource('sublets', 'Admin\SubLets\SubLetsController', ['names' => 'admin.sublets']);

    Route::resource('reservations', 'Admin\Reservations\ReservationsController', ['names' => 'admin.reservations']);
    Route::post('reservations/resendLink', 'Admin\Reservations\ReservationsController@resendLink');

    Route::resource('check-in', 'Admin\Reservations\ReservationsController', ['names' => 'admin.check-in']);
    Route::resource('agents', 'Admin\Agents\AgentsController', ['names' => 'admin.agents']);

    Route::post('upload', 'Admin\Uploads\UploadsController@store');
    Route::get('delete/upload', 'Admin\Uploads\UploadsController@destroy');

    Route::post('upload/image', 'Admin\Image\ImagesController@store');
    Route::post('delete/image', 'Admin\Image\ImagesController@undo');

    Route::resource('banners', 'Admin\Design\BannersController', ['names' => 'banners']);
    Route::get('customers',  'Admin\Users\UsersController@customers')->name('customers');
    Route::resource('reviews',  'Admin\Reviews\ReviewsController', ['names' => 'reviews']);
    Route::resource('posts',  'Admin\Blog\BlogController', ['names' => 'posts']);

    Route::get('post/{post_id}/comments',  'Admin\Comments\CommentsController@comments');
    Route::delete('comments/{comment}',  'Admin\Comments\CommentsController@destroy');

    Route::resource('settings', 'Admin\Settings\SettingsController', ['names' => 'settings']);
    Route::get('account', 'Admin\Account\AccountsController@index')->name('admin_account');
    Route::get('account/filter', 'Admin\Account\AccountsController@index')->name('filter_sales');
    Route::resource('category', 'Admin\Category\CategoryController', ['names' => 'category']);
    Route::post('category/delete/image', 'Admin\Category\CategoryController@undo');

    Route::resource('location', 'Admin\Location\LocationController', ['names' => 'location']);
    Route::resource('media', 'Admin\Media\MediaController', ['names' => 'media']);

    Route::resource('galleries', 'Admin\Gallery\GalleryController', ['names' => 'admin.galleries']);
    Route::resource('attributes', 'Admin\Attributes\AttributesController', ['names' => 'attributes']);
    Route::resource('rates', 'Admin\CurrencyRates\CurrencyRatesController', ['name' => 'rates']);
    Route::resource('vouchers', 'Admin\Vouchers\VouchersController', ['names' => 'vouchers']);

    Route::get('properties/apartment', 'Admin\Properties\PropertiesController@newRoom');
    Route::resource('properties', 'Admin\Properties\PropertiesController', ['names' => 'admin.properties']);
    Route::resource('apartments', 'Admin\Apartments\ApartmentsController', ['names' => 'admin.apartments']);

    Route::delete('room/{id}/delete', 'Admin\Rooms\RoomsController@destroy');

    Route::resource('category', 'Admin\Category\CategoryController', ['names' => 'category']);
    Route::post('category/delete/image', 'Admin\Category\CategoryController@undo');


    /* INFORMATION */
    Route::resource('pages', 'Information\InformationController', ['name' => 'pages']);
    /* INFORMATION */

    Route::post('logout',  'Auth\LoginController@logout')->name('admin_users_logout');
    Route::get('register', 'Admin\Users\UsersController@create')->name('create_admin_users');
    Route::post('register', 'Auth\RegisterController@register');

    Route::resource('users',  'Admin\Users\UsersController', ['names' => 'admin.users']);
    Route::resource('customers', 'Admin\Customers\CustomersController', ['name' => 'customers']);


    //Route::resource('templates',              'Admin\Templates\TemplatesController',['name'=>'templates']);

    Route::resource('promos',             'Admin\Promo\PromoController', ['names' => 'promos']);
    Route::get('promo-text/create/{id}',      'Admin\PromoText\PromoTextController@create')->name('create_promo_text');
    Route::get('promo-text/edit/{id}',   'Admin\PromoText\PromoTextController@edit')->name('edit_promo_text');
    Route::post('promo-text/edit/{id}',  'Admin\PromoText\PromoTextController@update');
    Route::post('promo-text/create/{id}',     'Admin\PromoText\PromoTextController@store');
    Route::get('promo-text/delete/{id}',     'Admin\PromoText\PromoTextController@destroy')->name('delete_promo_text');
    //Route::resource('services', 'Admin\Services\ServicesController',['names' =>'services']);
    Route::resource('requirements', 'Admin\Requirements\RequirementsController', ['names' => 'requirements']);
    Route::resource('facilities', 'Admin\Facilities\FacilitiesController', ['names' => 'facilities']);
});


Route::get('/', 'HomeController@home');
Route::get('home', 'HomeController@index');
Route::get('account', 'Account\AccountController@index');

Auth::routes();
Route::get('register/listings', 'Auth\RegisterMerchantController@create');
Route::post('register/listings', 'Auth\RegisterMerchantController@store');
Route::get('accounts/apartments', 'Apartments\ApartmentsController@apartments');
Route::get('login/{service}', 'Auth\SocialLoginController@redirect');
Route::get('login/{service}/callback', 'Auth\SocialLoginController@callback');
Route::post('login', 'Auth\LoginController@login');
Route::get('pages/{information}', 'Information\InformationController@show');


Route::get('/experience', 'Pages\PageController@index');
Route::get('/gallery', 'Pages\PageController@index');
Route::get('/about-us', 'Pages\PageController@index');
Route::get('/contact-us', 'Pages\PageController@index');
Route::get('/our-services', 'Pages\PageController@index');
Route::get('/board-of-directors', 'Pages\PageController@index');
Route::get('/download-pdf', [App\Http\Controllers\PdfController::class, 'downloadPdf'])->name('download-pdf');
