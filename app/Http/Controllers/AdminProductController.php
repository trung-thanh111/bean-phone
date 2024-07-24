<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCatalogue;
use App\Models\Brand;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        $query = Product::query();
        if ($keyword) {
            $query->where('title', 'LIKE', '%' . $keyword . '%');
        }
        $products = $query->with('ProductCatalogue')->paginate(15);
        $template = 'backend.product.index';
        return view('backend.dashboard.layout', compact('template', 'products'));
    }
    public function create() // nhận việc load dữ liệu ra view 
    {
        $categories = ProductCatalogue::all();
        $brands = Brand::all();
        $template = 'backend.product.create';
        return view('backend.dashboard.layout', compact('template', 'categories', 'brands'));
    }
    public function store(StoreProductRequest $request)
    {

        $payload = $request->all();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $file->move('upload/product/', $filename);
            $payload['image'] = $filename;
        }
        Product::create($payload);
        return redirect()->route('admin.product')->with('success', 'Thêm mới sản phẩm thành công!');
    }

    public function update($id)  
    {
        $product = Product::find($id);
        $categories = ProductCatalogue::all();
        $brands = Brand::all();
        $template = 'backend.product.update';
        return view('backend.dashboard.layout', compact('template', 'categories', 'brands', 'product'));
    }
    public function edit($id = 0, UpdateProductRequest $request)
    {
        $product = Product::find($id);
        $payload = $request->all();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $file->move('upload/product/', $filename);
            $payload['image'] = $filename;
        } else {
            $payload['image'] = $product->image;
        }
        $product->update($payload);
        return redirect()->route('admin.product')->with('success', 'Cập nhật sản phẩm thành công!');
    }

    public function delete($id)
    {
        $product = Product::find($id);
        $template = 'backend.product.delete';
        return view('backend.dashboard.layout', compact('template', 'product'));
    }
    public function destroy($id = 0)
    {
        $product = Product::withTrashed()->find($id); 
        $product->forceDelete();
        return redirect()->route('admin.product')->with('success', 'Xóa thành công sản phẩm!');
    }
    public function softDelete($id = 0)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('admin.product')->with('success', 'Xóa thành công sản phẩm!');
    }
}
