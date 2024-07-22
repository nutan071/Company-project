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
                                        <input type="number" name="quantity" value="{{ $details['quantity']}}"  onchange="quantity(this,'{{ $details['quantity']}}');"  min="1" class="form-control" style="width: 60px; display: inline-block;">

                                        </td>


                                        <td>${{ $details['price'] }}</td>
                                        <td>${{ $details['quantity'] * $details['price'] }} 

                                        </td>
                                        <td>
                                            <form action="{{ route('cart.remove', $id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Remove</button>

                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="row mt-4">
                            <div class="col-md-12">
                                <h4>Total: ${{ array_sum(array_map(function ($product) { return $product['quantity'] * $product['price']; }, session('cart'))) }}</h4>
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


<script>
    
</script>