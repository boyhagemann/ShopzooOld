@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
My advices
@stop

@section('content')

<h1>My advices</h1>

@if($advices->count())

<div class="row">

	<div class="span8">

		@foreach($advices as $advice)
		<div class="media">
			<div class="media-body">
				<h4><a href="{{ URL::route('advices.show', $advice->id) }}">{{ $advice->subject }}</a></h4>
				<p>{{ $advice->body }}</p>
			</div>
		</div>
		@endforeach
		{{ $advices->links() }}
	</div>

	<div class="span4">
		<p class="quote">
			Nice, you have quite the list here!
			It seems though you're not making any profit yet.
			Check out these examples on <a href="">how to increase your sales</a>.
		</p>
	</div>

</div>


@else

<h2>No advices added yet</h2>
@endif

<hr>

<p><a href="{{ URL::route('advices.create') }}" class="btn btn-primary">Add a new advice</a></p>


@stop