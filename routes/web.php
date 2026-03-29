<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminAboutController;
use App\Http\Controllers\Admin\AdminContactController;
use App\Http\Controllers\Admin\AdminOfferController;
use App\Http\Controllers\Admin\AdminPositionController;
use App\Http\Controllers\Admin\AdminApplicationController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Admin\AdminUnitController;

use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/apply/{id}', [IndexController::class, 'show'])->name('apply.job');
Route::post('/apply/{id}', [IndexController::class, 'store'])->name('apply.store');


Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function (){
        // Navigations ==============
        Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
        Route::get('about', [AdminAboutController::class, 'index'])->name('about');
        Route::get('offer', [AdminOfferController::class, 'index'])->name('offer');
        Route::get('contact', [AdminContactController::class, 'index'])->name('contact');
        Route::get('position', [AdminPositionController::class, 'index'])->name('position');
        Route::get('unit', [AdminUnitController::class, 'index'])->name('unit');
        Route::get('applicaiton', [AdminApplicationController::class, 'index'])->name('application');

        // section_unit Management =============  
        Route::get('management/CreateUnit', [AdminUnitController::class, 'show'])->name('add.section_unit.show');
        Route::get('management/UpdateUnit/{id}', [AdminUnitController::class, 'showUpdate'])->name('update.unit.show');
        Route::get('management/DeleteUnit/{id}', [AdminUnitController::class, 'destroy'])->name('delete.unit.show');
        Route::post('management/CreateUnit', [AdminUnitController::class, 'store'])->name('add.unit.store');
        Route::put('management/UpdateUnit/{id}', [AdminUnitController::class, 'update'])->name('update.unit');

        // Information management
        Route::get('management/CreateInformation', [AdminAboutController::class, 'show'])->name('add.information.show');
        Route::post('management/CreateInformation', [AdminAboutController::class, 'store'])->name('add.information.store');
        Route::get('management/DeleteInformation/{id}', [AdminAboutController::class, 'destroy'])->name('delete.information.show');
        Route::get('management/UpdateInformation/{id}', [AdminAboutController::class, 'showUpdate'])->name('update.information.show');
        Route::put('management/UpdateInformation/{id}', [AdminAboutController::class, 'update'])->name('update.information');

        // Offer management   
        Route::get('management/CreateOffer', [AdminOfferController::class, 'show'])->name('add.offer.show');
        Route::post('management/CreateOffer', [AdminOfferController::class, 'store'])->name('add.offer.store');
        Route::get('management/UpdateOffer/{id}', [AdminOfferController::class, 'showUpdate'])->name('update.offer.show');
        Route::put('management/UpdateOffer/{id}', [AdminOfferController::class, 'update'])->name('update.offer');
        Route::get('management/DeleteOffer/{id}', [AdminOfferController::class, 'destroy'])->name('delete.offer');

        // Position management   
        Route::get('management/CreatePosition', [AdminPositionController::class, 'show'])->name('add.position.show');
        Route::post('management/CreatePosition', [AdminPositionController::class, 'store'])->name('add.position.store');
        Route::get('management/UpdatePosition/{id}', [AdminPositionController::class, 'showUpdate'])->name('update.position.show');
        Route::put('management/UpdatePosition/{id}', [AdminPositionController::class, 'update'])->name('update.position');
        Route::get('management/DeletePosition/{id}', [AdminPositionController::class, 'destroy'])->name('delete.position');

        // Contact management   
        Route::post('contact', [AdminContactController::class, 'store'])->name('store.contact');
        Route::put('contact', [AdminContactController::class, 'update'])->name('update.contact');

        // Applications management   
        Route::get('ViewApplication/{id}', [AdminApplicationController::class, 'show'])->name('view.application');
        Route::get('management/DeleteApplication/{id}', [AdminApplicationController::class, 'destroy'])->name('delete.application');
        
        
    });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
