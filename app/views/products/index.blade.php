@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
Products
@stop

@section('content')

@if($products->count())

@if($terms)
<h2>Search results for "{{ $terms }}"</h2>
@endif

<div class="row top">
	<div class="span6">
		@include('products.searchform')
	</div>
	<div class="pull-right">
		{{ $products->links() }}
	</div>
</div>

<ul class="thumbnails">
	@foreach($products as $i => $product)
	<li class="span2">
		<div class="thumbnail">
			<a href="{{ URL::route('products.show', $product->id) }}">
				<img class="media-object" src="{{ URL::route('image.resize', array($product->image, 160, 120)) }}">
			</a>
			<div class="caption">
				<a href="{{ URL::route('products.show', $product->id) }}">{{ $product->title }}</a>
				<span class="badge">{{ $product->price }}</span>
			</div>
		</div>
	</li>
	@endforeach
</ul>

<div class="row">
	<div class="pull-right">
		{{ $products->links() }}
	</div>
</div>

@else

<h2>No search results for "{{ $terms }}"</h2>

@endif

@stop