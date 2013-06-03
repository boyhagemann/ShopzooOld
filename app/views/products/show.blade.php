@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
{{ $product->title }} - Products
@stop

@section('content')

<h1>{{ $product->title }}</h1>
<p>{{ $product->description }}</p>

<pre>{{ URL::route('products.redirect', $link->code) }}</pre>
<a href="{{ URL::route('products.redirect', $link->code) }}" class="btn btn-primary" target="_blank">Go to the webpage</a>

@stop