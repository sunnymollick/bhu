<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\Location\DivisionController;
use App\Http\Controllers\Backend\Location\DistrictController;
use App\Http\Controllers\Backend\Location\UpazilaController;
use App\Http\Controllers\Backend\TempleController;
use App\Http\Controllers\Backend\NewsController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\MyCareerController;
use App\Http\Controllers\Backend\OrganizationController;
use App\Http\Controllers\Backend\OrganizationEventController;
use App\Http\Controllers\Backend\PageController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Backend\JobPostController;
use App\Http\Controllers\Backend\ServiceController;
use App\Http\Controllers\Backend\HomeContentController;
use App\Http\Controllers\Backend\AboutController;

# Website
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\FrontendTempleController;


Route::get('/', [HomeController::class, 'index'])->name('frontend.index');
Route::get('/about', [HomeController::class, 'about'])->name('frontend.about');
Route::get('/teams', [HomeController::class, 'teams'])->name('frontend.teams');
Route::post('/teams/volunteer-register', [HomeController::class, 'volunteerRegister'])->name('volunteer.register');
// Temple Routes Getting Started
Route::get('/temples', [FrontendTempleController::class, 'temples'])->name('frontend.temples');
Route::get('/temples/filter', [FrontendTempleController::class, 'filterTemples'])->name('frontend.temples.filter');
Route::get('/api/temples/search', [FrontendTempleController::class, 'searchTemples'])->name('api.temples.search');
Route::get('/temples/{id}', [FrontendTempleController::class, 'templeDetails'])->name('frontend.temples.details');
// Temple Routes End
// Organization Routes Getting Started
Route::get('/organizations',[FrontendTempleController::class, 'organizations'])->name('frontend.organizations');
Route::get('/organizations/filter', [FrontendTempleController::class, 'filterOrganizations'])->name('frontend.organizations.filter');
Route::get('/api/organizations/search', [FrontendTempleController::class, 'searchOrganizations'])->name('api.organizations.search');
Route::get('/organizations/{id}',[FrontendTempleController::class, 'organizationDetails'])->name('frontend.organizations.details');
// Organization Routes End
// Unified Events Routes (New - consolidates temple and organization events)
Route::get('/events', [FrontendTempleController::class, 'allEvents'])->name('frontend.events');
Route::get('/event/{type}/{id}', [FrontendTempleController::class, 'eventDetailsUnified'])->name('frontend.event.details.unified');
// Unified Events Routes End
// Job Routes Getting Started
Route::get('/jobs',[FrontendTempleController::class, 'jobs'])->name('frontend.jobs');
Route::get('/jobs/filter', [FrontendTempleController::class, 'filterJobs'])->name('frontend.jobs.filter');
Route::get('/api/jobs/search', [FrontendTempleController::class, 'searchJobs'])->name('api.jobs.search');
Route::get('/jobs/{id}',[FrontendTempleController::class, 'jobDetails'])->name('frontend.jobs.details');
// Job Routes End

// Contact Page Routes
Route::get('/contact', [App\Http\Controllers\Frontend\ContactController::class, 'index'])->name('frontend.contact');
Route::post('/contact/submit', [App\Http\Controllers\Frontend\ContactController::class, 'store'])->name('frontend.contact.submit');
// Contact Routes End

// News Routes
Route::get('/news', [App\Http\Controllers\Frontend\NewsController::class, 'index'])->name('frontend.news');
Route::get('/api/news/search', [App\Http\Controllers\Frontend\NewsController::class, 'searchNews'])->name('api.news.search');
Route::get('/news/{id}', [App\Http\Controllers\Frontend\NewsController::class, 'show'])->name('frontend.news.details');
// News Routes End

// Authentication Routes
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register-store', [AuthController::class, 'registerStore'])->name('auth.register.store');
Route::post('/login-store', [AuthController::class, 'loginStore'])->name('auth.login.store');
Route::get('/verify-email', [AuthController::class, 'verifyEmail'])->name('verify.email');
Route::get('/verification-notice', [AuthController::class, 'verificationNotice'])->name('verification.notice');
Route::get('/reference-verify', [AuthController::class, 'verifyReference'])->name('reference.verify');
Route::get('/reference-reject', [AuthController::class, 'rejectReference'])->name('reference.reject');

// API Routes for Cascading Dropdowns
Route::get('/api/get-districts/{divisionId}', [AuthController::class, 'getDistricts'])->name('api.get.districts');
Route::get('/api/get-upazilas/{districtId}', [AuthController::class, 'getUpazilas'])->name('api.get.upazilas');

// Password Reset Routes
Route::get('/forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/reset-password/{token}', [AuthController::class, 'showResetPasswordForm'])->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');

// Admin specific routes
Route::get('admin/login', [AuthController::class, 'adminLogin'])->name('admin.login');
// Route::get('/admin', function () {
//     return view('backend.layouts.default');
// });
Route::post('admin/logout', [AuthController::class, 'logout'])->name('admin.logout');
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'home'])->name('admin.dashboard');

    // Admin profile (current authenticated user)
    Route::get('profile', [UserController::class, 'profile'])->name('admin.user.profile');
    Route::get('profile/edit', [UserController::class, 'editProfile'])->name('admin.user.profile.edit');
    Route::post('profile/update', [UserController::class, 'updateProfile'])->name('admin.user.profile.update');
    Route::get('profile/change-password', [UserController::class, 'changePassword'])->name('admin.user.change.password');
    Route::post('profile/update-password', [UserController::class, 'updatePassword'])->name('admin.user.update.password');
    Route::post('profile/toggle-student-status', [UserController::class, 'toggleStudentStatus'])->name('admin.user.toggle.student');

    // My Career (for students only)
    Route::get('my-career', [UserController::class, 'myCareer'])->name('admin.user.my.career');
    Route::post('my-career/update-objective', [MyCareerController::class, 'updateObjective'])->name('admin.career.update.objective');
    Route::post('my-career/education/add', [MyCareerController::class, 'addEducation'])->name('admin.career.education.add');
    Route::post('my-career/education/update', [MyCareerController::class, 'updateEducation'])->name('admin.career.education.update');
    Route::post('my-career/education/delete', [MyCareerController::class, 'deleteEducation'])->name('admin.career.education.delete');
    Route::post('my-career/experience/add', [MyCareerController::class, 'addWorkExperience'])->name('admin.career.experience.add');
    Route::post('my-career/experience/update', [MyCareerController::class, 'updateWorkExperience'])->name('admin.career.experience.update');
    Route::post('my-career/experience/delete', [MyCareerController::class, 'deleteWorkExperience'])->name('admin.career.experience.delete');
    Route::post('my-career/skill/add', [MyCareerController::class, 'addSkill'])->name('admin.career.skill.add');
    Route::post('my-career/skill/update', [MyCareerController::class, 'updateSkill'])->name('admin.career.skill.update');
    Route::post('my-career/skill/delete', [MyCareerController::class, 'deleteSkill'])->name('admin.career.skill.delete');
    Route::post('my-career/project/add', [MyCareerController::class, 'addProject'])->name('admin.career.project.add');
    Route::post('my-career/project/update', [MyCareerController::class, 'updateProject'])->name('admin.career.project.update');
    Route::post('my-career/project/delete', [MyCareerController::class, 'deleteProject'])->name('admin.career.project.delete');
    Route::post('my-career/certification/add', [MyCareerController::class, 'addCertification'])->name('admin.career.certification.add');
    Route::post('my-career/certification/update', [MyCareerController::class, 'updateCertification'])->name('admin.career.certification.update');
    Route::post('my-career/certification/delete', [MyCareerController::class, 'deleteCertification'])->name('admin.career.certification.delete');
    Route::post('my-career/language/add', [MyCareerController::class, 'addLanguage'])->name('admin.career.language.add');
    Route::post('my-career/language/update', [MyCareerController::class, 'updateLanguage'])->name('admin.career.language.update');
    Route::post('my-career/language/delete', [MyCareerController::class, 'deleteLanguage'])->name('admin.career.language.delete');
    Route::post('my-career/link/add', [MyCareerController::class, 'addProfessionalLink'])->name('admin.career.link.add');
    Route::post('my-career/link/update', [MyCareerController::class, 'updateProfessionalLink'])->name('admin.career.link.update');
    Route::post('my-career/link/delete', [MyCareerController::class, 'deleteProfessionalLink'])->name('admin.career.link.delete');

    // Admin-only routes - Location Management, Organization Events, Pages/Banners
    Route::middleware(\App\Http\Middleware\CheckAdminRole::class)->group(function () {
        // Division routes
        Route::get('division/all', [DivisionController::class, 'all'])->name('admin.division.all');
        Route::get('division/add', [DivisionController::class, 'add'])->name('admin.division.add');
        Route::get('division/edit/{id}', [DivisionController::class, 'edit'])->name('admin.division.edit');
        Route::put('division/update/{id}', [DivisionController::class, 'update'])->name('admin.division.update');

        // District routes
        Route::get('district/all', [DistrictController::class, 'all'])->name('admin.district.all');
        Route::get('district/add', [DistrictController::class, 'add'])->name('admin.district.add');
        Route::get('district/edit/{id}', [DistrictController::class, 'edit'])->name('admin.district.edit');
        Route::put('district/update/{id}', [DistrictController::class, 'update'])->name('admin.district.update');

        // Upazila routes
        Route::get('upazila/all', [UpazilaController::class, 'all'])->name('admin.upazila.all');
        Route::get('upazila/add', [UpazilaController::class, 'add'])->name('admin.upazila.add');
        Route::get('upazila/edit/{id}', [UpazilaController::class, 'edit'])->name('admin.upazila.edit');
        Route::put('upazila/update/{id}', [UpazilaController::class, 'update'])->name('admin.upazila.update');
    });

    // Helper routes for dropdowns (accessible to all authenticated users)
    Route::get('get-districts/{division_id}', [DistrictController::class, 'getDistricts']);
    Route::get('get-upazilas/{district_id}', [UpazilaController::class, 'getUpazilas']);

    Route::get('temple/all', [TempleController::class, 'all'])->name('admin.temple.all');
    Route::get('temple/add', [TempleController::class, 'create'])->name('admin.temple.add');
    Route::get('temple/import-excel', [TempleController::class, 'importExcel'])->name('admin.temple.import_excel');
    Route::post('temple/store', [TempleController::class, 'store'])->name('admin.temple.store');
    Route::post('temple/import-temples', [TempleController::class, 'import'])->name('import.temples');
    Route::get('temple/edit/{id}', [TempleController::class, 'edit'])->name('admin.temple.edit');
    Route::put('temple/update/{id}', [TempleController::class, 'update'])->name('admin.temple.update');
    Route::post('temple/approve/{id}', [TempleController::class, 'approve'])->name('admin.temple.approve');
    Route::post('temple/toggle/{id}', [TempleController::class, 'toggleStatus'])->name('admin.temple.toggle');
    Route::delete('admin/temple/{id}', [TempleController::class, 'destroy'])->name('admin.temple.destroy');

    Route::get('news/all', [NewsController::class, 'all'])->name('admin.news.all');
    Route::get('news/add', [NewsController::class, 'create'])->name('admin.news.add');
    Route::post('news/store', [NewsController::class, 'store'])->name('admin.news.store');
    Route::get('news/edit/{id}', [NewsController::class, 'edit'])->name('admin.news.edit');
    Route::post('news/update/{id}', [NewsController::class, 'update'])->name('admin.news.update');
    Route::post('news/approve/{id}', [NewsController::class, 'approve'])->name('admin.news.approve');
    Route::delete('news/delete/{id}', [NewsController::class, 'destroy'])->name('admin.news.delete');

    // User Management routes - Only Admin and Super Admin
    Route::middleware(\App\Http\Middleware\CheckAdminRole::class)->group(function () {
        Route::get('user/all', [UserController::class, 'all'])->name('admin.user.all');
        Route::get('user/add', [UserController::class, 'create'])->name('admin.user.add');
        Route::post('user/store', [UserController::class, 'store'])->name('admin.user.store');
        Route::post('user/verify/{id}', [UserController::class, 'verify'])->name('admin.user.verify');
        Route::post('user/approve/{id}', [UserController::class, 'approve'])->name('admin.user.approve');
        Route::post('user/toggle-active/{id}', [UserController::class, 'toggleActive'])->name('admin.user.toggleActive');
        Route::delete('user/{id}', [UserController::class, 'destroy'])->name('admin.user.destroy');
        Route::get('user/{id}/send-verification-reminder', [UserController::class, 'showVerificationReminderForm'])->name('admin.user.show-verification-reminder');
        Route::post('user/{id}/send-verification-reminder', [UserController::class, 'sendVerificationReminder'])->name('admin.user.send-verification-reminder');

        // Contact Management routes - Only Admin and Super Admin
        Route::get('contact/all', [\App\Http\Controllers\Backend\ContactController::class, 'index'])->name('admin.contact.index');
        Route::get('contact/{id}', [\App\Http\Controllers\Backend\ContactController::class, 'show'])->name('admin.contact.show');
        Route::post('contact/{id}/reply', [\App\Http\Controllers\Backend\ContactController::class, 'reply'])->name('admin.contact.reply');
        Route::post('contact/{id}/status', [\App\Http\Controllers\Backend\ContactController::class, 'updateStatus'])->name('admin.contact.updateStatus');
        Route::delete('contact/{id}', [\App\Http\Controllers\Backend\ContactController::class, 'destroy'])->name('admin.contact.destroy');
    });

    // Organization routes
    Route::get('organization/all', [OrganizationController::class, 'all'])->name('admin.organization.all');
    Route::get('organization/create', [OrganizationController::class, 'create'])->name('admin.organization.create');
    Route::post('organization/store', [OrganizationController::class, 'store'])->name('admin.organization.store');
    Route::get('organization/edit/{id}', [OrganizationController::class, 'edit'])->name('admin.organization.edit');
    Route::put('organization/update/{id}', [OrganizationController::class, 'update'])->name('admin.organization.update');
    Route::delete('organization/{id}', [OrganizationController::class, 'destroy'])->name('admin.organization.destroy');
    Route::post('organization/approve/{id}', [OrganizationController::class, 'approve'])->name('admin.organization.approve');

    // Organization Event routes - Accessible to all users
    Route::get('organization-event/all', [OrganizationEventController::class, 'all'])->name('admin.organization_event.all');
    Route::get('organization-event/create', [OrganizationEventController::class, 'create'])->name('admin.organization_event.create');
    Route::post('organization-event/store', [OrganizationEventController::class, 'store'])->name('admin.organization_event.store');
    Route::get('organization-event/edit/{id}', [OrganizationEventController::class, 'edit'])->name('admin.organization_event.edit');
    Route::put('organization-event/update/{id}', [OrganizationEventController::class, 'update'])->name('admin.organization_event.update');
    Route::post('organization-event/toggle/{id}', [OrganizationEventController::class, 'toggleStatus'])->name('admin.organization_event.toggle');
    Route::delete('organization-event/{id}', [OrganizationEventController::class, 'destroy'])->name('admin.organization_event.destroy');
    Route::delete('organization-event/gallery/{id}', [OrganizationEventController::class, 'deleteGalleryImage'])->name('admin.organization_event.gallery.delete');

    // Temple Event routes - Accessible to all users
    Route::get('temple-event/all', [App\Http\Controllers\Backend\TempleEventController::class, 'all'])->name('admin.temple_event.all');
    Route::get('temple-event/create', [App\Http\Controllers\Backend\TempleEventController::class, 'create'])->name('admin.temple_event.create');
    Route::post('temple-event/store', [App\Http\Controllers\Backend\TempleEventController::class, 'store'])->name('admin.temple_event.store');
    Route::get('temple-event/edit/{id}', [App\Http\Controllers\Backend\TempleEventController::class, 'edit'])->name('admin.temple_event.edit');
    Route::put('temple-event/update/{id}', [App\Http\Controllers\Backend\TempleEventController::class, 'update'])->name('admin.temple_event.update');
    Route::post('temple-event/toggle/{id}', [App\Http\Controllers\Backend\TempleEventController::class, 'toggleStatus'])->name('admin.temple_event.toggle');
    Route::delete('temple-event/{id}', [App\Http\Controllers\Backend\TempleEventController::class, 'destroy'])->name('admin.temple_event.destroy');
    Route::delete('temple-event/gallery/{id}', [App\Http\Controllers\Backend\TempleEventController::class, 'deleteGalleryImage'])->name('admin.temple_event.gallery.delete');

    // Page, Banner, Post routes - Admin only
    Route::middleware(\App\Http\Middleware\CheckAdminRole::class)->group(function () {
        // Page routes
        Route::get('page/all', [PageController::class, 'all'])->name('admin.page.all');
        Route::get('page/create', [PageController::class, 'create'])->name('admin.page.create');
        Route::post('page/store', [PageController::class, 'store'])->name('admin.page.store');
        Route::get('page/edit/{id}', [PageController::class, 'edit'])->name('admin.page.edit');
        Route::put('page/update/{id}', [PageController::class, 'update'])->name('admin.page.update');

        // Banner routes
        Route::get('banner/all', [BannerController::class, 'all'])->name('admin.banner.all');
        Route::get('banner/create', [BannerController::class, 'create'])->name('admin.banner.create');
        Route::post('banner/store', [BannerController::class, 'store'])->name('admin.banner.store');
        Route::get('banner/edit/{id}', [BannerController::class, 'edit'])->name('admin.banner.edit');
        Route::put('banner/update/{id}', [BannerController::class, 'update'])->name('admin.banner.update');
        Route::delete('banner/{id}', [BannerController::class, 'destroy'])->name('admin.banner.destroy');

        // Post routes
        Route::get('post/all', [PostController::class, 'all'])->name('admin.post.all');
        Route::get('post/create', [PostController::class, 'create'])->name('admin.post.create');
        Route::post('post/store', [PostController::class, 'store'])->name('admin.post.store');
        Route::get('post/edit/{id}', [PostController::class, 'edit'])->name('admin.post.edit');
        Route::put('post/update/{id}', [PostController::class, 'update'])->name('admin.post.update');
        Route::delete('post/{id}', [PostController::class, 'destroy'])->name('admin.post.destroy');

        // Service routes (Homepage "How We Can Help" section)
        Route::get('services', [ServiceController::class, 'index'])->name('admin.services.index');
        Route::get('services/create', [ServiceController::class, 'create'])->name('admin.services.create');
        Route::post('services/store', [ServiceController::class, 'store'])->name('admin.services.store');
        Route::get('services/edit/{id}', [ServiceController::class, 'edit'])->name('admin.services.edit');
        Route::put('services/update/{id}', [ServiceController::class, 'update'])->name('admin.services.update');
        Route::delete('services/{id}', [ServiceController::class, 'destroy'])->name('admin.services.destroy');
        Route::post('services/toggle-status/{id}', [ServiceController::class, 'toggleStatus'])->name('admin.services.toggle-status');

        // About routes
        Route::get('about', [AboutController::class, 'index'])->name('admin.about.index');
        Route::get('about/create', [AboutController::class, 'create'])->name('admin.about.create');
        Route::post('about/store', [AboutController::class, 'store'])->name('admin.about.store');
        Route::get('about/edit/{id}', [AboutController::class, 'edit'])->name('admin.about.edit');
        Route::put('about/update/{id}', [AboutController::class, 'update'])->name('admin.about.update');
        Route::delete('about/{id}', [AboutController::class, 'destroy'])->name('admin.about.destroy');
        Route::post('about/toggle-status/{id}', [AboutController::class, 'toggleStatus'])->name('admin.about.toggle-status');

    });

    // job post routes - Accessible to all users
    Route::get('job-post/all', [JobPostController::class, 'all'])->name('admin.job_post.all');
    Route::get('job-post/create', [JobPostController::class, 'create'])->name('admin.job_post.create');
    Route::post('job-post/store', [JobPostController::class, 'store'])->name('admin.job_post.store');
    Route::get('job-post/edit/{id}', [JobPostController::class, 'edit'])->name('admin.job_post.edit');
    Route::put('job-post/update/{id}', [JobPostController::class, 'update'])->name('admin.job_post.update');
    Route::post('job-post/approve/{id}', [JobPostController::class, 'approve'])->name('admin.job_post.approve');
    Route::delete('job-post/destroy/{id}', [JobPostController::class, 'destroy'])->name('admin.job_post.destroy');

});


