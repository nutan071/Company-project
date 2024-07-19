@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <img class="card-img-top" style=" width: 200px; " src="{{ asset('assets/images/' . $product->image ) }}" alt="{{ $product->name }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text">{{ $product->description }}</p>
                    <p class="card-text"><strong>Price:</strong> ${{ $product->price }}</p>
                    <form action="{{ route('cart.addItem', $product->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="quantity">Quantity</label>
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-secondary" onclick="changeQuantity(-1)">-</button>
                                </span>
                                <input type="number" name="quantity" id="quantity" class="form-control" value="1" min="1" required>
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-secondary" onclick="changeQuantity(1)">+</button>
                                </span>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Add to Cart</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function changeQuantity(amount) {
        var quantity = document.getElementById('quantity');
        var newQuantity = parseInt(quantity.value) + amount;
        if (newQuantity > 0) {
            quantity.value = newQuantity;
        }
    }
</script>
@endsection
