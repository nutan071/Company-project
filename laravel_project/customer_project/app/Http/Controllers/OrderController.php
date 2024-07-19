<?php 
namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function placeOrder(Request $request)
    {
        $cart = Session::get('cart', []);
    
        if (empty($cart)) {
            return redirect()->back()->with('error', 'Your cart is empty.');
        }
    
        $totalAmount = array_reduce($cart, function ($sum, $product) {
            return $sum + ($product['price'] * $product['quantity']);
        }, 0);
    
        $order = Order::create([
            'user_id' => Auth::id(),
            'total_price' => $totalAmount,
            'status' => 'pending',
        ]);
    
        foreach ($cart as $productId => $product) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $productId,
                'quantity' => $product['quantity'],
                'price' => $product['price'],
            ]);
        }
    
        Session::forget('cart');
    
        return redirect()->route('user.dashboard')->with('success', 'Order placed successfully!');
    }
    

    public function index()
    {
        $orders = Auth::user()->orders;
        return view('orders.index', compact('orders')); 
    }

    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }
}
