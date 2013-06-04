<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Advice</h2>
		<p>{{ $advice->body }}</p>

		<h3>Links</h3>
		@foreach($advice->links as $link)
		<ul>
			<li><a href="{{ URL::route('products.redirect', $link->code) }}">{{ $link->product->title }}</a></li>
		</ul>
		@endforeach
	</body>
</html>
