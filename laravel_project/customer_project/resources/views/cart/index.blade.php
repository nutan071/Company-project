@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Your Cart</div>
                <div class="card-body">
                    @if(Session::has('cart') && count(Session::get('cart')) > 0)
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(Session::get('cart') as $id => $item)
                                    <tr>
                                        <td>{{ $item['name'] }}</td>
                                        <td>{{ $item['quantity'] }}</td>
                                        <td>${{ $item['price'] }}</td>
                                        <td>${{ $item['quantity'] * $item['price'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <a href="{{ route('cart.checkout') }}" class="btn btn-primary">Proceed to Checkout</a>
                    @else
                        <p>Your cart is empty.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
