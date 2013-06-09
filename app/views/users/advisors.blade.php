@extends('layouts.home')

{{-- Web site Title --}}
@section('title')
Home
@stop

@section('hero')
    <h1>Can I help my friends and<br> 
        make money at same time?
    </h1>
    <h2>Oh yes you can!</h2>
@stop

@section('content')
<h1>The concept is simple</h1>
<p>
    We provide you links to webhops. 
    Normally when you buy a product with that link, we get a share of the transaction.
    But here's the deal. We pass that share to you! 
    Well... not the whole share, but 90% of our cut is yours!
</p>

<h3>It is time to search for some products don't you think?</h3>
@include('products.searchform')
@stop