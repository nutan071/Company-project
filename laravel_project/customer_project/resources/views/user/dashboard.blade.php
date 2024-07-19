@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">User Dashboard</div>
                <div class="card-body">
                    <p>Welcome, {{ Auth::user()->name }}!</p>
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Purchase Products</h5>
                                    <p class="card-text">Browse and purchase products.</p>
                                    <a href="{{ route('products.index') }}" class="btn btn-primary">View Products</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Manage Orders</h5>
                                    <p class="card-text">View and manage your orders.</p>
                                    <a href="#" class="btn btn-primary">View Orders</a>
                                </div>
                            </div>
                        </div>
                    </div>
dfkoritreiteritopertieroiteroptiertieroptieropip
                    <div class="mt-4">
                        <h2>All Products</h2>
                        <div class="row">
                        @foreach($products as $product)
                            <div class="col-md-4 mb-4">
                                <div class="card">
                                    <img class="card-img-top" src="{{ URL::asset('assets/images/' . $product->image) }}" alt="{{ $product->name }}">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $product->name }}</h5>
                                        <p class="card-text">{{ $product->description }}</p>
                                        <p class="card-text">${{ $product->price }}</p>
                                        <p class="card-text">{{ $product->stock }} in stock</p>
                                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">View Product</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
ijrurtoreutoretuertuerotueroitueiortueriotuoltjerteitueuteputerptueprtuerotuerpotipetiopeiteiteroptieptipe