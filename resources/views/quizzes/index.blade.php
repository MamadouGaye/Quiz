@extends('layouts.app')

@section('content')
    <h1>All Polls</h1>

    <ul>
    @forelse($quizzes as $quiz)
        <li>
            <a href="{{ route('quizzes.show', $quiz) }}">
                {{ $quiz->question_text }}
            </a>
        </li>
    @empty
        <li>Sorry, no quizzes yet. <a href="{{ route('home') }}">Be the first!</a></li>
    @endforelse
    </ul>
@endsection
