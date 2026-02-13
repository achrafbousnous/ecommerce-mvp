@extends('layouts.admin')

@section('content')
<h1>Edit Product #{{ $product->id }}</h1>

@if ($errors->any())
    <ul style="color:red;">
        @foreach ($errors->all() as $e)
            <li>{{ $e }}</li>
        @endforeach
    </ul>
@endif

<form method="POST" action="{{ route('admin.products.update', $product->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div>
        <label>Name</label><br>
        <input type="text" name="name" value="{{ old('name', $product->name) }}" required>
    </div>

    <div>
        <label>Category</label><br>
        <input type="text" name="category" value="{{ old('category', $product->category) }}">
    </div>

    <div>
        <label>Price (MAD)</label><br>
        <input type="number" step="0.01" name="price" value="{{ old('price', $product->price) }}" required>
    </div>

    <div>
        <label>Image</label><br>
        <input type="file" name="image" accept="image/*">
    </div>

    <div>
        <label>Description</label><br>
        <textarea name="description">{{ old('description', $product->description) }}</textarea>
    </div>

    <br>
    <button type="submit">Save</button>
</form>

<p><a href="{{ route('admin.products.index') }}">← Back</a></p>
@endsection
