<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{

    public function index()
    {
        $quizzes = Quiz::all();

        return view('quizzes.index', compact('quizzes'));
    }

    public function create()
    {
        return view('quizzes.create');
    }

    public function show(Quiz $quiz)
    {
        return view('quizzes.show', compact('quiz'));
    }

    public function store()
    {
        $validatedData = request()->validate([
            'question_text' => 'required|string|min:4',
            'responses'     => 'required|array|min:2|max:' . config('quiz.max_number_of_answers'),
            'responses.*'   => 'required|string',
        ]);

        $quiz = Quiz::create([
            'question_text' => $validatedData['question_text']
        ]);

        foreach ($validatedData['responses'] as $i => $choice) {
            $quiz->responses()->create([
                'text' => $choice,
                'is_right_answer' => request()->good_response == $i ? true : false
            ]);
        }

        return redirect()->route('quizzes.show', $quiz)
            ->with('notification.success', 'Quiz créé avec succès!');
    }

}
