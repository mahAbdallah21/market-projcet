<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\settingsController;
use App\Http\Controllers\user\wabColntroller;
use Illuminate\Routing\RouteGroup;
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
                Route::get('/side/create',[settingsController::class , 'create'])->name('side.create');
                Route::post('/side/store',[settingsController::class , 'store'])->name('side.store');
                Route::get('/side/edit/{id}',[settingsController::class , 'edit'])->name('side.edit');
                Route::patch('/side/update/{id}',[settingsController::class , 'update'])->name('side.update');
                Route::delete('/side/destroy/{id}',[settingsController::class , 'destroy'])->name('side.destroy');

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
            Route::prefix('ui')->name('ui.')->group(function(){
            Route::get('/' ,[ wabColntroller::class , 'index'])->name('home');
            Route::get('/categories/{id?}' ,[ wabColntroller::class , 'categories'])->name('categories');
            Route::get('/products/{id?}' ,[ wabColntroller::class , 'products'])->name('products');
            Route::get('/about' ,[ wabColntroller::class , 'about'])->name('about');





            });

        });



require __DIR__.'/auth.php';
