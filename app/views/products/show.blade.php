@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
{{ $product->title }} - Products
@stop

@section('content')

<h1>{{ $product->title }}</h1>
<p>{{ $product->description }}</p>
<p>
	<a href="{{ URL::route('products.redirect', $link->code) }}" class="btn" target="_blank">Go to the webpage</a>
</p>

<hr>

<h3>So you want to give your friend some advice right?</h3>
<p>
    Well, that's what friends are for! 
    Recommend this product and your amigo will be blown away with your kindness.
    And sure, why don't you make a little money out of it?
</p>

{{ Form::open(array('route' => array('advices.link.add', $link->id))) }}
{{ Form::modelSelect('advice', 'Advice', array('valueField' => 'subject', 'emptyValue' => 'Start a new advice')) }}
{{ Form::submit('Add this insane product', array('class' => 'btn btn-primary')) }}
{{ Form::close() }}


<h4>Not sending an advice?</h3>
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