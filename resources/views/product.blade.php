@extends('layouts.app')

@section('content')
<div class="bg-white rounded-lg shadow p-6">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="h-64 bg-gray-100 rounded flex items-center justify-center">
            <span class="text-gray-400 text-sm">No image</span>
        </div>

        <div>
            <h1 class="text-2xl font-semibold">{{ $product->name }}</h1>
            <p class="text-gray-500 mt-1">{{ $product->category ?? '—' }}</p>

            <p class="mt-4 text-xl font-bold">{{ $product->price }} MAD</p>

            <p class="mt-4 text-gray-700">
                {{ $product->description ?? 'No description.' }}
            </p>

            <div class="mt-6 flex items-center gap-4">
                <form method="POST" action="{{ route('cart.add', $product->id) }}">
                    @csrf
                    <button class="px-4 py-2 rounded bg-black text-white" type="submit">
                        Add to cart
                    </button>
                </form>

                <a class="underline" href="{{ route('products.index') }}">Back</a>
            </div>
        </div>
    </div>
</div>
@endsection
