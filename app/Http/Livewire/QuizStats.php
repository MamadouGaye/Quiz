<?php

namespace App\Http\Livewire;

use App\Models\Quiz;
use Livewire\Component;
use Asantibanez\LivewireCharts\Models\PieChartModel;

class QuizStats extends Component
{
    public Quiz $quiz;

    public function mount(Quiz $quiz)
    {
        $this->quiz = $quiz;
    }

    public function render()
    {
        $pieChartModel = new PieChartModel;
        $pieChartModel->setTitle(sprintf('Quiz %d Results', $this->quiz->id));

        foreach ($this->quiz->responses as $index => $choice) {
           $pieChartModel->addSlice(
                $choice->text,
                $choice->votes,
                config('quiz.colors')[$index]
            );
        }

        return view('livewire.quiz-stats', compact('pieChartModel'));
    }
}
