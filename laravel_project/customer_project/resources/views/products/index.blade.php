@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-end mb-3">
        <div class="col-md-2 text-right">
            <a href="{{ route('cart.view') }}">
                <img src="{{ URL::asset('assets/images/cart.png') }}" alt="Cart" style="width: 50px; height: 50px;">
                <span class="badge badge-pill badge-danger">{{ session('cart') ? count(session('cart')) : 0 }}</span>
            </a>
        </div>
    </div>

    <div class="row justify-content-center">
        @foreach($products as $product)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img class="card-img-top" style="width: 100px; height: 100px;" src="{{ URL::asset('assets/images/' . $product->image) }}" alt="{{ $product->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ $product->description }}</p>
                        <p class="card-text"><strong>Price:</strong> ${{ $product->price }}</p>
                        <p class="card-text">Stock: {{ $product->stock }}</p>
                        <form action="{{ route('cart.add', $product->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="number" name="quantity" value="1" min="1" class="form-control" style="width: 60px; display: inline-block;">
                                <button type="submit" class="btn btn-primary">Add to Cart</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
