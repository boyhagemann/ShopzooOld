@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
Questions
@stop

@section('content')

<h1>Ask a question</h1>

@include('questions.form')
    

@stop

