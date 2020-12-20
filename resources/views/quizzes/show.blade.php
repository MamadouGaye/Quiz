@extends('layouts.app')

@section('content')
    <h1>Poll #{{ $quiz->id }}</h1>

    <h2>{{ $quiz->question_text }}</h2>

    <form method="POST" action="{{ route('quizzes.vote', $quiz) }}">
        @csrf

        @foreach($quiz->responses as $index => $choice)
        <label for="choice_{{ $index }}">
            <input type="radio" id="choice_{{ $index }}" name="response" value="{{ $choice->id }}"> {{ $choice->text }}
        </label><br>
        @endforeach

        @error('quiz')
            <p style="color: red; font-style: italic;">{{ $message }}</p>
        @enderror

        <br>

        <div>
            <button type="submit">Submit</button>
        </div>
    </form>

    <p>
        <a href="{{ route('quizzes.results', $quiz) }}">📈 See quiz's results</a>
    </p>
@endsection
