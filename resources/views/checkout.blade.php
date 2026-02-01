@extends('layouts.app')

@section('content')
  <h1>Checkout</h1>

  <h3>Order summary</h3>
  <ul>
      @foreach ($cart as $item)
          <li>
              {{ $item['name'] }} —
              {{ $item['qty'] }} × {{ $item['price'] }} MAD
          </li>
      @endforeach
  </ul>

  <p><strong>Total:</strong> {{ $total }} MAD</p>

  <hr>

  <form method="POST" action="{{ route('checkout.store') }}">
      @csrf

      <div>
          <label>Name</label><br>
          <input type="text" name="name" required>
      </div>

      <div>
          <label>Phone</label><br>
          <input type="text" name="phone" required>
      </div>

      <div>
          <label>Address</label><br>
          <textarea name="address" required></textarea>
      </div>

      <br>
      <button type="submit">Confirm order</button>
  </form>

@endsection
