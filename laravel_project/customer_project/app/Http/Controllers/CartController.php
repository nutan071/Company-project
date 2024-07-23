<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Order;
use App\Models\Oder_items;
use Illuminate\Support\Facades\Auth;
use Psy\Readline\Hoa\Console;

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

    $method = 'Pay on Delivery';
    $grandTotal = $this->calculateCartTotal();


    $request->session()->forget('cart');

    return view('cart.thank_you', compact('method', 'grandTotal'));
}

public function processCOD(Request $request)
{

    $method = 'Cash on Delivery';
    $grandTotal = $this->calculateCartTotal();


    $request->session()->forget('cart');

    return view('cart.thank_you', compact('method', 'grandTotal'));
}

private function calculateCartTotal()
{
    print('hello');
    $cart = session('cart', []);
    return array_sum(array_map(function ($product) {
        return $product['quantity'] * $product['price'];
    }, $cart));
}




public function saveForLater($id)
{
    $cart = session()->get('cart', []);
    $saveForLater = session()->get('saveForLater', []);

    if(isset($cart[$id])) {
        $saveForLater[$id] = $cart[$id];
        unset($cart[$id]);
        session()->put('cart', $cart);
        session()->put('saveForLater', $saveForLater);
        return redirect()->route('cart.view')->with('success', 'Product saved for later!');
    }

    return redirect()->route('cart.view')->with('error', 'Product not found in cart!');
}

public function moveToCart($id)
{
    $cart = session()->get('cart', []);
    $saveForLater = session()->get('saveForLater', []);

    if(isset($saveForLater[$id])) {
        $cart[$id] = $saveForLater[$id];
        unset($saveForLater[$id]);
        session()->put('cart', $cart);
        session()->put('saveForLater', $saveForLater);
        return redirect()->route('cart.view')->with('success', 'Product moved to cart!');
    }

    return redirect()->route('cart.view')->with('error', 'Product not found in saved items!');
}





}

