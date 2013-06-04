@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
My advice
@stop

@section('content')

@if ($errors->any())
<ul>
	{{ implode('', $errors->all('<li class="error">:message</li>')) }}
</ul>
@endif

<h1>{{ $advice->subject }}</h1>
<p>{{ $advice->body }}</p>
<p><a href="{{ URL::route('advices.edit', $advice->id) }}" class="btn">Edit the message</a></p>

<hr>

<h3>Recipients</h3>
@if($advice->to->count())
@foreach($advice->to as $user)
<ul class="unstyled">
	<li>{{ $user->email }} <a href="{{ URL::route('advices.recipient.remove', $user->id) }}" class="btn btn-small">remove</a></li>
</ul>
@endforeach
<p><a href="{{ URL::route('advices.recipient.add', $advice->id) }}" class="btn">Add another friend</a></p>
@else
<p>No friends added yet</p>
<p><a href="{{ URL::route('advices.recipient.add', $advice->id) }}" class="btn">Add one or more friends</a></p>
@endif

<hr>

<h3>Links</h3>
@if($advice->links->count())
@foreach($advice->links as $link)
	<ul class="unstyled">
		<li><a href="{{ URL::route('products.show', $link->product->id) }}">{{ $link->product->title }}</a> <a href="{{ URL::route('advices.link.remove', $link->id) }}" class="btn btn-small">remove</a></li>
	</ul>
@endforeach
<p><a href="{{ URL::route('products') }}" class="btn">Add another link</a></p>
@else
<p>No links added yet</p>
<p><a href="{{ URL::route('products') }}" class="btn">Add one or more links</a></p>
@endif

<hr>

@if($advice->links->count() AND $advice->to->count())

<h3>You are ready</h3>
<p>
    This is your moment. 
    The whole world depends on this one little push of a button.
    Enlighten your friends with your recommended product.
    You will feel much better if you pressed it, honestly.
</p>
<div class="btn-group clearfix">
    <a href="{{ URL::route('advices.send', $advice->id) }}" class="btn btn-primary btn-large">Send it</a>
</div>
@endif

@stop