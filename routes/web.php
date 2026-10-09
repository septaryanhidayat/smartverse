<?php

use App\Http\Controllers\Admin\AdminAnalyticsController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminDomainRenewalController;
use App\Http\Controllers\Admin\AdminFinanceController;
use App\Http\Controllers\Admin\AdminGalleryController;
use App\Http\Controllers\Admin\AdminInquiryController;
use App\Http\Controllers\Admin\AdminInvoiceController;
use App\Http\Controllers\Admin\AdminOrderGuideController;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdminProjectController;
use App\Http\Controllers\Admin\AdminTrainingController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\AdminCvController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CvPublicController;
use App\Http\Controllers\DigitalProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvoiceVerificationController;
use App\Http\Controllers\OrderGuidePublicController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TrainerController;
use Illuminate\Support\Facades\Route;

// Public Invoice Verification & Official Printable View (Anti-500, Client-Accessible)
Route::get('/invoices/{invoice_number}/print', [InvoiceVerificationController::class, 'print'])->where('invoice_number', '.*')->name('invoices.public-print');
Route::get('/invoices/{invoice_number}/verify', [InvoiceVerificationController::class, 'verify'])->where('invoice_number', '.*')->name('invoices.verify');
Route::get('/invoices/{invoice_number}/verif', [InvoiceVerificationController::class, 'verify'])->where('invoice_number', '.*');
Route::get('/invoices/{invoice_number}', [InvoiceVerificationController::class, 'verify'])->where('invoice_number', '.*');

// Public SOP & Panduan Pemesanan Website/Aplikasi (Client-Accessible, Shareable & Printable)
Route::get('/panduan-pemesanan', [OrderGuidePublicController::class, 'show'])->name('order-guide.show');
Route::get('/order-guide', [OrderGuidePublicController::class, 'show']);
Route::get('/sop-pemesanan', [OrderGuidePublicController::class, 'show']);

// Public Curriculum Vitae (CV) & Resume Eksekutif Septa Ryan Hidayat (Client-Shareable & Printable A4)
Route::get('/cv', [CvPublicController::class, 'show'])->name('cv.show');
Route::get('/resume', [CvPublicController::class, 'show'])->name('cv.resume');
Route::get('/cv/print', [CvPublicController::class, 'print'])->name('cv.print');
Route::get('/resume/print', [CvPublicController::class, 'print']);

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
    
    // Comprehensive Visitor Analytics & Reader Trends (Branding & Real-Time)
    Route::get('/analytics', [AdminAnalyticsController::class, 'index'])->name('analytics.index');
    Route::post('/analytics/clean-logs', [AdminAnalyticsController::class, 'cleanOldLogs'])->name('analytics.clean-logs');

    // Institutional Finance, Cash Flow & Policy Maker Analytics
    Route::get('/finances', [AdminFinanceController::class, 'index'])->name('finances.index');
    Route::post('/finances', [AdminFinanceController::class, 'store'])->name('finances.store');
    Route::put('/finances/{id}', [AdminFinanceController::class, 'update'])->name('finances.update');
    Route::delete('/finances/{id}', [AdminFinanceController::class, 'destroy'])->name('finances.destroy');
    Route::get('/finances/print', [AdminFinanceController::class, 'printReport'])->name('finances.print');

    // Multi-Provider Domain & Hosting Asset Tracking & Expiry Reminders
    Route::get('/domain-renewals', [AdminDomainRenewalController::class, 'index'])->name('domain-renewals.index');
    Route::post('/domain-renewals', [AdminDomainRenewalController::class, 'store'])->name('domain-renewals.store');
    Route::put('/domain-renewals/{id}', [AdminDomainRenewalController::class, 'update'])->name('domain-renewals.update');
    Route::delete('/domain-renewals/{id}', [AdminDomainRenewalController::class, 'destroy'])->name('domain-renewals.destroy');
    Route::post('/domain-renewals/{id}/renew-one-year', [AdminDomainRenewalController::class, 'renewOneYear'])->name('domain-renewals.renew-one-year');

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

    // SOP & Panduan Pemesanan Web/App (Shareable Document to Clients & Word-like Editor)
    Route::get('/panduan-pemesanan', [AdminOrderGuideController::class, 'index'])->name('order-guide.index');
    Route::post('/panduan-pemesanan', [AdminOrderGuideController::class, 'update'])->name('order-guide.update');
    Route::post('/panduan-pemesanan/reset', [AdminOrderGuideController::class, 'reset'])->name('order-guide.reset');

    // Curriculum Vitae (CV) & Portfolio Management (Editable, Flyer/PDF Uploads, One-Click Print)
    Route::get('/cv', [AdminCvController::class, 'index'])->name('cv.index');
    Route::put('/cv/profile', [AdminCvController::class, 'updateProfile'])->name('cv.profile.update');
    Route::post('/cv/activities', [AdminCvController::class, 'storeActivity'])->name('cv.activity.store');
    Route::put('/cv/activities/{activity}', [AdminCvController::class, 'updateActivity'])->name('cv.activity.update');
    Route::delete('/cv/activities/{activity}', [AdminCvController::class, 'destroyActivity'])->name('cv.activity.destroy');
    Route::post('/cv/reset', [AdminCvController::class, 'resetDefault'])->name('cv.reset');

    // Profile & Account Settings
    Route::get('/profile', [AdminProfileController::class, 'index'])->name('profile.index');
    Route::put('/profile', [AdminProfileController::class, 'update'])->name('profile.update');

    // Users & Administrator Management
    Route::resource('users', AdminUserController::class)->only(['index', 'store', 'update', 'destroy']);
});
