@extends('layouts.admin')

@section('content')
<h1>Add Product</h1>

@if ($errors->any())
    <ul style="color:red;">
        @foreach ($errors->all() as $e)
            <li>{{ $e }}</li>
        @endforeach
    </ul>
@endif

<form method="POST" action="{{ route('admin.products.store') }}">
    @csrf

    <div>
        <label>Name</label><br>
        <input type="text" name="name" value="{{ old('name') }}" required>
    </div>

    <div>
        <label>Category</label><br>
        <input type="text" name="category" value="{{ old('category') }}">
    </div>

    <div>
        <label>Price (MAD)</label><br>
        <input type="number" step="0.01" name="price" value="{{ old('price') }}" required>
    </div>

    <div>
        <label>Image (URL or path)</label><br>
        <input type="text" name="image" value="{{ old('image') }}">
    </div>

    <div>
        <label>Description</label><br>
        <textarea name="description">{{ old('description') }}</textarea>
    </div>

    <br>
    <button type="submit">Create</button>
</form>

<p><a href="{{ route('admin.products.index') }}">← Back</a></p>
@endsection
