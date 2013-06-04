@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
Edit advice
@stop

@section('content')

<h1>Edit advice</h1>

{{ Form::model($advice, array('method' => 'PATCH', 'route' => array('advices.update', $advice->id))) }}

	{{ Form::twText('Subject', 'subject') }}
	{{ Form::twTextArea('Body', 'body') }}

	{{ Form::twBtnGroup(array(
		Form::submit('Save', array('class' => 'btn btn-primary'))
	)) }}

{{ Form::close() }}

@if ($errors->any())
<ul>
	{{ implode('', $errors->all('<li class="error">:message</li>')) }}
</ul>
@endif

@stop