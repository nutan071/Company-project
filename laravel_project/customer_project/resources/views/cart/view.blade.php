@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Your Cart</div>
                <div class="card-body">
                    @if (session('cart'))
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Total</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $grandTotal = 0;
                                @endphp
                                @foreach (session('cart') as $id => $product)
                                    @php
                                        $total = $product['price'] * $product['quantity'];
                                        $grandTotal += $total;
                                    @endphp
                                    <tr>
                                        <td>{{ $product['name'] }}</td>
                                        <td>{{ $product['quantity'] }}</td>
                                        <td>${{ $product['price'] }}</td>
                                        <td>${{ $total }}</td>
                                        <td>
                                        <form action="{{ route('cart.remove', $id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                                        </form>

                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="3" class="text-right"><strong>Total:</strong></td>
                                    <td>${{ $grandTotal }}</td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                        <a href="{{ route('cart.checkout') }}" class="btn btn-primary">Checkout</a>
                    @else
                        <p>Your cart is empty.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
