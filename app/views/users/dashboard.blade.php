@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
Dashboard
@stop

{{-- Content --}}
@section('content')

<div class="row">
    
    <div class="span4">
        
        <h2>Stream</h2>
        @include('actions.stream')
    </div>     
    
    <div class="span4">
        
    </div>
    
</div>

@stop