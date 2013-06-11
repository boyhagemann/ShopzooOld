@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Invite
@stop

{{-- Content --}}
@section('content')
<h1>Invite some friends</h1>

{{ Form::open(array('route' => 'friends.create')) }}
{{ Form::twTextArea('Add e-mail addresses', 'addresses', null, array('class' => 'span8', 'placeholder' => 'Add muliple e-mail addresses on each row')) }}
{{ Form::twBtnGroup(array(
	Form::submit('Invite', array('class' => 'btn btn-primary btn-large'))
)) }}
{{ Form::close() }}

@stop
