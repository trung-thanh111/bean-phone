<?php

namespace App\Http\Controllers;

// use Laracasts\Flash\Flash;// thư viện thông báo flash
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Order;

class CartController extends Controller
{
    public function index()
    {
        $order = Order::where('user_id', auth()->id())
            ->where('status', 'pending')
            ->with('orderItems.product')
            ->first();

        if (!$order) {
            $order = new Order(['total' => 0]);
        }
        $template = 'fontend.cart.index';
        return view('fontend.index.layout', compact('template', 'order'));
    }
    public function store(Request $request)
    {
        // Tìm hoặc tạo mới đơn hàng của người dùng
        $order = Order::firstOrCreate(
            ['user_id' => auth()->id(), 'status' => 'pending'],
            ['total' => 0]
        );
        // Tìm hoặc tạo mới orderItem
        $orderItem = $order->orderItems()->updateOrCreate(
            ['product_id' => $request->product_id],
            ['price' => $request->price]
        );
        // Nếu orderItem đã tồn tại, cập nhật số lượng
        if ($orderItem->exists) {
            $orderItem->quantity += $request->quantity;
            $orderItem->save();
        } else {
            // Nếu orderItem chưa tồn tại, tạo mới và gán số lượng
            $orderItem->quantity = $request->quantity;
            $orderItem->save();
        }
        // tính tổng đơn hàng
        $order->total += ($request->quantity * $request->price);
        $order->save(); // Lưu đơn hàng
        return back()->with('success', 'Đã thêm vào giỏ hàng thành công!');
    }
    public function update(Request $request)
    {
        // Lấy đơn hàng của người dùng hiện tại với trạng thái "pending"
        $order = Order::where('user_id', auth()->id())->where('status', 'pending')->first();

        if ($order) {
            // Duyệt qua từng item trong giỏ hàng từ request
            foreach ($request->items as $item) {
                // Tìm từng order item trong cơ sở dữ liệu
                $orderItem = $order->orderItems()->where('id', $item['id'])->first();
                if ($orderItem) {
                    // Cập nhật số lượng
                    $orderItem->quantity = $item['quantity'];
                    $orderItem->save();
                }
            }
            // Cập nhật lại tổng tiền
            $order->total = $order->orderItems->sum(function ($orderItem) {
                return $orderItem->quantity * $orderItem->price;
            });
            $order->save();
        }
        return back()->with('success', 'Cập nhật thành công giỏ hàng');
    }
    public function destroy($id = 0)
    {
        // Lấy đơn hàng của người dùng hiện tại với trạng thái "pending"
        $order = Order::where('user_id', auth()->id())->where('status', 'pending')->first();

        if ($order) {
            // Tìm orderItem cần xóa
            $orderItem = $order->orderItems()->where('id', $id)->first();


            if ($orderItem) {
                // Cập nhật lại tổng tiền
                $order->total -= ($orderItem->quantity * $orderItem->price);
                $orderItem->delete(); // Xóa orderItem
                $order->save();
            }
        }
        return back()->with('success', 'Xóa thành công sản phẩm!');
    }

    public function clear()
    {
        $order = Order::where('user_id', auth()->id())->where('status', 'pending')->first();
        if ($order) {
            $order->orderItems()->delete(); // Xóa tất cả orderItems
            $order->total = 0;
            $order->save();
        }
        return back()->with('success', 'Xóa thành công giỏ hàng!');
    }
}
