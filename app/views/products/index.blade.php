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


<ul class="thumbnails">
	@foreach($products as $i => $product)
	<li class="span3">
		<div class="thumbnail">
			<a href="#">
				<img class="media-object" src="{{ URL::route('image.resize', array($product->image, 260, 200)) }}">
			</a>
			<div class="caption">
				<h3><a href="{{ URL::route('products.show', $product->id) }}">{{ $product->title }}</a></h3>
				<p>{{ $product->price }}</p>
			</div>
		</div>
	</li>
	@endforeach
</ul>

{{ $products->links() }}

@else

<h2>No search results for "{{ $terms }}"</h2>

@endif


@stop