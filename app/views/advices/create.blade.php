@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
Add advice
@stop

@section('content')

<h1>Add a new advice</h1>

{{ Form::open( array('route' => 'advices.store')) }}

	{{ Form::twText('Subject', 'subject') }}
	{{ Form::twTextArea('Body', 'body') }}

	{{ Form::twBtnGroup(array(
		Form::submit('Save')
	)) }}

{{ Form::close() }}

@if ($errors->any())
<ul>
	{{ implode('', $errors->all('<li class="error">:message</li>')) }}
</ul>
@endif

@stop