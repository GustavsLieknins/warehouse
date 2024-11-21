@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ isset($product) ? 'Edit Product' : 'Add Product' }}</h1>
    
    <form action="{{ isset($product) ? route('products.update', $product->id) : route('products.store') }}" method="POST">
        @csrf
        @if(isset($product))
            @method('PUT')
        @endif

        <!-- Product Name -->
        <div class="mb-3">
            <label for="name" class="form-label">Product Name</label>
            <input type="text" name="name" id="name" class="form-control" 
                   value="{{ old('name', $product->name ?? '') }}" required>
        </div>

        <!-- Product Title -->
        <div class="mb-3">
            <label for="title" class="form-label">Product Title</label>
            <input type="text" name="title" id="title" class="form-control" 
                   value="{{ old('title', $product->title ?? '') }}" required>
        </div>

        <!-- Category -->
        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <select name="category_id" id="category_id" class="form-select" required>
                <option value="" disabled selected>Select a category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" 
                            {{ old('category_id', $product->category_id ?? '') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Transaction Type -->
        <div class="mb-3">
            <label for="transaction_id" class="form-label">Transaction Type</label>
            <select name="transaction_id" id="transaction_id" class="form-select" required>
                <option value="" disabled selected>Select a transaction type</option>
                @foreach($transactions as $transaction)
                    <option value="{{ $transaction->id }}" 
                            {{ old('transaction_id', $product->transaction_id ?? '') == $transaction->id ? 'selected' : '' }}>
                        {{ $transaction->type }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Status -->
        <div class="mb-3">
            <label for="status_id" class="form-label">Status</label>
            <select name="status_id" id="status_id" class="form-select" required>
                <option value="" disabled selected>Select a status</option>
                @foreach($statuses as $status)
                    <option value="{{ $status->id }}" 
                            {{ old('status_id', $product->status_id ?? '') == $status->id ? 'selected' : '' }}>
                        {{ $status->status }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Quantity -->
        <div class="mb-3">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="number" name="quantity" id="quantity" class="form-control" 
                   value="{{ old('quantity', $product->quantity ?? '') }}" required>
        </div>

        <!-- Price -->
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" name="price" id="price" class="form-control" 
                   value="{{ old('price', $product->price ?? '') }}" required>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">
            {{ isset($product) ? 'Update Product' : 'Add Product' }}
        </button>
    </form>
</div>
@endsection
