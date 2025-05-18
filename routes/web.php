<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\HealthRecordController;
use App\Http\Controllers\SupplyController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\NotificationController;

Route::get('/', function () {
    return view('frontend.home');
});
Route::get('/about_us', function () {
    return view('frontend.about_us');
});
Route::get('/contact_us', function () {
    return view('frontend.contact_us');
});
Route::get('/shop_now', function () {
    return view('frontend.shop_now');
});

Route::get('/shopnow', function () {
    return view('shop_now.index');
})->name('shopnow');


Route::get('/communityfront', [CommunityController::class, 'front'])->name('community.front');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/home', [HomeController::class,'index']);
Route::delete('/user/{id}', [HomeController::class, 'user_delete'])->name('user.destroy');

Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
Route::delete('/notifications/{id}', [NotificationController::class, 'destroy'])->name('notifications.destroy');
// Add this route to check and create health record notifications
Route::get('/check-health-record-notifications', [NotificationController::class, 'checkHealthRecordNotifications']);

//pet route
Route::get('/pets',[PetController::class,'index'])->name('pets');
Route::get('/pet/add',[PetController::class,'create'])->name('pet.create');
Route::post('/pet/store', [PetController::class, 'store'])->name('pet.store');
Route::get('/pet/{id}/edit', [PetController::class, 'edit'])->name('pet.edit');
Route::put('/pet/{id}/update', [PetController::class, 'update'])->name('pet.update');
Route::delete('/pet/{id}', [PetController::class, 'destroy'])->name('pet.destroy');



Route::get('/schedules', [ScheduleController::class, 'index'])->name('schedule.index');
Route::get('/schedules/create', [ScheduleController::class, 'create'])->name('schedule.create');
Route::post('/schedules', [ScheduleController::class, 'store'])->name('schedule.store');
Route::get('/schedules/{id}/edit', [ScheduleController::class, 'edit'])->name('schedule.edit');
Route::put('/schedules/{id}', [ScheduleController::class, 'update'])->name('schedule.update');
Route::delete('/schedules/{id}', [ScheduleController::class, 'destroy'])->name('schedule.destroy');

Route::post('/schedule/{id}/complete', [ScheduleController::class, 'complete'])->name('schedule.complete');


Route::get('/health-records', [HealthRecordController::class, 'index'])->name('health_records.index');
Route::get('/health-records/create', [HealthRecordController::class, 'create'])->name('health_records.create');
Route::post('/health-records', [HealthRecordController::class, 'store'])->name('health_records.store');
Route::get('/health-records/{id}/edit', [HealthRecordController::class, 'edit'])->name('health_records.edit');
Route::put('/health-records/{id}', [HealthRecordController::class, 'update'])->name('health_records.update');
Route::delete('/health-records/{id}', [HealthRecordController::class, 'destroy'])->name('health_records.destroy');

Route::get('/supplies', [SupplyController::class, 'index'])->name('supplies.index');
Route::get('/supplies/create', [SupplyController::class, 'create'])->name('supplies.create');
Route::post('/supplies', [SupplyController::class, 'store'])->name('supplies.store');
Route::get('/supplies/{id}/edit', [SupplyController::class, 'edit'])->name('supplies.edit');
Route::put('/supplies/{id}', [SupplyController::class, 'update'])->name('supplies.update');
Route::delete('/supplies/{id}', [SupplyController::class, 'destroy'])->name('supplies.destroy');

Route::get('/community', [CommunityController::class, 'index'])->name('community.index');
Route::get('/community/create', [CommunityController::class, 'create'])->name('community.create');
Route::post('/community', [CommunityController::class, 'store'])->name('community.store');
Route::get('/community/{id}/edit', [CommunityController::class, 'edit'])->name('community.edit');
Route::put('/community/{id}', [CommunityController::class, 'update'])->name('community.update');
Route::delete('/community/{id}', [CommunityController::class, 'destroy'])->name('community.destroy');

// Comments
Route::post('/community/{communityId}/comments', [CommentController::class, 'store'])->name('comments.store');
Route::get('/comments/{id}/edit', [CommentController::class, 'edit'])->name('comments.edit');
Route::put('/comments/{id}', [CommentController::class, 'update'])->name('comments.update');
Route::delete('/comments/{id}', [CommentController::class, 'destroy'])->name('comments.destroy');