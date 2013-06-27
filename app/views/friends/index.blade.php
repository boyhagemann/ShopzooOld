@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
Friends
@stop

@section('content')

<h1>Friends</h1>
<hr>

<div class="row-fluid">
    <ul class="thumbnails">
        @foreach($friends as $user)
        <li class="span2">
            <a href="{{ URL::route('user.show', $user->id) }}">
                <img src="{{ URL::asset('holder.js/180x140') }}" />
            </a>
        </li>
        @endforeach        
    </ul>
</div>

@stop

@section('sidebar')
{{ Layout::dispatch('ReccomendationsController@drafts') }}
@stop