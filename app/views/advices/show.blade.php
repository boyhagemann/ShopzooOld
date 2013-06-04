@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
My advice
@stop

@section('content')

<h1>{{ $advice->subject }}</h1>
<p>{{ $advice->body }}</p>

<h3>Recipients</h3>
@if($advice->to->count())
@foreach($advice->to as $user)

@endforeach
@else
<p>No recipients added yet</p>
<a href="" class="btn btn-primary">Add one or more recipients</a>
@endif

<h3>Links</h3>
@if($advice->links->count())
@foreach($advice->links as $link)
	<ul class="unstyled">
		<li><a href="{{ URL::route('products.show', $link->product->id) }}">{{ $link->product->title }}</a></li>
	</ul>
@endforeach
<a href="{{ URL::route('products') }}" class="btn btn-primary">Add another link</a>
@else
<p>No links added yet</p>
<a href="{{ URL::route('products') }}" class="btn btn-primary">Add one or more links</a>
@endif


@if ($errors->any())
<ul>
	{{ implode('', $errors->all('<li class="error">:message</li>')) }}
</ul>
@endif

@stop