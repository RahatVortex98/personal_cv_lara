<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $hero = \App\Models\Hero::first(); // or latest() if you allow multiple
    $about = \App\Models\About::first();
    $qualifications = \App\Models\Qualification::orderBy('start_date', 'desc')->get();
    $projects = \App\Models\Project::latest()->get();

    return view('home', compact('hero', 'about', 'qualifications', 'projects'));
})->name('home');
Route::post('/contact/send', [ContactController::class, 'store'])->name('contact.send');
// Admin 
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.admin_dashboard');
    })->name('admin.dashboard');
    Route::get('/admin/hero-view',[AdminController::class,'hero'])->name('admin.hero');
    Route::get('/admin/hero-add', [AdminController::class, 'heroAdd'])->name('admin.hero.create');
    Route::post('/admin/hero-store', [AdminController::class, 'heroStore'])->name('admin.hero.store');

    Route::get('/admin/hero/{id}/edit', [AdminController::class, 'heroEdit'])->name('admin.hero.edit');
    Route::put('/admin/hero/{id}', [AdminController::class, 'heroUpdate'])->name('admin.hero.update');
    Route::delete('/admin/hero/{id}', [AdminController::class, 'heroDestroy'])->name('admin.hero.destroy');
    
    //About
    Route::get('/admin/about', [AdminController::class, 'aboutView'])->name('admin.about.view');

    Route::get('/admin/about/create',[AdminController::class,'aboutCreate'])->name('admin.about.create');
    Route::post('/admin/about/store',[AdminController::class,'aboutStore'])->name('admin.about.store');
    
    Route::get('/admin/about/{id}/edit', [AdminController::class, 'aboutEdit'])->name('admin.about.edit');
    Route::put('/admin/about/{id}/update', [AdminController::class, 'aboutUpdate'])->name('admin.about.update');
    Route::delete('/admin/about/{id}/delete', [AdminController::class, 'aboutDelete'])->name('admin.about.delete');
    
    // Qualifications CRUD
    Route::get('/admin/qualification', [AdminController::class, 'qualificationView'])->name('admin.qualification.view');
    Route::get('/admin/qualification/create', [AdminController::class, 'qualificationCreate'])->name('admin.qualification.create');
    Route::post('/admin/qualification/store', [AdminController::class, 'qualificationStore'])->name('admin.qualification.store');
    Route::get('/admin/qualification/{id}/edit', [AdminController::class, 'qualificationEdit'])->name('admin.qualification.edit');
    Route::put('/admin/qualification/{id}/update', [AdminController::class, 'qualificationUpdate'])->name('admin.qualification.update');
    Route::delete('/admin/qualification/{id}/delete', [AdminController::class, 'qualificationDelete'])->name('admin.qualification.delete');
    
    // Projects CRUD
    Route::get('/admin/project', [AdminController::class, 'projectView'])->name('admin.project.view');
    Route::get('/admin/project/create', [AdminController::class, 'projectCreate'])->name('admin.project.create');
    Route::post('/admin/project/store', [AdminController::class, 'projectStore'])->name('admin.project.store');
    Route::get('/admin/project/{id}/edit', [AdminController::class, 'projectEdit'])->name('admin.project.edit');
    Route::put('/admin/project/{id}/update', [AdminController::class, 'projectUpdate'])->name('admin.project.update');
    Route::delete('/admin/project/{id}/delete', [AdminController::class, 'projectDelete'])->name('admin.project.delete');

    Route::get('/messages', [AdminController::class, 'messagesView'])->name('admin.messages.view');
    Route::delete('/messages/{id}', [AdminController::class, 'messageDelete'])->name('admin.message.delete');

    });











Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
