<?php

use App\Http\Controllers\LdapController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('ldap', [LdapController::class, 'TestLdapData'])->name('ldap');

// Route::get('ldap-test', function () {
//    $b = Artisan::call('ldap:test');
//     return view($b);

// });

Route::post('/ldap/settings', 'LdapController@updateSettings')->name('ldap.settings.update');

Route::post('/ldap/settings', [LdapController::class, 'updateSettings'])->name('ldap.settings.update');

Route::post('saveTxt' , [LdapController::class, 'saveTxt'])->name('saveTxt');
