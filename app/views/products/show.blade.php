@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
{{ $product->title }} - Products
@stop

@section('content')

<h1>{{ $product->title }}</h1>
<div class="media">
    <a class="pull-left" href="#">
        <img class="media-object" src="{{ URL::route('image.resize', array($product->image, 300, 300)) }}">
    </a>
	<p>
		<img src="{{ URL::route('image.qr', $url) }}">
	</p>
    <div class="media-body">
        <p>{{ $product->description }}</p>     
        <p>
            <a href="{{ URL::route('products.redirect', $link->code) }}" class="btn" target="_blank"><i class="icon-globe"></i> Go to the webpage</a>
        </p>   
    </div>
</div>

<hr>

<h3><i class="icon-envelope"></i> Send to your friends</h3>
@if($reccomendations)
<ul class="nav">
        {{ Form::open(array('route' => 'reccomendations.addProduct')) }}
        {{ Form::hidden('product_id', $product->id) }}
		{{ Form::modelCheckbox('friends', $reccomendations, null, array(
			'keyField' => 'friend_id',
			'valueField' => function($reccomendation) {
				return $reccomendation->friend->name();
			},
			'checked' => function($reccomendation) use($product) {
				return $reccomendation->hasProduct($product);
			}
		)) }}
        {{ Form::submit('Add') }}
        {{ Form::close() }}
</ul>
@else
<p>
	Add a friend
</p>
@endif


<h4>Not sending an advice?</h4>
<p>
    You don't want to go thru the hassle of creating an advice?
    No problem!
    Just copy and paste this link and send it some other way you wish.
    Soon as your friend buys the product on the webshop thru this link, the money will be floating your way in two shakes of a lams tail.
    Your friend will not even notice you made all that money, the poor sucker. 
    That was a joke of course.
</p>

<pre>{{ URL::route('products.redirect', $link->code) }}</pre>

@stop

@section('sidebar')
{{ Layout::dispatch('ReccomendationsController@drafts') }}
@stop