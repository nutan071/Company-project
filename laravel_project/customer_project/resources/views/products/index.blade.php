
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @foreach($products as $product)
            <div class="col-md-4 mb-4">
                <div class="card" > 
                <img class="card-img-top " style=" width: 100px; height:100px   ; " src="{{ URL::asset('assets/images/' . $product->image)}}" alt="{{ $product->name }}">
                <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ $product->description }}</p>
                        <p class="card-text"><strong>Price:</strong> ${{ $product->price }}</p>
                        <p class="card-text">{{ $product->stock}}</p>
                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">View Product</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection


 




