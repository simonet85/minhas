<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\ContactusController;
use App\Http\Controllers\DirectionController;
use App\Http\Controllers\HomeBannerController;
use App\Http\Controllers\LatestNewsController;
use App\Http\Controllers\HomeSectionController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\GeneralPolicyController;
use App\Http\Controllers\CalendarEventsController;
use App\Http\Controllers\ProfesionalDevController;
use App\Http\Controllers\MissionObjectifController;
use App\Http\Controllers\SupportServicesController;

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

// FRONT 
Route::get('/index',[FrontController::class, 'index'])->name('index');
Route::get('/',[FrontController::class, 'index'])->name('index');
Route::get('/about',[FrontController::class, 'about'])->name('about');
Route::get('/campagnes',[FrontController::class, 'campagnes'])->name('campagnes');
Route::get('/contact',[FrontController::class, 'contact'])->name('contact');
Route::get('/development',[FrontController::class, 'development'])->name('development');
Route::get('/direction',[FrontController::class, 'direction'])->name('direction');
Route::get('/events',[FrontController::class, 'events'])->name('events');
Route::get('/faq',[FrontController::class, 'faq'])->name('faq');
Route::get('/login',[FrontController::class, 'login'])->name('login');
Route::get('/members_info',[FrontController::class, 'members_info'])->name('members_info');
Route::get('/membership',[FrontController::class, 'membership'])->name('membership');
Route::get('/news',[FrontController::class, 'news'])->name('news');
Route::get('/policy',[FrontController::class, 'policy'])->name('policy');
Route::get('/support',[FrontController::class, 'support'])->name('support');


Route::get('/development/details/{id}',  [App\Http\Controllers\FrontController::class, 'readmore'])->name('readmore');
//AUTH

// Dashboard route 
Route::get('/dashboard/home', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard.home');
Route::post('/messages/send', [App\Http\Controllers\MessagesController::class, 'send'])->name('messages.send');
// Route::post('/messages/store', [App\Http\Controllers\MessagesController::class, 'store'])->name('messages.store');

// Message 
Route::resource('messages', MessagesController::class);



// Route::view('/messages-read', 'dashboard.users-unread-messages');
// Route::view('/messages-unread', 'dashboard.users-unread-messages');

// Admin and users can access these routes 
Route::middleware(['auth'])->group(function () {
    // Profile 
    Route::resource('manage/profile', ProfileController::class);
    //Message
    Route::post('/users/update-password', [App\Http\Controllers\ProfileController::class, 'updatePassword'])->name('users.updatePassword');
    // Users 
    Route::get('/users/search', [App\Http\Controllers\UserController::class, 'search'])->name('users.search');
    Route::get('/users/print', [App\Http\Controllers\UserController::class, 'print'])->name('users.print');
    //Notifications
    Route::resource('/users/notification', NotificationController::class);
    Route::post('/users/notification/{notification}',  [App\Http\Controllers\NotificationController::class, 'markAsRead'])->name('markAsRead');

    Route::get('users/unread-notifications', [App\Http\Controllers\NotificationController::class, 'unreadNotificatifications'])->name('unread.notifications');


    Route::get('/get-user-count', [App\Http\Controllers\HomeController::class, 'index'])->name('getusercount.index');
    Route::get('/monthly-users', [App\Http\Controllers\HomeController::class, 'getMonthlyUsers'])->name('monthlyusers');

    //Messages
    Route::get('/messages-unread', [App\Http\Controllers\MessagesController::class, 'showUnReadMessages'])->name('messages.unread');

    Route::get('/messages-read', [App\Http\Controllers\MessagesController::class, 'showReadMessages'])->name('messages.read');

    Route::put('/users/message/{message}',  [App\Http\Controllers\MessagesController::class, 'markMessageAsRead'])->name('markMessageAsRead');

});



// Protected Routes : admin-only
Auth::routes();
//Admin only routes
Route::middleware(["auth","role:admin"])->prefix("manage")->group(function(){
    Route::resource('homebanner', HomeBannerController::class);
    Route::resource('users', UserController::class);
    Route::resource('homesections', HomeSectionController::class);
    Route::resource('lastnews', LatestNewsController::class);
    Route::resource('calendarevents', CalendarEventsController::class);
    Route::resource('generalpolicy', GeneralPolicyController::class);
    Route::resource('profesionaldev', ProfesionalDevController::class);
    Route::resource('supportservices', SupportServicesController::class);
    Route::resource('faq', FaqController::class);
    Route::resource('contactus', ContactusController::class);
    Route::resource('missionobjectif', MissionObjectifController::class);
    Route::resource('directionmanagement', DirectionController::class);
    Route::get('/settings', [App\Http\Controllers\SettingsController::class, 'index'])->name('settings.index');
    Route::post('/settings', [App\Http\Controllers\SettingsController::class, 'store'])->name('settings.store');
    Route::put('/settings', [App\Http\Controllers\SettingsController::class, 'update'])->name('settings.update');

    // Route::post('/upload-csv', 'CsvController@uploadCsv')->name('uploadCsv');
    Route::post('/upload-csv', [App\Http\Controllers\UserController::class, 'uploadCsv'])->name('users.uploadCsv');

});



