@extends('layouts.home')

{{-- Web site Title --}}
@section('title')
Home
@stop

@section('hero')
    <h1>Can't decide which product to buy?<br> 
        Let our advisors help you out!
    </h1>
    <h2>Ask anything about any product</h2>
@stop

@section('content')

<div class="span6">
    <h2>Latest questions</h2>
    @foreach($questions as $question)
    <article class="media-object">
        <h1><a href="{{ URL::route('questions.show', $question->id) }}">{{ $question->subject }}</a></h1>
        <p>{{ $question->body }}</p>
    </article>
    @endforeach
</div>

<div class="span6">
    <h2>Have a question about a product?</h2>
    <p>
        Don't hasitate to ask directly and see what our advisors have to say.
    </p>
    
    @include('questions.form')
    
</div>

@stop