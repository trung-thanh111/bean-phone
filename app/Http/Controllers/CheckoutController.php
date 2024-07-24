<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request\CheckoutRequest;
use App\Models\Order;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index(){

        $order = Order::where('user_id', auth()->id())
            ->where('status', 'pending')
            ->with('orderItems.product')
            ->first();
        $template = 'fontend.cart.checkout';
        return view('fontend.index.layout', compact('template', 'order'));
    }
    public function confirm(Request $request)
    {
        $order = Order::where('user_id', auth()->id())
            ->where('status', 'pending')
            ->with('orderItems.product')
            ->first();

        if (!$order) {
            return redirect()->route('cart.index')->with('error', 'Giỏ hàng của bạn trống.');
        }

        $payload = $request->all();
        $payload['status'] = 'confirm';

        $order->update($payload);
        $template = 'fontend.cart.checkout';
        return redirect()->route('checkout.thanks')->with('success', 'Đặt hàng thành công!');
    }
    public function thanks(){
        $template = 'fontend.cart.thanks';
        return view('fontend.index.layout', compact('template'));
    }

    
}
