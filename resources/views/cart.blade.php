@extends('layouts.app')

@section('content')

  <h1>Cart</h1>

  @if (empty($cart))
      <p>Your cart is empty.</p>
      <a href="{{ route('products.index') }}">Go shopping</a>
  @else
    <ul>
      @foreach ($cart as $item)
        <li>
          {{ $item['name'] }} —
          {{ $item['price'] }} MAD × {{ $item['qty'] }}
          = {{ $item['price'] * $item['qty'] }} MAD

          <form method="POST" action="{{ route('cart.remove', $item['id']) }}" style="display:inline;">
            @csrf
            <button type="submit">Remove</button>
          </form>
        </li>
      @endforeach
    </ul>

    <hr>
    <p><strong>Total:</strong> {{ $total }} MAD</p>

    <a href="{{ route('checkout') }}">Go to checkout</a>
  @endif

@endsection