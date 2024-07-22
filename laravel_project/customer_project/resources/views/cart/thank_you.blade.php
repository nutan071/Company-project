
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Thank You for Your Purchase</div>
                <div class="card-body">
                    <p>Your order has been successfully placed.</p>
                    <p>Payment Method: {{ $method }}</p>
                    <p onchange="calculateCartTotal()">Total Amount: ${{ $grandTotal }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
