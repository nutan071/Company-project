@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Order #{{ $order->id }}</div>
                <div class="card-body">
                    <h4>Total Price: ${{ $order->total_price }}</h4>
                    <h5>Status: {{ $order->status }}</h5>
                    <hr>
                    <h5>Items</h5>
                    <ul>
                        @foreach($order->items as $item)
                            <li>
                                {{ $item->product->name }} - ${{ $item->price }} x {{ $item->quantity }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
