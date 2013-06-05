@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
Products
@stop

@section('content')

<h1>Search a product</h1>

@include('products.searchform')

<hr>

@if($products->count())

@if($terms)
<h2>Search results for "{{ $terms }}"</h2>
@endif

@foreach($products as $product)
<div class="media">
    <a class="pull-left" href="#">
        <img class="media-object" src="{{ Thumb::square($product->image, 300) }}">
    </a>
    <div class="media-body">
        <h3 class="media-heading"><a href="{{ URL::route('products.show', $product->id) }}">{{ $product->title }}</a></h3>
        <p>{{ $product->price }}</p>
    </div>
</div>
@endforeach

{{ $products->links() }}

@else

<h2>No search results for "{{ $terms }}"</h2>

@endif


@stop