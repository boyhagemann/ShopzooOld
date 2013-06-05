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
<p><a href="{{ URL::route('advices.edit', $advice->id) }}" class="btn"><i class="icon-pencil"></i> Edit the message</a></p>

<hr>

<div class="row">


	<div class="span6">

		<h4><i class="icon-link"></i> Links</h4>
		<p>
			Ok, we have our product links.
			You sure this list is now complete?
			Never a bad thing to put some extra link on it, is it?
		</p>
		@if($advice->links->count())
		<table class="table table-striped table-condensed">
			@foreach($advice->links as $link)
			<tr>
				<td>
					<a href="{{ URL::route('products.show', $link->product->id) }}">{{ $link->product->title }}</a>
				</td>
				<td>
					<a href="{{ URL::route('advices.link.remove', $link->id) }}" class="btn btn-small"><i class="icon-trash"></i> remove</a>
				</td>
			</tr>
			@endforeach
		</table>
		<p><a href="{{ URL::route('products') }}" class="btn"><i class="icon-plus"></i> Add another link</a></p>
		@else
		<p>
			You have no links added yet.
			What good is an advice without pointing in the right direction?
			Start looking for some dandy products and add them in your advice right away.
		</p>
		<p><a href="{{ URL::route('products') }}" class="btn"><i class="icon-plus"></i> Add one or more links</a></p>
		@endif

	</div>

	<div class="span6">

		<h4><i class="icon-user"></i> Recipients</h4>
		@if($advice->to->count())
		<p>
			Excellent, we have someone to mail our product to.
			Do you know anymore friends who will like this?
			Or do you not have any more friends?
			That would be really sad for you.
		</p>
		<table class="table table-striped table-condensed">
			@foreach($advice->to as $user)
			<tr>
				<td>
					{{ $user->email }}
				</td>
				<td>
					<a href="{{ URL::route('advices.recipient.remove', $user->id) }}" class="btn btn-small"><i class="icon-trash"></i> remove</a>
				</td>
			</tr>
			@endforeach
		</table>
		<p><a href="{{ URL::route('advices.recipient.add', $advice->id) }}" class="btn"><i class="icon-plus"></i> Add another friend</a></p>
		@else
		<p>
			What?
			You have no friends added yet.
			Is it because you're lonely and sad?
			Get your back of that couch and start mingling, you fool!
		</p>
		<p><a href="{{ URL::route('advices.recipient.add', $advice->id) }}" class="btn"><i class="icon-plus"></i> Add one or more friends</a></p>
		@endif

	</div>
</div>

<hr>

@if($advice->links->count() AND $advice->to->count())

<h3><i class="icon-thumbs-up"></i> You are ready</h3>
<p>
    This is your moment. 
    The whole world depends on this one little push of a button.
    Enlighten your friends with your recommended product.
    You will feel much better if you pressed it, honestly.
</p>
<div class="btn-group clearfix">
    <a href="{{ URL::route('advices.send', $advice->id) }}" class="btn btn-primary btn-large"><i class="icon-envelope-alt"></i> &nbsp; Send it</a>
</div>
@endif

@stop