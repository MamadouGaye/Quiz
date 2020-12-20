<?php

namespace App\Http\Controllers;

use App\Models\Quiz;

class QuizResultsController extends Controller
{
    public function __invoke(Quiz $quiz)
    {
        return view('quizzes.results', compact('quiz'));
    }
}
