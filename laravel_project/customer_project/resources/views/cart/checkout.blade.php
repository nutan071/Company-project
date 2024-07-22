

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Checkout</div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if(empty(session('cart')))
                        <p>Your cart is empty.</p>
                    @else
                        <h4>Order Summary</h4>
                        <ul>
                            @foreach(session('cart') as $id => $details)
                                <li>{{ $details['name'] }} ({{ $details['quantity'] }}): ${{ $details['quantity'] * $details['price'] }}</li>
                            @endforeach
                        </ul>
                        <p>Total: ${{ array_sum(array_map(function($product) { return $product['price'] * $product['quantity']; }, session('cart'))) }}</p>

                        <h4>Choose Payment Method</h4>
                        <form action="{{ route('cart.processPOD') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary">Pay on Delivery</button>
                        </form>
                        <form action="{{ route('cart.processCOD') }}" method="POST" class="mt-2">
                            @csrf
                            <button type="submit" class="btn btn-primary">Cash on Delivery</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
