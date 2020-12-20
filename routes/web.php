<?php

use App\Http\Controllers\QuizController;
use App\Http\Controllers\QuizResponsesController;
use App\Http\Controllers\QuizResultsController;
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

Route::get('/', [QuizController::class, 'create'])->name('home');

Route::get('/quizzes', [QuizController::class, 'index'])
    ->name('quizzes.index');

Route::post('/quizzes', [QuizController::class, 'store'])
    ->name('quizzes.store');

Route::get('/quizzes/{quiz}', [QuizController::class, 'show'])
    ->name('quizzes.show');

Route::post('/quizzes/{quiz}/response', QuizResponsesController::class)
    ->name('quizzes.vote');

Route::get('/quizzes/{quiz}/results', QuizResultsController::class)
    ->name('quizzes.results');
