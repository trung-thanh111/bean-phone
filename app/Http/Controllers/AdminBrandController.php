<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCatalogue;
use App\Models\Brand;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use Illuminate\Http\Request;


class AdminBrandController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        //khởi tạo 1 query
        $query = Brand::query();
        //nếu có từ khóa đc truyền vào thì -> where
        if ($keyword) {
            $query->where('name', 'like', '%' . $keyword . '%');
        }
        // nếu k có keyword -> paginate() bỏ qua where
        $brands = $query->paginate(8);
        $template = 'backend.brand.index';
        return view('backend.dashboard.layout', compact('template', 'brands'));
    }
    public function create() // nhận việc load dữ liệu ra view 
    {
        $brands = Brand::all();
        $productCatalogue = ProductCatalogue::all();
        $template = 'backend.brand.create';
        return view('backend.dashboard.layout', compact('template', 'brands', 'productCatalogue'));
    }
    public function store(StoreBrandRequest $request)
    {
        $payload = $request->all();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $file->move('upload/product/', $filename);
            $payload['image'] = $filename;
        }
        Brand::create($payload);
        return redirect()->route('admin.brands')->with('success', 'Thêm mới thương hiệu thành công!');
    }

    public function update($id) // chỉ nhận việc load dữ liệu ra view 
    {
        $brand = Brand::find($id);
        $productCatalogue = ProductCatalogue::all();
        $template = 'backend.brand.update';
        return view('backend.dashboard.layout', compact('template', 'brand', 'productCatalogue'));
    }
    public function edit($id = 0, UpdateBrandRequest $request)
    {
        $brand = Brand::find($id);
        $payload = $request->all();
        if ($request->hasFile('image')) {
            // Nhận file từ request
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            // Lưu file vào thư mục public/upload/product
            $file->move('upload/product/', $filename);
            $payload['image'] = $filename;
        } else {
            // lấy ảnh cũ khi người dùng k chọn ảnh mới
            $payload['image'] = $brand->image;
        }
        $brand->update($payload);
        return redirect()->route('admin.brands')->with('success', 'Cập nhật thương hiệu thành công!');
    }

    public function delete($id)
    {
        $brand = Brand::find($id);
        $template = 'backend.brand.delete';
        return view('backend.dashboard.layout', compact('template', 'brand'));
    }
    public function destroy($id = 0)
    {
        $brand = Brand::withTrashed()->find($id); // tìm id từ cả product và trong trash
        $brand->forceDelete(); // xóa cứng ra khỏi dữ liệu
        return redirect()->route('admin.brands')->with('success', 'Xóa thành công thương hiệu!');
    }
    public function softDelete($id = 0)
    {
        $product = Product::find($id);
        $product->delete(); // Xóa mềm , di chuyển vào trash
        return redirect()->route('admin.brands')->with('success', 'Xóa thành công thương hiệu!');
    }
}
