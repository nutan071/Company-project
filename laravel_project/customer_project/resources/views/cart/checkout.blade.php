
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Checkout</div>
                <div class="card-body">
                    @if (session('cart'))
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (session('cart') as $id => $product)
                                    <tr>
                                        <td>{{ $product['name'] }}</td>
                                        <td>{{ $product['quantity'] }}</td>
                                        <td>${{ $product['price'] }}</td>
                                        <td>${{ $product['price'] * $product['quantity'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <form action="{{ route('order.place') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary">Proceed to Payment</button>
                            <button type="submit" class="btn btn-primary">Proceed to Payment</button>

                        </form>
                    @else
                        <p>Your cart is empty.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
