@extends('layouts.admin')

@section('content')
<h1>Orders</h1>

@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

@if($orders->isEmpty())
<p>No orders yet.</p>
@else
<table border="1" cellpadding="8">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Total</th>
            <th>Status</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>
        @foreach($orders as $o)
        <tr>
            <td>
                <a href="{{ route('admin.orders.show', $o->id) }}">#{{ $o->id }}</a>
            </td>
            <td>{{ $o->name }}</td>
            <td>{{ $o->phone }}</td>
            <td>{{ $o->total }} MAD</td>
            <td>
                <form method="POST" action="{{ route('admin.orders.status', $o->id) }}">
                    @csrf
                    @method('PUT')

                    <select name="status" onchange="this.form.submit()">
                        <option value="pending" {{ $o->status == 'pending' ? 'selected' : '' }}>pending</option>
                        <option value="shipped" {{ $o->status == 'shipped' ? 'selected' : '' }}>shipped</option>
                        <option value="cancelled" {{ $o->status == 'cancelled' ? 'selected' : '' }}>cancelled</option>
                    </select>
                </form>
            </td>
            <td>{{ $o->created_at->format('Y-m-d H:i') }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif
@endsection