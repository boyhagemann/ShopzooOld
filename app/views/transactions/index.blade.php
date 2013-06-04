@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
Transactions
@stop

@section('content')

@if($transactions->count())

<h1>Your transactions</h1>
<p>
    Yess, you are making real money here!
    Keep it going and put some more links in the world.
</p>

@foreach($transactions as $transaction)
<div class="row">
    <h4>{{ $transaction->link->product->title }}</h4>
    <p>{{ $transaction->commission }}</p>
</div>
@endforeach

{{ $transactions->links() }}

@else

<h1>You are not rich yet</h1>
<p>
    Sorry my friend, but you're so called friends haven't made any transactions yet.
    So there are no bucks coming your way yet.
</p>
<p>
    But no worries! 
    Put out a new advice and then they may be smart enough to buy some products.
</p>
@endif


@stop