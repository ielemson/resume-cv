<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Blade\UserController;
use App\Http\Controllers\Blade\RoleController;
use App\Http\Controllers\Blade\PermissionController;
use App\Http\Controllers\Blade\HomeController;
use App\Http\Controllers\Blade\ApiUserController;
use App\Http\Controllers\Blade\PortfolioController;
use App\Http\Controllers\ContactusController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Blade (front-end) Routes
|--------------------------------------------------------------------------
|
| Here is we write all routes which are related to web pages
| like UserManagement interfaces, Diagrams and others
|
*/

// Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function (){

//     \UniSharp\LaravelFilemanager\Lfm::routes();

// });
// Default laravel auth routes
// Route::get('/register',function(){

//     return redirect()->route('login');

// })->name('register');

Route::get('/',[PortfolioController::class,'welcome'])->name('welcome');
Route::get('portfolio/show/{id}',[PortfolioController::class,'show_front']);


// contact us

// Route::get('contact-form-captcha', [ContactusController::class, 'index']);
Route::post('contactus', [ContactusController::class, 'capthcaFormValidate'])->name('contactus.post');
Route::get('reload-captcha', [ContactusController::class, 'reloadCaptcha']);

Auth::routes(['register' => false]);

// Web pages
Route::group(['middleware' => 'auth'],function (){

    // there should be graphics, diagrams about total conditions
    Route::get('/home', [HomeController::class,'index'])->name('home');

    // Users
    Route::get('/users',[UserController::class,'index'])->name('userIndex');
    Route::get('/user/add',[UserController::class,'add'])->name('userAdd');
    Route::post('/user/create',[UserController::class,'create'])->name('userCreate');
    Route::get('/user/{id}/edit',[UserController::class,'edit'])->name('userEdit');
    Route::post('/user/update/{id}',[UserController::class,'update'])->name('userUpdate');
    Route::delete('/user/delete/{id}',[UserController::class,'destroy'])->name('userDestroy');
    Route::get('/user/theme-set/{id}',[UserController::class,'setTheme'])->name('userSetTheme');

    // Permissions
    Route::get('/permissions',[PermissionController::class,'index'])->name('permissionIndex');
    Route::get('/permission/add',[PermissionController::class,'add'])->name('permissionAdd');
    Route::post('/permission/create',[PermissionController::class,'create'])->name('permissionCreate');
    Route::get('/permission/{id}/edit',[PermissionController::class,'edit'])->name('permissionEdit');
    Route::post('/permission/update/{id}',[PermissionController::class,'update'])->name('permissionUpdate');
    Route::delete('/permission/delete/{id}',[PermissionController::class,'destroy'])->name('permissionDestroy');

    // Roles
    Route::get('/roles',[RoleController::class,'index'])->name('roleIndex');
    Route::get('/role/add',[RoleController::class,'add'])->name('roleAdd');
    Route::post('/role/create',[RoleController::class,'create'])->name('roleCreate');
    Route::get('/role/{role_id}/edit',[RoleController::class,'edit'])->name('roleEdit');
    Route::post('/role/update/{role_id}',[RoleController::class,'update'])->name('roleUpdate');
    Route::delete('/role/delete/{id}',[RoleController::class,'destroy'])->name('roleDestroy');

    // ApiUsers
    Route::get('/api-users',[ApiUserController::class,'index'])->name('api-userIndex');
    Route::get('/api-user/add',[ApiUserController::class,'add'])->name('api-userAdd');
    Route::post('/api-user/create',[ApiUserController::class,'create'])->name('api-userCreate');
    Route::get('/api-user/show/{id}',[ApiUserController::class,'show'])->name('api-userShow');
    Route::get('/api-user/{id}/edit',[ApiUserController::class,'edit'])->name('api-userEdit');
    Route::post('/api-user/update/{id}',[ApiUserController::class,'update'])->name('api-userUpdate');
    Route::delete('/api-user/delete/{id}',[ApiUserController::class,'destroy'])->name('api-userDestroy');
    Route::delete('/api-user-token/delete/{id}',[ApiUserController::class,'destroyToken'])->name('api-tokenDestroy');

    // Portfolio
    Route::get('portfolio',[PortfolioController::class,'index'])->name('portfolio.index');
    Route::get('portfolio/create',[PortfolioController::class,'create'])->name('portfolio.create');
    Route::post('portfolio/store',[PortfolioController::class,'store'])->name('portfolio.store');
    Route::get('portfolio/edit/{id}',[PortfolioController::class,'edit'])->name('portfolio.edit');
    Route::put('portfolio/edit/{id}',[PortfolioController::class,'update'])->name('portfolio.update');
    Route::get('portfolio/all',[PortfolioController::class,'view_portfolio'])->name('portfolio.all');

    // Portfolio Category
    Route::get('portfolio/category/create',[PortfolioController::class,'cat_create'])->name('portfolio.cat.create');
    Route::post('portfolio/category/store',[PortfolioController::class,'cat_store'])->name('portfolio.cat.store');
    Route::get('portfolio/category/edit/{id}',[PortfolioController::class,'cat_edit'])->name('portfolio.cat.edit');
    Route::put('portfolio/category/update/{id}',[PortfolioController::class,'portfolio_cat_update'])->name('portfolio.cat.update');
    Route::delete('portfolio/category/delete/{id}',[PortfolioController::class,'cat_destroy'])->name('portfolio.cat.delete');
});

// Change language session condition
// Route::get('/language/{lang}',function ($lang){
//     $lang = strtolower($lang);
//     if ($lang == 'ru' || $lang == 'uz' || $lang == 'en')
//     {
//         session([
//             'locale' => $lang
//         ]);
//     }
//     return redirect()->back();
// });

/*
|--------------------------------------------------------------------------
| This is the end of Blade (front-end) Routes
|-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\
*/


