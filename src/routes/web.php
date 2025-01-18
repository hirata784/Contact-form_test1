<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [AuthController::class, 'index']);
Route::post('/confirm', [AuthController::class, 'confirm']);
Route::get('/thanks', [AuthController::class, 'back']);
Route::post('/thanks', [AuthController::class, 'thanks']);
Route::get('/admin', [AuthController::class, 'admin']);
Route::get('/admin/search', [AuthController::class, 'search']);
Route::get('/admin/reset', [AuthController::class, 'reset']);

// Route::get('/register', [AuthController::class, 'register']);
// Route::get('/login', [AuthController::class, 'login']);



// 認証ができていない場合は、ログインページが表示
// Route::middleware('auth')->group(function () {
//     Route::get('/', [AuthController::class, 'index']);
// });
