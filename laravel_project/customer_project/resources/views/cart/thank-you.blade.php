@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Thank You!</div>
                <div class="card-body">
                    <p>Your order has been processed using {{ $method }}.</p>
                    <h4>Total: ${{ $grandTotal }}</h4>
                    <a href="{{ route('products.index') }}" class="btn btn-primary">Continue Shopping</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
