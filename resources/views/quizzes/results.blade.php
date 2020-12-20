@extends('layouts.app')

@section('content')
    <h1>Poll #{{ $quiz->id }}</h1>

    <h2>{{ $quiz->question_text }}</h2>

    <livewire:quiz-stats :quiz="$quiz" />

    <p>
        <a href="{{ route('quizzes.show', $quiz) }}">&laquo; Go back to quiz</a>
    </p>
@endsection
