@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
Add advice
@stop

@section('content')

<h1>Add a new advice</h1>

@if($link)
<p>
    Ah, you wanna share the nice "<strong>{{ $link->product->title }}</strong>" with your friends?
    Good choice! 
    Let's make sure they actually buy the product.
    Otherwise you are not making money, right?
    Ok, so why should your friend buy this product?
</p>
@endif

{{ Form::open( array('route' => 'advices.store')) }}

	{{ Form::twText('Subject', 'subject', null, array('class' => 'span5')) }}
	{{ Form::twTextArea('Body', 'body', null, array('class' => 'span5')) }}
	{{ Form::hidden('link', $link ? $link->id : '') }}

	{{ Form::twBtnGroup(array(
		Form::submit('Save it and add some friends!', array('class' => 'btn btn-primary'))
	)) }}

{{ Form::close() }}

@if ($errors->any())
<ul>
	{{ implode('', $errors->all('<li class="error">:message</li>')) }}
</ul>
@endif

@stop