<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Response;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class QuizResponsesController extends Controller
{
    public function __invoke(Quiz $quiz)
    {
        request()->validate([
            'response' => ['required', Rule::in($quiz->responses()->pluck('id')->toArray())]
        ]);

        try {
            DB::transaction(function() {
                Response::lockForUpdate()
                    ->findOrFail(request('response'))
                    ->increment('votes');
            });
        } catch (\Exception $e) {
            logger()->debug('** ERROR: An error occured **');
        }

        if(Response::find(request('response'))->is_right_answer)
            return redirect()->route('quizzes.results', $quiz)
                ->with('notification.success', 'Bonne réponse');
        else
            return redirect()->route('quizzes.results', $quiz)
                ->with('notification.error', 'Mauvaise réponse');

    }
}
