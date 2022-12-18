<?php

use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\QuizController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });

Route::middleware('auth')->group(function () {
    Route::get('dashboard', [MainController::class, 'dashboard'])->name('dashboard');
    Route::get('quiz/detail/{slug}', [MainController::class, 'quiz_detail'])->name('quiz.detail');
    Route::get('quiz/{slug}', [MainController::class, 'quiz'])->name('quiz.join');
    Route::post('quiz/{slug}/result', [MainController::class, 'result'])->name('quiz.result');
});

Route::middleware(['auth', 'isAdmin'])->prefix('admin')->group(function () {
    Route::resource('quizzes', QuizController::class);
    Route::resource('quiz/{quiz_id}/questions', QuestionController::class);
});

// Route::middleware(['auth', 'isAdmin'])->prefix('admin')->group(function () {
//     Route::delete('quizzes/{id}', [QuizController::class, 'destroy'])->where('id', '[0-9]+')->name('quizzes.destroy');
//     Route::resource('quizzes', QuizController::class)->except('destroy');
//     Route::resource('quiz.questions', QuestionController::class)->shallow();
// });

//**↓↓  Farklı bir yontem öğren beğenmedin  ↓↓**/
// Route::get('quizzes/{id}', [QuizController::class, 'destroy'])->whereNumber('id')->name('quizzes.destroy');
//** ↑↑ */
//**↓↓  Farklı bir yontem öğren beğenmedin  ↓↓**/
// Route::get('quiz/{quiz_id}/questions/{id}', [QuestionController::class, 'destroy'])->whereNumber('id')->name('quizzes.destroy');
//** ↑↑ */