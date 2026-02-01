<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session('cart', []);
        $total = 0;

        foreach ($cart as $item) {
            $total += $item['price'] * $item['qty'];
        }

        if (empty($cart)) {
            return redirect()->route('products.index');
        }

        return view('checkout', compact('cart', 'total'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);

        $cart = session('cart', []);

        if (empty($cart)) {
            return redirect()->route('products.index');
        }

        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['qty'];
        }

        // Create order
        $order = Order::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'total' => $total,
            'status' => 'pending',
        ]);

        // Create order items
        foreach ($cart as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['id'] ?? null,
                'product_name' => $item['name'],
                'price' => $item['price'],
                'qty' => $item['qty'],
            ]);
        }

        // Clear cart
        session()->forget('cart');

        return redirect()->route('products.index')
            ->with('success', 'Order saved! Order #' . $order->id);
    }
}
