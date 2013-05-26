@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
Home
@stop

@section('content')
<h1>Search a product</h1>

@include('products.searchform')
@stop