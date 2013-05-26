
<h1>Search a product</h1>

@include('products.searchform')

@if($products->count())

@if($terms)
<h2>Search results for "{{ $terms }}"</h2>
@endif

@foreach($products as $product)
<div class="row">
    <h3><a href="{{ $product->url }}">{{ $product->title }}</a></h3>
    <p>{{ $product->price }}</p>
</div>
@endforeach

{{ $products->links() }}

@else

<h2>No search results for "{{ $terms }}"</h2>

@endif