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
		Form::submit('Save')
	)) }}

{{ Form::close() }}

<h2>Links</h2>

@foreach($advice->links as $link)
	<div class="row">
		<a href="{{ URL::route('products.show', $link->product->id) }}">{{ $link->product->title }}</a>
	</div>
@endforeach

@if ($errors->any())
<ul>
	{{ implode('', $errors->all('<li class="error">:message</li>')) }}
</ul>
@endif

@stop