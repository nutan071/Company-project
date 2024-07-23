@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Your Cart</div>
                <button type="button" class="btn btn-outline-info" onclick="window.location.href='{{ route('user.dashboard') }}'">
                    More Shopping
                </button>

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if(empty(session('cart')))
                        <p>Your cart is empty.</p>
                    @else
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Total</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(session('cart') as $id => $details)
                                    <tr>
                                        <td>{{ $details['name'] }}</td>
                                        <td>
                                            <input type="number" name="quantity" class="quantity-input" data-id="{{ $id }}" value="{{ $details['quantity'] }}" min="1" class="form-control" style="width: 60px; display: inline-block;">
                                        </td>
                                        <td>${{ $details['price'] }}</td>
                                        <td class="product-total">${{ $details['quantity'] * $details['price'] }}</td>
                                        <td>
                                            <form action="{{ route('cart.remove', $id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Remove</button>
                                            </form>
                                            <form action="{{ route('cart.saveForLater', $id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                <button type="submit" class="btn btn-secondary">Save for Later</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="row mt-4">
                            <div class="col-md-12">
                                <h4>Total: $<span id="cart-total">{{ array_sum(array_map(function ($product) { return $product['quantity'] * $product['price']; }, session('cart'))) }}</span></h4>
                                <form action="{{ route('cart.processPOD') }}" method="GET" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Pay on Delivery</button>
                                </form>
                                <form action="{{ route('cart.processCOD') }}" method="GET" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-secondary">Cash on Delivery</button>
                                </form>
                            </div>
                        </div>
                    @endif

                    <div class="card mt-4">
                        <div class="card-header">Saved for Later</div>
                        <div class="card-body">
                            @if(empty(session('saveForLater')))
                                <p>No items saved for later.</p>
                            @else
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Total</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach(session('saveForLater') as $id => $details)
                                            <tr>
                                                <td>{{ $details['name'] }}</td>
                                                <td>{{ $details['quantity'] }}</td>
                                                <td>${{ $details['price'] }}</td>
                                                <td>${{ $details['quantity'] * $details['price'] }}</td>
                                                <td>
                                                    <form action="{{ route('cart.moveToCart', $id) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        <button type="submit" class="btn btn-primary">Move to Cart</button>
                                                    </form>
                                                    <form action="{{ route('cart.remove', $id) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Remove</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        console.log('DOM fully loaded and parsed');

        const quantityInputs = document.querySelectorAll('.quantity-input');
        const cartTotal = document.getElementById('cart-total');

        quantityInputs.forEach(input => {
            input.addEventListener('change', function() {
                const id = this.getAttribute('data-id');
                const quantity = parseInt(this.value);
                const row = this.closest('tr');
                const price = parseFloat(row.querySelector('td:nth-child(3)').textContent.replace('$', ''));
                const productTotal = row.querySelector('.product-total');

                console.log(`ID: ${id}, Quantity: ${quantity}, Price: ${price}`);

                // Update the product total
                productTotal.textContent = `$${(quantity * price).toFixed(2)}`;

                // Update the cart total
                updateCartTotal();
            });
        });

        function updateCartTotal() {
            let total = 0;
            document.querySelectorAll('.product-total').forEach(totalCell => {
                total += parseFloat(totalCell.textContent.replace('$', ''));
            });
            cartTotal.textContent = total.toFixed(2);
            console.log(`Updated Cart Total: ${total.toFixed(2)}`);
        }
    });
</script>
@endsection
