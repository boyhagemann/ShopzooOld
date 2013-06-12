@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Stream of {{ $user->name() }}
@stop

{{-- Content --}}
@section('content')

<h1>{{ $user->name() }}</h1>

<div class="row">
    <div class="span6">
        @include('partials.stream')
    </div>
    <div class="span6">
        <h2>Meet his friends</h2>
        
        <div class="row-fluid">
            <ul class="thumbnails">
                @foreach($friends as $user)
                <li class="span2">
                    <a href="{{ URL::route('user.show', $user->id) }}">
                        <img src="{{ URL::asset('holder.js/90x70') }}" />
                    </a>
                </li>
                @endforeach        
            </ul>
        </div>
    </div>
</div>

@stop
