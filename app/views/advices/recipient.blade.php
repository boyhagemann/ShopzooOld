@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
Edit advice
@stop

@section('content')

<h1>Add a friend</h1>

{{ Form::model($advice, array('route' => array('advices.recipient.store', $advice->id))) }}

	{{ Form::twText('E-mail', 'email') }}

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