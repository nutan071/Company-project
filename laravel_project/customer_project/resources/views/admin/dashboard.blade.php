frretrte

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin Dashboard</div>

                <div class="card-body">
                    <p>Welcome, {{ Auth::user()->name }}!</p>
                    <p>Manage Products:</p>
                    <ul>
                        <li><a href="{{ route('admin.products.index') }}">View Products</a></li>
                        <li><a href="{{ route('admin.products.create') }}">Add Product</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

