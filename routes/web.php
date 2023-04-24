<?php

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
    return view('index');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

// Route::get('/admin_panel', function () {
//     return view('admin.home.index');
// })->middleware(['auth'])->name('homeAdmin');

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/signup', [App\Http\Controllers\PartnerRegistrationController::class, 'index'])->name('signup');

Route::resource('partner_registration', App\Http\Controllers\PartnerRegistrationController::class);

Route::get('page/{slug}', [App\Http\Controllers\PageController::class, 'show'])->name('page');

/*Route::get('/posts/{post:slug}', function (Post $post) {
    return $post;
});*/

// Доступ к главной странице в админ панели для Админа
Route::prefix('admin_panel')->group( function () {

    Route::middleware(['auth','role:admin'])->group( function () {
        Route::get('/', [App\Http\Controllers\Admin\PartnerOperationController::class, 'index'])->name('homeAdmin');

        Route::resource('partners', App\Http\Controllers\Admin\PartnerController::class);

        Route::resource('partner_category', App\Http\Controllers\Admin\PartnerCategoryController::class);

        Route::resource('partner_operation', App\Http\Controllers\Admin\PartnerOperationController::class);

        Route::get('/partner/{id}/action', [App\Http\Controllers\Admin\PartnerOperationController::class, 'action'])->name('partner_operation.action');

        Route::resource('partner_reward', App\Http\Controllers\Admin\RewardOperationController::class);

        Route::resource('pages', App\Http\Controllers\Admin\PageController::class);
        
        Route::resource('mainpage_block', App\Http\Controllers\Admin\MainpageBlockController::class);
        
        Route::resource('orders', App\Http\Controllers\Admin\OrderController::class);

         // TODO: переделать на поиск партнеров
        Route::post('/ajax/get_relative_partner', [App\Http\Controllers\Admin\AjaxController::class, 'ajaxGetRelativePartner'])->name('ajax.admin.get_relative_partner');
        
        Route::resource('notify', App\Http\Controllers\Admin\NotifyController::class);

        Route::get('options', [App\Http\Controllers\Admin\OptionController::class, 'index'])->name('options.index');
        Route::post('options/update', [App\Http\Controllers\Admin\OptionController::class, 'update'])->name('options.update');

        // Route::get('/elfinder/popup', [Barryvdh\Elfinder\ElfinderController::class, 'showPopup']);

    });

});

// Доступ к главной странице личного кабинета для партнера
// Route::middleware(['auth','role:user|admin'])->group( function () {
Route::middleware(['auth','role:user|admin'])->group( function () {
    Route::prefix('partner_panel')->group( function () {
        Route::get('/', [App\Http\Controllers\Partner\HomePartnerController::class, 'index'])->name('partner_panel');
        Route::get('partner_network', [App\Http\Controllers\Partner\NetworkPartnerController::class, 'index'])->name('partner_network');

        Route::get('partner_orders', [App\Http\Controllers\Partner\OrdersPartnerController::class, 'index'])->name('partner_orders');
    });


});




