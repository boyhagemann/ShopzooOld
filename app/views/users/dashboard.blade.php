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
        @foreach($stream as $log)
        <div class="media-object">
            <time>{{ $log->created_at }}</time>
            <h4>{{ $log->message }}</h4>
        </div>
        @endforeach
        
    </div>     
    
    <div class="span4">
        
    </div>
    
</div>

@stop