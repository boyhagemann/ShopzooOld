@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
Questions
@stop

@section('content')

<h1>Questions</h1>

<div class="btn-group">
    <a href="{{ URL::route('questions.create') }}" class="btn btn-primary">Or ask a new question</a>
</div>

<hr>

@foreach($questions as $question)
<article class="row">
    <h1><a href="{{ URL::route('questions.show', $question->id) }}">{{ $question->subject }}</a></h1>
    <time>{{ $question->created_at }}</time>
    <p>{{ $question->body }}</p>
</article>
@endforeach

@stop