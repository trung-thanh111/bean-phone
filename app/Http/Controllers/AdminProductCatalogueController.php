<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCatalogue;
use App\Models\Brand;
use App\Http\Requests\StoreProductCatalogueRequest;
use App\Http\Requests\UpdateProductCatalogueRequest;
use Illuminate\Http\Request;

class AdminProductCatalogueController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        $query = ProductCatalogue::query();
        if ($keyword) {
            $query->where('name', 'LIKE', '%' . $keyword . '%');
        }
        $productCatalogues = $query->paginate(10);
        $template = 'backend.productcatalogue.index';
        return view('backend.dashboard.layout', compact('template', 'productCatalogues'));
    }
    public function create() // nhận việc load dữ liệu ra view 
    {
        $categories = ProductCatalogue::all();
        $template = 'backend.productcatalogue.create';
        return view('backend.dashboard.layout', compact('template', 'categories'));
    }
    public function store(StoreProductCatalogueRequest $request)
    {
        $payload = $request->all(); // nhận tất cả dữ liệu từ request
        if ($request->hasFile('image')) {
            // Nhận file từ request
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            // Lưu file vào thư mục public/upload/product
            $file->move('upload/product/', $filename);
            $payload['image'] = $filename;
        }
        ProductCatalogue::create($payload); // tạo sản phẩm
        return redirect()->route('admin.product.catalogues')->with('success', 'Thêm mới nhóm sản phẩm thành công!');
    }

    public function update($id) // chỉ nhận việc load dữ liệu ra view 
    {
        $productCatalogue = ProductCatalogue::find($id);
        $categories = ProductCatalogue::all();
        $template = 'backend.productcatalogue.update';
        return view('backend.dashboard.layout', compact('template', 'categories', 'productCatalogue'));
    }
    public function edit($id = 0, UpdateProductCatalogueRequest $request)
    {
        $productCatalogue = ProductCatalogue::find($id);
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
            $payload['image'] = $productCatalogue->image;
        }
        $productCatalogue->update($payload);
        return redirect()->route('admin.product.catalogues')->with('success', 'Cập nhật nhóm sản phẩm thành công!');
    }

    public function delete($id)
    {
        $productCatalogue = ProductCatalogue::find($id);
        $template = 'backend.productcatalogue.delete';
        return view('backend.dashboard.layout', compact('template', 'productCatalogue'));
    }
    public function destroy($id = 0)
    {
        $productCatalogue = ProductCatalogue::withTrashed()->find($id); // tìm id từ cả product và trong trash
        $productCatalogue->forceDelete(); // xóa cứng ra khỏi dữ liệu
        return redirect()->route('admin.product.catalogues')->with('success', 'Xóa thành công nhóm sản phẩm!');
    }
    public function softDelete($id = 0)
    {
        $product = Product::find($id);
        $product->delete(); // Xóa mềm , di chuyển vào trash
        return redirect()->route('admin.product.catalogues')->with('success', 'Xóa thành công nhóm sản phẩm!');
    }
}
