<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\settingsController;
use App\Http\Controllers\user\wabColntroller;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

use function PHPUnit\Framework\returnSelf;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ,'IsAdmin'  ]
    ], function(){ //...


        Route::get('/dashboard', function () {
            return view('dashboard');
        })->middleware(['auth', 'verified'])->name('dashboard');

        Route::middleware('auth')->group(function () {
            Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
            Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
            Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
            Route::get('/profile/index', [ProfileController::class, 'index'])->name('profile.index');
            Route::resource('categories',CategoryController::class);
            Route::resource('products',ProductController::class);
            Route::resource('orders', OrderController::class);

            Route::prefix('settings')->group(function () {
                Route::get('/side',[settingsController::class , 'index'])->name('side.index');

            });

        });


    });

    Route::get('/', function () {
        return view('welcome');

    });
    Route::group(
        [
            'prefix' => LaravelLocalization::setLocale(),
            'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
        ], function(){ //...
            Route::get('/ui' ,[ wabColntroller::class , 'index']);

        });



require __DIR__.'/auth.php';
