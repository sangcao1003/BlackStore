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
//Auth::routes(['verify' => true]);

Route::get('/', function () {
    return view('test');
});

Route::get('test', function () {
    return view('admin.layout.includes.content');
});

Route::namespace('Admin')->group(function () {
    Route::namespace('Auth')->group(function () {
        Route::get('login', 'LoginController@showLoginForm')->name('admin.login');
        Route::post('login', 'LoginController@login');
        Route::post('logout', 'LoginController@logout')->name('admin.logout');
        Route::get('register', 'RegisterController@showRegistrationForm')->name('admin.register');
        Route::post('register', 'RegisterController@register');
        Route::get('email/verify', 'VerificationController@show')->name('verification.notice');
        Route::get('email/verify/{id}', 'VerificationController@verify')->name('verification.verify');
        Route::get('email/resend', 'VerificationController@resend')->name('verification.resend');
        Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('admin.password.forgot');
        Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('admin.password.send_link');
        Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('admin.password.reset');
        Route::post('password/reset', 'ResetPasswordController@reset');
        Route::get('password/confirm', 'ResetPasswordController@showConfirmForm')->name('admin.password.confirm');
        Route::get('/redirect/{social}', 'SocialAuthController@redirect');
        Route::get('/callback/{social}', 'SocialAuthController@callback');
    });
    Route::group(['middleware' => ['auth', 'verified', 'admin'], 'prefix' => 'admin'], function() {
        Route::get('/', 'HomeController@index')->name('admin.home');
        Route::get('users/profile', 'UserController@showProfileUser')->name('users.profile');
        Route::put('users/profile', 'UserController@updateProfileUser');
        Route::get('users/password', 'UserController@formChangePassword')->name('users.password');
        Route::put('users/password', 'UserController@changePassword')->name('users.password');
    });

});
