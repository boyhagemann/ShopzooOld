@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
{{ $question->subject }}
@stop

@section('content')

<h1>{{ $question->subject }}</h1>
<h4>{{ $question->user->name }}</h4>
<time>{{ $question->created_at }}</time>
<p>
    {{ $question->body }}
</p>

<div class="btn-group">
    <a href="{{ URL::route('user.advisors') }}" class="btn btn-large">Want to give advice?</a>
</div>

<h2>Answers</h2>

@stop