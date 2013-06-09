@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
{{ $question->subject }}
@stop

@section('content')

<h1>{{ $question->subject }}</h1>
<h4>{{ $question->user->email }}</h4>
<time>{{ $question->created_at }}</time>
{{ $question->body }}

<h2>Answers</h2>

@stop