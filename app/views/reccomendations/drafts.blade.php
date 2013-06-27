@extends('layouts.default')

@section('sidebar')

<h3>Your reccomendations</h3>

@foreach($reccomendations as $reccomendation)
<article>

		<div class="well">

			<div class="clearfix">
				<a href="{{ URL::route('reccomendations.edit', $reccomendation->id) }}" class="btn btn-small"><i class="icon-envelope-alt"></i> Send to <strong>{{ $reccomendation->friend->name() }}</strong></a>
			</div>

			<div class="clearfix">
				@foreach($reccomendation->products as $product)
				<a href="{{ URL::route('products.show', $product->id) }}"><img src="{{ URL::route('image.resize', array($product->image, 40, 40)) }}" alt="{{ $product->title }}"></a>
				@endforeach
			</div>

		</div>

</article>
@endforeach

@stop