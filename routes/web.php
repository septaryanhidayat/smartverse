<?php

use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminGalleryController;
use App\Http\Controllers\Admin\AdminInquiryController;
use App\Http\Controllers\Admin\AdminInvoiceController;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdminProjectController;
use App\Http\Controllers\Admin\AdminTrainingController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DigitalProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvoiceVerificationController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TrainerController;
use Illuminate\Support\Facades\Route;

// Public Invoice Verification & Official Printable View (Anti-500, Client-Accessible)
Route::get('/invoices/{invoice_number}/print', [InvoiceVerificationController::class, 'print'])->where('invoice_number', '.*')->name('invoices.public-print');
Route::get('/invoices/{invoice_number}/verify', [InvoiceVerificationController::class, 'verify'])->where('invoice_number', '.*')->name('invoices.verify');
Route::get('/invoices/{invoice_number}/verif', [InvoiceVerificationController::class, 'verify'])->where('invoice_number', '.*');
Route::get('/invoices/{invoice_number}', [InvoiceVerificationController::class, 'verify'])->where('invoice_number', '.*');

// Standard Authentication Fallback
Route::get('/login', fn() => redirect()->route('admin.login'))->name('login');

// Public Front-Facing Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/services', [HomeController::class, 'services'])->name('services');

// Digital Portfolio & Case Studies
Route::get('/portfolio', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/portfolio/{slug}', [ProjectController::class, 'show'])->name('projects.show');

// Digital Products & SaaS Showcase
Route::get('/products', [DigitalProductController::class, 'index'])->name('products.index');
Route::get('/products/{slug}', [DigitalProductController::class, 'show'])->name('products.show');

// Trainer, Keynote Speaker & Workshop Galleries
Route::get('/trainer', [TrainerController::class, 'index'])->name('trainer.index');

// Blog & Tech Insights
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

// Contact & Project Calculator (Protected by Rate Limiter)
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->middleware('throttle:6,1')->name('contact.store');

// SEO XML Sitemap
Route::get('/sitemap.xml', function () {
    $projects = \App\Models\Project::where('is_featured', true)->orWhere('status', 'published')->get();
    $products = \App\Models\DigitalProduct::all();
    $trainings = \App\Models\Training::all();
    $posts = \App\Models\Post::where('status', 'published')->get();

    $content = view('public.sitemap', compact('projects', 'products', 'trainings', 'posts'));
    return response($content, 200)->header('Content-Type', 'text/xml');
})->name('sitemap');

// Admin Authentication Routes
Route::get('/admin/login', [AuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'login'])->middleware('throttle:5,1')->name('admin.login.submit');
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

// Protected Admin Dashboard & Management Routes
Route::prefix('admin')->name('admin.')->middleware(['auth', 'throttle:60,1'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    
    // Website Settings & Theme Customizer (Color Picker, Hero, Bio, Contact)
    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('/settings', [SettingController::class, 'update'])->name('settings.update');

    // Portfolio & Projects CRUD
    Route::resource('projects', AdminProjectController::class)->except(['show']);

    // Digital Products & SaaS Showcase CRUD
    Route::resource('products', AdminProductController::class)->except(['show']);

    // IT Syllabus & Training Modules CRUD
    Route::resource('trainings', AdminTrainingController::class)->except(['show']);

    // Event & Workshop Galleries CRUD
    Route::resource('galleries', AdminGalleryController::class)->except(['show']);

    // Blog & Insights CRUD
    Route::resource('posts', AdminPostController::class)->except(['show']);

    // Categories CRUD
    Route::resource('categories', AdminCategoryController::class)->only(['index', 'store', 'update', 'destroy']);

    // Contact Inquiries / Messages
    Route::get('/inquiries', [AdminInquiryController::class, 'index'])->name('inquiries.index');
    Route::get('/inquiries/{inquiry}', [AdminInquiryController::class, 'show'])->name('inquiries.show');
    Route::delete('/inquiries/{inquiry}', [AdminInquiryController::class, 'destroy'])->name('inquiries.destroy');

    // Invoices & Billing Management + Print Feature (Accessible without auth to allow client PDF preview)
    Route::get('/invoices/{invoice}/print', [AdminInvoiceController::class, 'print'])->withoutMiddleware(['auth'])->name('invoices.print');
    Route::post('/invoices/{invoice}/send-email', [AdminInvoiceController::class, 'sendEmail'])->name('invoices.send-email');
    Route::resource('invoices', AdminInvoiceController::class);

    // Profile & Account Settings
    Route::get('/profile', [AdminProfileController::class, 'index'])->name('profile.index');
    Route::put('/profile', [AdminProfileController::class, 'update'])->name('profile.update');

    // Users & Administrator Management
    Route::resource('users', AdminUserController::class)->only(['index', 'store', 'update', 'destroy']);
});
