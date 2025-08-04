<?php


use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', function () {
    return view('layouts.vuexy.pages.register');
});
Route::group(['middleware' => ['auth']], function () {

    Route::group(['prefix' => 'admin', 'middleware'=>'role:owner'], function () {
        Route::get('/', function () {
            return view('layouts.vuexy.pages.admin.dashboards');
        })->name('admin_dashboard');
    });
    
    Route::group(['prefix' => 'company', 'middleware'=>'role:company'], function () {
        Route::get('/', function () {
            return view('layouts.vuexy.pages.company.dashboards');
        })->name('company_dashboard');

        Route::get('/agents', function () {
            return view('layouts.vuexy.pages.company.agents');
        })->name('agents');

        Route::get('/upload_documents', function () {
            return view('layouts.vuexy.pages.company.upload');
        })->name('upload_documents');

        Route::get('/profile', function () {
            return view('layouts.vuexy.pages.company.profile');
        })->name('company_profile');

        Route::get('/finance', function () {
            return view('layouts.vuexy.pages.company.finance');
        })->name('company_finance');

        Route::get('/members', function () {
            return view('layouts.vuexy.pages.company.members');
        })->name('company_members');
    });

    Route::group(['prefix' => 'panel', 'middleware'=>'role:default'], function () {
        Route::get('/', function () {
            return view('layouts.vuexy.pages.dashboards');
        })->name('default_dashboard');
    });
});
