@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
Stream
@stop

{{-- Content --}}
@section('content')

<div class="row">
    
    <div class="span4">
        
        <h1>Stream</h1>
        @include('partials.stream')
    </div>     
    
    <div class="span4">
        
    </div>
    
</div>

@stop

@section('sidebar')
{{ Layout::dispatch('ReccomendationsController@drafts') }}
@stop