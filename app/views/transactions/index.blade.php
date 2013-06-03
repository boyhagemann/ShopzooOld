@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
Transactions
@stop

@section('content')

<h1>Transactions</h1>

@if($transactions->count())

@foreach($transactions as $transaction)
<div class="row">
    <h4>{{ $transaction->link->product->title }}</h4>
    <p>{{ $transaction->commission }}</p>
</div>
@endforeach

{{ $transactions->links() }}

@else

<h2>No transactions registered yet</h2>

@endif


@stop