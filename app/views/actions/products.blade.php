@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
Products
@stop

@section('content')

<h1>Products stream</h1>
<hr>

@include('actions.stream')

@stop