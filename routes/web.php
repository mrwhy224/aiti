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

        Route::get('/post/list', function () {
            return view('layouts.vuexy.pages.admin.post_list');
        })->name('post_list');

        Route::get('/post/add', function () {
            return view('layouts.vuexy.pages.admin.post_add');
        })->name('post_add');

        Route::get('/contact', function () {
            return view('layouts.vuexy.pages.admin.contact');
        })->name('contact');

        Route::get('/settings', function () {
            return view('layouts.vuexy.pages.admin.settings');
        })->name('settings');

        Route::get('/tags', function () {
            return view('layouts.vuexy.pages.admin.tags');
        })->name('tags');

        Route::get('/comments', function () {
            return view('layouts.vuexy.pages.admin.comments');
        })->name('comments');

        Route::get('/statistics', function () {
            return view('layouts.vuexy.pages.admin.statistics');
        })->name('statistics');

        Route::get('/company/finance', function () {
            return view('layouts.vuexy.pages.admin.finance');
        })->name('admin_finance');

        Route::get('/company/list', function () {
            return view('layouts.vuexy.pages.admin.current_company');
        })->name('current_company');

        Route::get('/company/pending', function () {
            return view('layouts.vuexy.pages.admin.pending_company');
        })->name('pending_company');
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
