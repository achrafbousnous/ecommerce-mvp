@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-semibold mb-6">Products</h1>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach ($products as $p)
        <div class="bg-white rounded-lg shadow p-4">
            <div class="h-40 bg-gray-100 rounded flex items-center justify-center mb-4 overflow-hidden">
                @if ($p->image)
                    <img src="{{ Storage::url($p->image) }}" alt="{{ $p->name }}" class="h-full w-full object-cover">
                @else
                    <span class="text-gray-400 text-sm">No image</span>
                @endif
            </div>

            <h2 class="font-semibold text-lg">{{ $p->name }}</h2>
            <p class="text-sm text-gray-500">{{ $p->category ?? '—' }}</p>

            <p class="mt-2 font-bold">{{ $p->price }} MAD</p>

            <div class="mt-4 flex items-center justify-between">
                <a class="text-sm underline" href="{{ route('products.show', $p->id) }}">
                    View
                </a>

                <form method="POST" action="{{ route('cart.add', $p->id) }}">
                    @csrf
                    <button class="px-3 py-2 rounded bg-black text-white text-sm" type="submit">
                        Add to cart
                    </button>
                </form>
            </div>
        </div>
    @endforeach
</div>
@endsection
