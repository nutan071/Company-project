<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addItem(Request $request, $id)
    {
        $product = Products::findOrFail($id);
        $quantity = $request->input('quantity', 1);

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += $quantity;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => $quantity,
                "price" => $product->price,
                "image" => $product->image
            ];
        }

        session()->put('cart', $cart);

        return redirect()->route('cart.view')->with('success', 'Product added to cart successfully!');
    }

    public function view()
    {
        return view('cart.view');
    }

    public function remove($id)
    {
        $cart = session('cart');
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        return redirect()->route('cart.view')->with('success', 'Product removed from cart successfully!');
    }

    public function processPOD(Request $request)
    {
        $cart = session('cart');
        if (!$cart) {
            return redirect()->route('cart.view')->with('error', 'Your cart is empty.');
        }

        $order = new Order();
        $order->user_id = Auth::id();
        $order->total_price = array_sum(array_map(function ($product) {
            return $product['price'] * $product['quantity'];
        }, $cart));
        $order->status = 'pending';
        $order->save();

        foreach ($cart as $id => $details) {
            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->product_id = $id;
            $orderItem->quantity = $details['quantity'];
            $orderItem->price = $details['price'];
            $orderItem->save();
        }

        session()->put('purchased', $cart);
        session()->forget('cart');

        return view('cart.thank-you', ['method' => 'POD', 'cart' => $cart, 'grandTotal' => $order->total_price]);
    }

    public function processCOD(Request $request)
    {
        $cart = session('cart');
        if (!$cart) {
            return redirect()->route('cart.view')->with('error', 'Your cart is empty.');
        }

        $order = new Order();
        $order->user_id = Auth::id();
        $order->total_price = array_sum(array_map(function ($product) {
            return $product['price'] * $product['quantity'];
        }, $cart));
        $order->status = 'pending';
        $order->save();

        foreach ($cart as $id => $details) {
            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->product_id = $id;
            $orderItem->quantity = $details['quantity'];
            $orderItem->price = $details['price'];
            $orderItem->save();
        }

        session()->put('purchased', $cart);
        session()->forget('cart');

        return view('cart.thank-you', ['method' => 'COD', 'cart' => $cart, 'grandTotal' => $order->total_price]);
    }
}
