<h1>Products</h1>

@foreach($products as $product)
<div class="well">
    <h3><a href="{{ $product->url }}">{{ $product->title }}</a></h3>
    <p>{{ $product->price }}</p>
</div>
@endforeach