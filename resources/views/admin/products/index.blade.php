@extends('layouts.admin')

@section('content')
  <h1>Admin - Products</h1>

  @if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
  @endif

  <p>
    <a href="{{ route('admin.products.create') }}">+ Add new product</a>
  </p>

  @if($products->isEmpty())
    <p>No products.</p>
  @else
    <table border="1" cellpadding="8">
      <thead>
          <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Category</th>
              <th>Price</th>
              <th>Actions</th>
          </tr>
      </thead>
      <tbody>
          @foreach($products as $p)
              <tr>
                  <td>{{ $p->id }}</td>
                  <td>{{ $p->name }}</td>
                  <td>{{ $p->category ?? '—' }}</td>
                  <td>{{ $p->price }} MAD</td>
                  <td>
                      <a href="{{ route('admin.products.edit', $p->id) }}">Edit</a>

                      <form method="POST" action="{{ route('admin.products.destroy', $p->id) }}" style="display:inline;">
                          @csrf
                          @method('DELETE')
                          <button type="submit" onclick="return confirm('Delete this product?')">
                              Delete
                          </button>
                      </form>
                  </td>
              </tr>
          @endforeach
      </tbody>
    </table>
  @endif
@endsection
