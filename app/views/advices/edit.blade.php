@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
Edit advice
@stop

@section('content')

<h1>Edit your advice</h1>
<p>
    Of course, you want to make it more personal, right?
    You really want your friend to buy it, don't ya?
    Well that's the spirit. 
    Go on then, change your masterpiece!
</p>

{{ Form::model($advice, array('method' => 'PATCH', 'route' => array('advices.update', $advice->id))) }}

	{{ Form::twText('Subject', 'subject', null, array('class' => 'span5')) }}
	{{ Form::twTextArea('Body', 'body', null, array('class' => 'span5')) }}

	{{ Form::twBtnGroup(array(
		Form::submit('Save it', array('class' => 'btn btn-primary btn-large'))
	)) }}

{{ Form::close() }}

@if ($errors->any())
<ul>
	{{ implode('', $errors->all('<li class="error">:message</li>')) }}
</ul>
@endif

@stop