@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
{{ $product->title }} - Products
@stop

@section('content')

<h1>{{ $product->title }}</h1>
<p>{{ $product->description }}</p>
<p>
	<a href="{{ URL::route('products.redirect', $link->code) }}" class="btn" target="_blank">Go to the webpage</a>
</p>

<pre>{{ URL::route('products.redirect', $link->code) }}</pre>

{{ Form::open(array('route' => 'advices.link.add')) }}
{{ Form::hidden('link', $link->id ) }}
{{ Form::modelSelect('advice', 'Advice', array('valueField' => 'subject')) }}
{{ Form::submit('Advice this product', array('class' => 'btn btn-primary')) }}
{{ Form::close() }}

@stop