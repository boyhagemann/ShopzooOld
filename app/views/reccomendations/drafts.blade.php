@extends('sidebar')

@if($reccomendations->count())
<h3>Your reccomendations</h3>

@foreach($reccomendations as $reccomendation)
<article>

		<div class="well">

			@if($reccomendation->products->count())

			<div class="clearfix">
				@foreach($reccomendation->products as $product)
				<a href="{{ URL::route('products.show', $product->id) }}"><img src="{{ URL::route('image.resize', array($product->image, 40, 40)) }}" alt="{{ $product->title }}"></a>
				@endforeach
			</div>

			<div class="clearfix">
				<br>
				<a href="{{ URL::route('reccomendations.edit', $reccomendation->id) }}" class="btn btn-small"><i class="icon-envelope-alt"></i> Send to <strong>{{ $reccomendation->friend->name() }}</strong></a>
			</div>

			@else
			<div class="">
				<p>Nothing added for <strong>{{ $reccomendation->friend->name() }}</strong></p>
				<a href="{{ URL::route('products') }}" class="btn btn-small"><i class="icon-search"></i> Browse products</a>
			</div>

			@endif

		</div>

</article>
@endforeach

@else

<h3>No reccomendations yet</h3>

<ul class="unstyled">
	@foreach($friends as $friend)
	<li><a href="{{ URL::route('reccomendations.friend.add', array($friend->id)) }}">{{ $friend->name() }}</a></li>
	@endforeach
</ul>

@endif

@stop