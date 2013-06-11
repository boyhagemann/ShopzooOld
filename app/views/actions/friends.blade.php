@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
Friends
@stop

@section('content')

<h1>Friends stream</h1>
<hr>

@include('actions.stream')

@stop