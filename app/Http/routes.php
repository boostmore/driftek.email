<?php

/*
 * Driftek Routes
 */


// Allow Registration for 1st User (Admin User). TODO: Find more elegant way to provide Registration for 1st User.
if(\App\User::all()->count() == 0) {
    Route::get('auth/register', 'Auth\AuthController@getRegister');
    Route::post('auth/register', 'Auth\AuthController@postRegister');
}


//This Section of the Site, User Must be authenticated.
Route::group(['middleware' => 'auth'], function() {
    Route::get('/', function () {
        return view('pages.index');
    });

    //Domains
    Route::resource("domain/registrar/account","RegistrarAccountController");
    Route::resource("domain/registrar","RegistrarController");
    Route::resource("domain/template","DnsTemplateController");
    Route::get("domain/bulkcreate",'DomainController@bulkCreate');
    Route::post("domain/bulkcreate",'DomainController@bulkStore');
    Route::resource("domain",'DomainController');
    

    //Tools
    Route::get("tools", function() {
        return view('pages.tools.index');
    });
    Route::get("tools/rdns_generator", 'Tools\RDNSGeneratorController@index');
    Route::post("tools/rdns_generator", 'Tools\RDNSGeneratorController@generate');
    Route::get("tools/domain_generator", 'Tools\DomainGeneratorController@index');
    Route::post("tools/domain_generator", 'Tools\DomainGeneratorController@generate');

// Registration routes...
    if(\App\User::all()->count() > 0) { // only allow registration if no users exist (1st time only)
        Route::get('auth/register', 'Auth\AuthController@getRegister');
        Route::post('auth/register', 'Auth\AuthController@postRegister');
    }
});

Route::resource('api/optin','OptinController');

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');