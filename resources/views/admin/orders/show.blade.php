@extends('layouts.admin')

@section('content')
<h1>Order #{{ $order->id }}</h1>

@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<p><strong>Name:</strong> {{ $order->name }}</p>
<p><strong>Phone:</strong> {{ $order->phone }}</p>
<p><strong>Address:</strong> {{ $order->address }}</p>
<div class="order-status">
    <strong>Status:</strong> 
    <form method="POST" action="{{ route('admin.orders.status', $order->id) }}">
        @csrf
        @method('PUT')

        <select name="status" onchange="this.form.submit()">
            <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>pending</option>
            <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>shipped</option>
            <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>cancelled</option>
        </select>
    </form>
</div>


<p><strong>Total:</strong> {{ $order->total }} MAD</p>

<hr>

<h3>Items</h3>

@if($order->items->isEmpty())
    <p>No items.</p>
@else
    <table border="1" cellpadding="8">
        <thead>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Qty</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order->items as $it)
                <tr>
                    <td>{{ $it->product_name }}</td>
                    <td>{{ $it->price }} MAD</td>
                    <td>{{ $it->qty }}</td>
                    <td>{{ $it->price * $it->qty }} MAD</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif

<p><a href="{{ route('admin.orders.index') }}">← Back to orders</a></p>
@endsection
