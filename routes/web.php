<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\GaleryController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\TeamMatchController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\ImageUploadController;
use App\Http\Controllers\Admin\MerchandiseController;
use App\Http\Controllers\Admin\CategoryArticleController;
use App\Http\Controllers\Admin\CategoryMerchandiseController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\MatchController;
use App\Http\Controllers\Frontend\ProfileController;
use App\Http\Controllers\Frontend\ArticleController as FrontendArticleController;
use App\Http\Controllers\Frontend\GaleryController as FrontendGaleryController;
use App\Http\Controllers\Frontend\MerchandiseController as FrontendMerchandiseController;
use App\Http\Controllers\Frontend\AuthController as FrontendAuthController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

// Route::get('/', function () {
//     return view('admins.auth.login');
// });
Route::get('login', [FrontendAuthController::class, 'index'])->name('login');
Route::get('register', [FrontendAuthController::class, 'showRegister'])->name('register');
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('profile-klub', [ProfileController::class, 'index'])->name('profile');
Route::get('match', [MatchController::class, 'index'])->name('match');
Route::get('article', [FrontendArticleController::class, 'index'])->name('article');
Route::get('article/{slug}', [FrontendArticleController::class, 'show'])->name('article.show');
Route::get('merchandise', [FrontendMerchandiseController::class, 'index'])->name('merchandise');
Route::get('merchandise/{slug}', [FrontendMerchandiseController::class, 'show'])->name('merchandise.show');
Route::get('galery', [FrontendGaleryController::class, 'index'])->name('galery');
//auth
// add prefix admin
Route::prefix('admin')->group(function () {
    Route::get('/', [AuthController::class, 'index']);
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');
    Route::group(['middleware' => ['auth']], function () {
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
        //end auth
        Route::resource('permission', PermissionController::class, ['except' => ['show']]);
        Route::resource('role', RoleController::class);
        Route::resource('admin', AdminController::class);
        Route::resource('article', ArticleController::class);
        Route::resource('category-article', CategoryArticleController::class);
        Route::resource('team', TeamController::class);
        Route::resource('team-match', TeamMatchController::class);
        Route::resource('galery', GaleryController::class);
        Route::resource('image-upload', ImageUploadController::class);
        Route::resource('category-merchandise', CategoryMerchandiseController::class);
        Route::resource('merchandise', MerchandiseController::class);
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('user', UserController::class);
    });
});
