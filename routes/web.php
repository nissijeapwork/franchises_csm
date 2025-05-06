<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FranchiseController;
use App\Http\Controllers\FinancialController;
use App\Http\Controllers\PerformanceMetricController;
use App\Http\Controllers\FranchiseeProfileController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\TrainingSupportController;
use App\Http\Controllers\DeveloperContactController;
use App\Http\Controllers\OperationController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    # FRANCHISES
    Route::get('franchises', [FranchiseController::class, 'index'])->name('franchises.index');
    Route::get('franchise-create', [FranchiseController::class, 'create'])->name('franchises.create');
    Route::post('franchises', [FranchiseController::class, 'store'])->name('franchises.store');
    Route::get('franchise-edit-{id}', [FranchiseController::class, 'edit'])->name('franchises.edit');
    Route::put('franchise-{id}', [FranchiseController::class, 'update'])->name('franchises.update');
    Route::delete('franchise-{id}', [FranchiseController::class, 'destroy'])->name('franchises.destroy');
    Route::post('franchise-upload', [FranchiseController::class, 'upload'])->name('franchises.upload');

    # FINANCIALS
    Route::get('financials', [FinancialController::class, 'index'])->name('financials.index');
    Route::get('financial-create', [FinancialController::class, 'create'])->name('financials.create');
    Route::post('financials', [FinancialController::class, 'store'])->name('financials.store');
    Route::get('financial-edit-{id}', [FinancialController::class, 'edit'])->name('financials.edit');
    Route::put('financial-{id}', [FinancialController::class, 'update'])->name('financials.update');
    Route::delete('financial-{id}', [FinancialController::class, 'destroy'])->name('financials.destroy');

    # PERFORMANCE METRICS
    Route::get('metrics', [PerformanceMetricController::class, 'index'])->name('metrics.index');
    Route::get('metric-create', [PerformanceMetricController::class, 'create'])->name('metrics.create');
    Route::post('metrics', [PerformanceMetricController::class, 'store'])->name('metrics.store');
    Route::get('metric-edit-{id}', [PerformanceMetricController::class, 'edit'])->name('metrics.edit');
    Route::put('metric-{id}', [PerformanceMetricController::class, 'update'])->name('metrics.update');
    Route::delete('metric-{id}', [PerformanceMetricController::class, 'destroy'])->name('metrics.destroy');

    # FRANCHISEE PROFILES
    Route::get('franchisee-profiles', [FranchiseeProfileController::class, 'index'])->name('franchisee_profiles.index');
    Route::get('franchisee-profile-create', [FranchiseeProfileController::class, 'create'])->name('franchisee_profiles.create');
    Route::post('franchisee-profiles', [FranchiseeProfileController::class, 'store'])->name('franchisee_profiles.store');
    Route::get('franchisee-profile-edit-{id}', [FranchiseeProfileController::class, 'edit'])->name('franchisee_profiles.edit');
    Route::put('franchisee-profile-{id}', [FranchiseeProfileController::class, 'update'])->name('franchisee_profiles.update');
    Route::delete('franchisee-profile-{id}', [FranchiseeProfileController::class, 'destroy'])->name('franchisee_profiles.destroy');

    # TESTIMONIALS
    Route::get('testimonials', [TestimonialController::class, 'index'])->name('testimonials.index');
    Route::get('testimonial-create', [TestimonialController::class, 'create'])->name('testimonials.create');
    Route::post('testimonials', [TestimonialController::class, 'store'])->name('testimonials.store');
    Route::get('testimonial-edit-{id}', [TestimonialController::class, 'edit'])->name('testimonials.edit');
    Route::put('testimonial-{id}', [TestimonialController::class, 'update'])->name('testimonials.update');
    Route::delete('testimonial-{id}', [TestimonialController::class, 'destroy'])->name('testimonials.destroy');

    # RESOURCES
    Route::get('resources', [ResourceController::class, 'index'])->name('resources.index');
    Route::get('resource-create', [ResourceController::class, 'create'])->name('resources.create');
    Route::post('resources', [ResourceController::class, 'store'])->name('resources.store');
    Route::get('resource-edit-{id}', [ResourceController::class, 'edit'])->name('resources.edit');
    Route::put('resource-{id}', [ResourceController::class, 'update'])->name('resources.update');
    Route::delete('resource-{id}', [ResourceController::class, 'destroy'])->name('resources.destroy');

    # TRAINING SUPPORT
    Route::get('training-support', [TrainingSupportController::class, 'index'])->name('training_support.index');
    Route::get('training-support-create', [TrainingSupportController::class, 'create'])->name('training_support.create');
    Route::post('training-support', [TrainingSupportController::class, 'store'])->name('training_support.store');
    Route::get('training-support-edit-{id}', [TrainingSupportController::class, 'edit'])->name('training_support.edit');
    Route::put('training-support-{id}', [TrainingSupportController::class, 'update'])->name('training_support.update');
    Route::delete('training-support-{id}', [TrainingSupportController::class, 'destroy'])->name('training_support.destroy');

    # DEVELOPER CONTACTS
    Route::get('developer-contacts', [DeveloperContactController::class, 'index'])->name('developers.index');
    Route::get('developer-contacts-create', [DeveloperContactController::class, 'create'])->name('developers.create');
    Route::post('developer-contacts', [DeveloperContactController::class, 'store'])->name('developers.store');
    Route::get('developer-contacts-edit-{id}', [DeveloperContactController::class, 'edit'])->name('developers.edit');
    Route::put('developer-contacts-{id}', [DeveloperContactController::class, 'update'])->name('developers.update');
    Route::delete('developer-contacts-{id}', [DeveloperContactController::class, 'destroy'])->name('developers.destroy');

    # OPERATIONS
    Route::get('operations', [OperationController::class, 'index'])->name('operations.index');
    Route::get('operations-create', [OperationController::class, 'create'])->name('operations.create');
    Route::post('operations', [OperationController::class, 'store'])->name('operations.store');
    Route::get('operations-edit-{id}', [OperationController::class, 'edit'])->name('operations.edit');
    Route::put('operations-{id}', [OperationController::class, 'update'])->name('operations.update');
    Route::delete('operations-{id}', [OperationController::class, 'destroy'])->name('operations.destroy');


});
