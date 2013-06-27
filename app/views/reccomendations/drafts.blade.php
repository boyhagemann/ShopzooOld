@extends('layouts.default')

@section('sidebar')

<h3>Reccomendations</h3>

@foreach($reccomendations as $reccomendation)
<article>
	<div>{{ $reccomendation->friend->name() }}</div>
</article>
@endforeach

@stop