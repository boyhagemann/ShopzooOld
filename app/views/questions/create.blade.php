@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
Questions
@stop

@section('content')

<div class="span6">
    <h1>Ask a question</h1>
    @include('questions.form')
</div>
    

@stop

