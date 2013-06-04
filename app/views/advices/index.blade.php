@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
My advices
@stop

@section('content')

<h1>My advices</h1>

@if($advices->count())

@foreach($advices as $advice)
<div class="row">
    <h4>{{ $advice-subject }}</h4>
    <p>{{ $advice->body }}</p>
</div>
@endforeach

{{ $advices->links() }}

@else

<h2>No advices added yet</h2>

@endif


@stop