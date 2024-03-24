<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\MemberController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// ! GUEST

// * Login 
Route::get('/', [GuestController::class, 'loginPage'])->name('loginPage');

Route::post('/', [GuestController::class, 'login'])->name('login');


// * Register 
Route::get('/register', [GuestController::class, 'registerPage'])->name('registerPage');

Route::post('/register', [GuestController::class, 'register'])->name('register');

// ! ADMIN

Route::get('/dashboard/admin', [AdminController::class, 'dashboardPage'])->name('admin_dashboard')->middleware('admin');

Route::get('/dashboard/addGame', [AdminController::class, 'addGamePage'])->name('addGamePage')->middleware('admin');

Route::post('/dashboard/addGame', [AdminController::class, 'addGame'])->name('addGame')->middleware('admin');

Route::get('/dashboard/gamePage', [AdminController::class, 'gamePage'])->name('gamePage')->middleware('admin');

Route::get('/logout', [GuestController::class, 'logout'])->name('logout');

Route::post('admin/delete/{game_id}', [AdminController::class, 'delete'])->name('deleteGame')->middleware('admin');

Route::get('admin/edit/{game_id}', [AdminController::class, 'editPage'])->name('editPage')->middleware('admin');

Route::post('admin/edit/{game_id}', [AdminController::class, 'edit'])->name('editGame')->middleware('admin');

Route::post('member/search', [AdminController::class, 'search'])->name('admin_search')->middleware('admin');

Route::get('member/search', [AdminController::class, 'search'])->name('admin_search')->middleware('admin');

// ! MEMBER

Route::get('/dashboard/member', [MemberController::class, 'dashboardPage'])->name('dashboard')->middleware('member');

Route::post('/dashboard/search', [MemberController::class, 'search'])->name('search')->middleware('member');

Route::get('/dashboard/member/gamePage', [MemberController::class, 'gamePage'])->name('memberGamePage')->middleware('member');

Route::get('/dashboard/member/library', [MemberController::class, 'libraryPage'])->name('libraryPage')->middleware('member');

Route::get('/member/game_detail_page/{game_id}', [MemberController::class, 'gameDetailPage'])->name('gameDetailPage')->middleware('member');

Route::get('/member/profile', [MemberController::class, 'profilePage'])->name('profilePage')->middleware('member');

Route::post('/member/gamePage/{game_id}', [MemberController::class, 'buyGame'])->name('buyGame')->middleware('member');

Route::get('/member/editProfilePage', [MemberController::class, 'editProfilePage'])->name('editProfilePage')->middleware('member');

Route::post('/member/editProfilePage', [MemberController::class, 'editProfile'])->name('editProfile')->middleware('member');


// ! Unauthorized

Route::get("/unauthorized", [GuestController::class, 'unauthorized'])->name('unauthorized');
