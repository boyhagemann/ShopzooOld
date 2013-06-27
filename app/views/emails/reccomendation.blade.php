<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Reccomendation</h2>
		<p>{{ $reccomendation->body }}</p>

		<h3>Products</h3>
		@foreach($reccomendation->products as $product)
		<ul>
			<li><a href="{{ URL::route('products.redirect', $product->link->code) }}">{{ $product->title }}</a></li>
		</ul>
		@endforeach
	</body>
</html>
