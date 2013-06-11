@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
Friends
@stop

@section('content')

<h1>Friends stream</h1>
<hr>

@foreach($logs as $log)
<article class="row">
    <time>{{ $log->created_at }}</time>
    <p>{{ $log->message }}</p>
</article>
@endforeach

@stop