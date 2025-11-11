<?php


use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\company\DashboardController;
use App\Http\Controllers\company\upload\DocumentUploadController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Services\SmsService;
Route::get('/', function () {
//    $sms = new SmsService();
//    return $sms->sendOtp('09912906499','1111');
      return view('index', ['posts'=>\App\Models\Post::all()]);



})->name('home');
Route::get('/single', function () {
    return view('single');
});
Route::get('/tree', function () {
    return view('tree_view');
})->name('tree');

Route::get('/event', function () {
    return view('events/event_2025');
});

Route::get('/books', function () {
    return view('books');
});

Route::get('/blog', function () {
    return view('blog');
});
Route::get('/about', function () {
    return view('about');
});

Route::group(['prefix' => 'api'], function () {
    Route::post('/register/company', [\App\Http\Controllers\API\CompanyController::class, 'store']);
    Route::post('/register/verify-otp', [\App\Http\Controllers\API\CompanyController::class, 'verifyOtp']);
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [\App\Http\Controllers\HomeController::class, 'register'])->name('register');
Route::group(['middleware' => ['auth']], function () {
    Route::resource('/api/v1/post/tags', \App\Http\Controllers\admin\TagController::class)->names('admin.api.tags');

    Route::group(['prefix' => 'admin', 'middleware'=>'role:owner'], function () {
        Route::get('/', [\App\Http\Controllers\admin\DashboardController::class, 'index'])->name('admin_dashboard');

        Route::get('/post/list', function () {
            return view('layouts.vuexy.pages.admin.post_list');
        })->name('post_list');


        Route::resource('/post/tags', \App\Http\Controllers\admin\TagController::class)->names('admin.tags');

//        Route::get('/post/category', function () {
//            return view('layouts.vuexy.pages.admin.category', ['allCategories'=> [],'categories'=> []]);
//        })->name('post_category');

        Route::get('/meeting', function () {
            return view('layouts.vuexy.pages.admin.meeting');
        })->name('meeting');

        Route::get('/meeting/member', function () {
            return view('layouts.vuexy.pages.admin.meeting_member');
        })->name('meeting_member');

        Route::get('/post/add', [\App\Http\Controllers\API\PostController::class, 'add'])->name('post_add');
        Route::post('/post/add', [\App\Http\Controllers\API\PostController::class, 'store'])->name('post_store');
        Route::post('/post/upload', [\App\Http\Controllers\API\PostController::class, 'upload'])->name('admin.post.upload');

        Route::get('/contact', function () {
            return view('layouts.vuexy.pages.admin.contact');
        })->name('contact');

        Route::get('/settings', function () {
            return view('layouts.vuexy.pages.admin.settings');
        })->name('settings');

//        Route::get('/tags', function () {
//            return view('layouts.vuexy.pages.admin.tags');
//        })->name('tags');

        Route::get('/backup', function () {
            return view('layouts.vuexy.pages.admin.backup');
        })->name('backup');

        Route::get('/log', function () {
            return view('layouts.vuexy.pages.admin.log');
        })->name('logp');

        Route::get('/comments', function () {
            return view('layouts.vuexy.pages.admin.comments');
        })->name('comments');

        Route::get('/statistics', function () {
            return view('layouts.vuexy.pages.admin.statistics');
        })->name('statistics');



        Route::group(['prefix' => 'company','as' => 'company.'], function () {
            Route::get('list', [\App\Http\Controllers\CompanyController::class, 'list'])->name('current');
            Route::get('pending', [\App\Http\Controllers\CompanyController::class, 'pending'])->name('pending');
            Route::get('finance', [\App\Http\Controllers\CompanyController::class, 'finance'])->name('finance');
            Route::get('category', [\App\Http\Controllers\CompanyController::class, 'categories'])->name('category');
            Route::get('review/{company}', [\App\Http\Controllers\CompanyController::class, 'review'])->name('review');
            Route::get('{company}/download/{documentType}', [\App\Http\Controllers\CompanyController::class, 'download'])->name('documents');
        });

        Route::group(['prefix' => 'api','as' => 'api.'], function () {
            Route::post('review/{company}', [\App\Http\Controllers\CompanyController::class, 'submitReview'])->name('submitReview');
        });
    });

    Route::group(['prefix' => 'company', 'middleware'=>'role:company'], function () {
        Route::get('/', [DashboardController::class, 'index'])->name('company_dashboard');

        Route::get('/agents', function () {
            return view('layouts.vuexy.pages.company.agents');
        })->name('agents');

        Route::get('/cartable', function () {
            return view('layouts.vuexy.pages.company.cartable');
        })->name('agents');

        Route::get('/upload_documents', [DocumentUploadController::class, 'showUploadPage'])
            ->name('upload_documents');
        Route::post('/upload/{documentType}', [DocumentUploadController::class, 'store'])
            ->name('documents.upload');
        Route::get('/download/{documentType}', [DocumentUploadController::class, 'download'])
            ->name('documents.download');

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


    Route::group(['prefix' => 'api'], function () {
        Route::group(['prefix'=>'post'], function () {
            Route::get('list', [\App\Http\Controllers\API\PostController::class, 'index']);
        });

        Route::group(['prefix'=>'company'], function () {
            Route::get('list', [\App\Http\Controllers\API\CompanyController::class, 'index']);
            Route::get('pending', [\App\Http\Controllers\API\CompanyController::class, 'pending']);
            Route::get('categories', [\App\Http\Controllers\API\CompanyController::class, 'categories']);
        });

        Route::group(['prefix'=>'invoice'], function () {
            Route::get('list', [\App\Http\Controllers\API\InvoiceController::class, 'index']);
            Route::get('statistics', [\App\Http\Controllers\API\InvoiceController::class, 'statistics']);
        });
    });

});


Route::get('/{slug}', [\App\Http\Controllers\PostController::class, 'show'])->name('single');
