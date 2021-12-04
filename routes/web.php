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

// Route::auth();
// http://127.0.0.1:8000/

// trial expire debug routes

use App\User;
use Illuminate\Support\Facades\Mail;

Route::get('/two_days', 'FrontEndController@two_days_before');
Route::get('/one_day', 'FrontEndController@one_day_before');
Route::get('/two_day_after_expire', 'FrontEndController@two_day_after_expire');
Route::get('/trial_end', 'FrontEndController@trial_end');



Route::get('/', 'FrontEndController@index')->name('frontend.index');
Route::get('/register', 'FrontEndController@register');

Route::get('/forgot', 'FrontEndController@forgotPassword');
Route::post('/forgot', 'FrontEndController@password');
Route::get('/reset_password/{email}/{token}', 'FrontEndController@getVerifyToken');
Route::post('/reset_password', 'FrontEndController@resetPassword');

Route::post('/login', 'FrontEndController@login')->name('login');
Route::post('register', 'Auth\RegisterController@register')->name('register');
Route::get('/verify/{token}', 'Auth\RegisterController@verify')->name('verify_token');





Route::get('/contact', function () {
    return view('pages.contact');
});

Route::get('/example', function () {
    return view('pages.example');
});

Route::get('/view/property/{propertyid}', 'FrontEndController@template')->name('property_details');
Route::get('/preview/{propertyid}', 'FrontEndController@preview_property')->name('preview_property');
// Route::get('/template2/{propertyid}', 'FrontEndController@template2');
// Route::get('/template3/{propertyid}', 'FrontEndController@template3');
// Route::get('/template4/{propertyid}', 'FrontEndController@template4');
Route::get('template1', 'FrontEndController@template1');
Route::get('template2', 'FrontEndController@template2');
Route::get('template3', 'FrontEndController@template3');
Route::get('template4', 'FrontEndController@template4');
Route::get('/getCountries', 'FrontEndController@getCountries');
Route::get('/state/{id}', 'FrontEndController@getStates');
Route::get('/city/{id}', 'FrontEndController@getCities');

Route::get('/admin/login', 'AdminController@index')->name('login');
Route::post('/admin/login', 'AdminController@login')->name('admin.login');
Route::any('logout', 'FrontEndController@logout')->name('frontend.logout');
Route::post('lead-contact', 'PropertyController@leadContact');
Route::get('{company_name}/{id}/landing-page', 'FrontEndController@broker_landing_page')->name('broker_landing_page');
Route::post('broker-contact-form', 'FrontEndController@broker_contact_form')->name('broker_contact_form');
Route::get('load_more_properties', 'FrontEndController@load_more_properties')->name('load_more_properties');

Route::group(['middleware' => ['auth', 'revalidate']], function () {
    //All the routes that belongs to the group goes here
    Route::get('dashboard', 'FrontEndController@dashboard')->name('user_dashbaord');
    Route::get('billing', 'FrontEndController@billing')->name('billing');
    Route::post('publish', 'PropertyController@publishProperty')->name('publishProperty');

    Route::get('property/{id?}', 'FrontEndController@property')->name('property');
    Route::post('property', 'PropertyController@propertySave')->name('propertySave');
    Route::get('delete-property/{id}', 'PropertyController@propertyDelete')->name('propertyDelete');
    Route::get('search-property/{id}', 'PropertyController@searchProperty')->name('searchProperty');

    Route::get('property_details/{id}', 'PropertyController@getProperty')->name('getproperty');
    Route::get('getPropertyData/{id}', 'PropertyController@getPropertyData')->name('getPropertyData');
    Route::post('property-details/', 'PropertyController@propertyDetails')->name('propertyDetails');
    Route::post('property-details-update/', 'PropertyController@propertyDetailsUpdate')->name('propertyDetailsUpdate');

    Route::get('voh/{id}', 'PropertyController@voh')->name('voh');
    Route::post('voh', 'PropertyController@vohPost')->name('voh-save');
    Route::get('deleteVoh/{id}', 'PropertyController@deleteVoh');
    Route::get('editVoh/{id}', 'PropertyController@editVoh');
    Route::post('register_voh', 'PropertyController@register_voh')->name('register_voh');


    Route::get('floor/{id}', 'PropertyController@floor')->name('floor');
    Route::post('floor', 'PropertyController@saveFloor')->name('floor-save');

    Route::get('editFloor/{id}', 'PropertyController@editFloor')->name('floor-edit');
    Route::post('updatefloor', 'PropertyController@updateFloor')->name('floor-update');


    Route::get('docs-floor/{id}', 'PropertyController@docsFloor')->name('docs-floor');
    Route::post('deleteDocsAjax', 'PropertyController@deleteDocsAjax')->name('deleteDocsAjax');

    Route::get('theme/{id}', 'PropertyController@theme')->name('theme');
    Route::post('theme', 'PropertyController@saveTheme')->name('save-theme');
    Route::post('uploadlogo', 'PropertyController@uploadLogo')->name('upload-logo');
    Route::post('deletelogo', 'PropertyController@deleteLogo')->name('delete-logo');
    Route::post('uploadbackground', 'PropertyController@uploadBackground')->name('upload-logo');
    Route::post('deletebackground', 'PropertyController@deleteBackground')->name('delete-logo');


    Route::get('virtual/{id}', 'PropertyController@virtual')->name('virtual');
    Route::post('virtual', 'PropertyController@saveVirtual')->name('save-virtual');
    Route::post('updateVirutalType', 'PropertyController@updateVirutalType');
    Route::get('deleteVirtual/{id}', 'PropertyController@deleteVirtual');


    Route::get('video/{id}', 'PropertyController@video')->name('video');
    Route::post('video', 'PropertyController@saveVideo')->name('save-video');
    Route::post('updateVideType', 'PropertyController@updateVideType');
    Route::get('deleteVideo/{id}', 'PropertyController@deleteVideo');

    Route::get('address/{id}', 'PropertyController@address')->name('address');
    Route::post('saveAddress', 'PropertyController@saveAddress')->name('save-address');

    Route::get('advance/{id}', 'PropertyController@advance')->name('advance');
    Route::post('advance', 'PropertyController@saveAdvance')->name('save-advance');


    Route::get('lead/{id}', 'PropertyController@lead')->name('lead');
    Route::get('lead-photo/{id}', 'PropertyController@leadPhoto')->name('lead-photo');
    Route::post('saveLeadPhoto', 'PropertyController@saveleadPhoto')->name('save-lead-photo');
    Route::get('domains/{id}', 'PropertyController@domain')->name('domain');

    Route::post('send-reply', 'PropertyController@sendReply');

    Route::get('photos/{id}', 'PropertyController@photos')->name('photos');
    Route::post('upload-photo', 'PropertyController@uploadPhoto')->name('upload-photo');
    Route::post('getImageAjax', 'PropertyController@getImageAjax')->name('getImageAjax');
    Route::post('deleteImageAjax', 'PropertyController@deleteImageAjax')->name('deleteimageAjax');



    Route::get('checkout/{id}', 'FrontEndController@checkout')->name('checkout');
    Route::get('payment', 'PayPalController@payment')->name('payment');
    Route::get('cancel', 'PayPalController@cancel')->name('payment.cancel');
    Route::get('payment/success', 'PayPalController@success')->name('payment.success');



    Route::get('profile', 'FrontEndController@profile')->name('profile');
    Route::post('update-profile', 'FrontEndController@updateProfile')->name('updateprofile');
    Route::post('uploadphoto', 'FrontEndController@uploadPhoto')->name('upload-uploadPhoto');
    Route::post('upload_custom_logo', 'FrontEndController@upload_custom_logo')->name('upload-customlogo');

    Route::get('profile/change-password', 'FrontEndController@changePassword')->name('changepassword');
    Route::post('change-passsword', 'FrontEndController@updatePassword')->name('updatepassword');


    Route::get('client', 'FrontEndController@client')->name('client');
    Route::post('add-client', 'FrontEndController@addClient')->name('addclient');
    Route::get('list-client', 'FrontEndController@listClient')->name('listclient');


    Route::get('add-api', 'ManageApiController@create')->name('manage-api.add');
    Route::post('save-api', 'ManageApiController@store')->name('manage-api.save');

    Route::get('idx-listing', 'ImportPropertyController@idxListing')->name('idx.listing');
    Route::post('import-listing', 'ImportPropertyController@importListing')->name('import.listing');
    



    Route::get('/admin/dashboard', 'AdminController@dashboard')->name('admin.dashboard');

    Route::get('/admin/user', 'AdminController@user')->name('admin.user');
    Route::get('/admin/user/add', 'AdminController@createUser')->name('admin.user');
    Route::post('/admin/user/add', 'AdminController@addUser')->name('admin.user.add');

    Route::get('/admin/user/view/{id}', 'AdminController@viewUser');

    Route::get('/admin/user/edit/{id}', 'AdminController@editUser');
    Route::post('/admin/user/update', 'AdminController@updateUser')->name('admin.user.update');
    Route::get('/admin/user/active/{id}/{status}', 'AdminController@inactiveUser')->name('admin.user.inactive');

    Route::get('/admin/plan', 'AdminController@plan')->name('admin.plan');
    Route::get('/admin/plan/add', 'AdminController@createPlan')->name('admin.plan');
    Route::post('/admin/plan/add', 'AdminController@addPlan')->name('admin.plan.add');

    Route::get('/admin/plan/view/{id}', 'AdminController@viewPlan');

    Route::get('/admin/plan/edit/{id}', 'AdminController@editPlan');
    Route::post('/admin/plan/update', 'AdminController@updatePlan')->name('admin.plan.update');
    Route::get('/admin/plan/delete/{id}', 'AdminController@deletePlan')->name('admin.plan.delete');

    Route::get('/admin/property/{id}', 'AdminController@getProperties')->name('admin.property.list');
    Route::get('/admin/make-publish/{id}/{status}', 'AdminController@makePublish');
    Route::get('/admin/view/{id}', 'AdminController@getProperty')->name('admin.property');

    Route::get('/admin/subscription', 'AdminController@getSubscription')->name('admin.subscription');
    Route::get('/admin/change-password', 'AdminController@changePassword')->name('changepasswordadmin');
    Route::post('/admin/change-passsword', 'AdminController@updatePassword')->name('updatepasswordadmin');


    Route::get('/admin/logout', 'AdminController@logout')->name('admin.logout');


    Route::resource('/admin/coupons', 'CouponController');
    Route::post('/check_coupon', 'CouponController@check_coupon');
    Route::post('/extend_validity', 'FrontEndController@extend_validity');
});