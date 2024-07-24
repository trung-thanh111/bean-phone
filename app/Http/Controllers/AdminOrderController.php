<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Brand;
use App\Models\Order;
use App\Models\OrderItem;
use Carbon\Carbon as Carbon;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        $query = Order::with('users');
        if ($keyword) {
            $query->where('id', 'like', '%' . $keyword . '%');
        }
        $orders = $query->where('status', '!=', 'pending')->paginate(15);
        $confirms = $query->where('status', '=', 'confirm')->paginate(15);
        $tranports = $query->where('status', '=', 'tranport')->paginate(15);
        $delivered = $query->where('status', '=', 'delivered')->paginate(15);
        $cancel = $query->where('status', '=', 'cancel')->paginate(15);
        $template = 'backend.order.index';
        return view('backend.dashboard.layout', compact('template', 'orders', 'confirms', 'tranports', 'delivered', 'cancel'));
    }
    public function detail($id = 0)
    {
        $productInOrder = OrderItem::with('product')->where('order_id', '=', $id)->get();
        $orderDetail = OrderItem::with('product')->where('order_id', '=', $id)->first();
        $template = 'backend.order.detail';
        return view('backend.dashboard.layout', compact('template', 'productInOrder', 'orderDetail'));
    }
    public function create()
    {
        $brands = Brand::all();
        $template = 'backend.product.create';
        return view('backend.dashboard.layout', compact('template', 'categories', 'brands'));
    }
    public function store(Request $request)
    {

        $payload = $request->all();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $file->move('upload/order/', $filename);
            $payload['image'] = $filename;
        }
        Order::create($payload);
        return redirect()->route('admin.product')->with('success', 'Thêm mới sản phẩm thành công!');
    }

    public function update($id)
    {
        $product = Order::find($id);
        $brands = Brand::all();
        $template = 'backend.product.update';
        return view('backend.dashboard.layout', compact('template', 'categories', 'brands', 'product'));
    }
    public function edit($id = 0, Request $request)
    {
        $product = Order::find($id);
        $payload = $request->all();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $file->move('upload/order/', $filename);
            $payload['image'] = $filename;
        } else {
            $payload['image'] = $product->image;
        }
        $product->update($payload);
        return redirect()->route('admin.product')->with('success', 'Cập nhật sản phẩm thành công!');
    }

    public function delete($id)
    {
        $order = Order::find($id);
        $template = 'backend.order.delete';
        return view('backend.dashboard.layout', compact('template', 'order'));
    }
    public function destroy($id = 0)
    {
        $timeAllowed = Carbon::now()->subDays(30);
        $order = Order::withTrashed()
            ->find($id);
        if (!$order) {
            return redirect()->route('order.delete', ['id' => $id])->with('warning', 'Không tìm thấy đơn hàng!');
        }
        if ($order['created_at'] > $timeAllowed) {
            return redirect()->route('order.delete', ['id' => $id])->with('warning', 'Đơn hàng gần đây bạn không thể xóa!');
        }
        if ($order['status'] == 'confirm' || $order['status'] == 'transport') {
            return redirect()->route('order.delete', ['id' => $id])->with('warning', 'Đơn hàng đang hiện hành không thể xóa!');
        }
        $order->forceDelete();
        return redirect()->route('admin.orders')->with('success', 'Xóa thành công sản phẩm!');
    }

    public function softDelete($id = 0)
    {
        $order = Order::find($id);
        $order->delete();
        return redirect()->route('admin.orders')->with('success', 'Xóa thành công sản phẩm!');
    }
}
