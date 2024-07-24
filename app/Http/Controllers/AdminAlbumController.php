<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAlbumRequest;
use App\Models\Product;
use App\Http\Requests\UpdateAlbumRequest;
use App\Models\AlbumProduct;
use Illuminate\Http\Request;


class AdminAlbumController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        $query = AlbumProduct::query();
        if ($keyword) {
            $query->where('product_id', 'like', '%' . $keyword . '%');
        }
        $albums = $query->paginate(8);
        $template = 'backend.album.index';
        return view('backend.dashboard.layout', compact('template', 'albums'));
    }
    public function create()
    {
        $products = Product::all();
        $template = 'backend.album.create';
        return view('backend.dashboard.layout', compact('template', 'products'));
    }
    public function store(StoreAlbumRequest $request)
    {
        $payload = $request->all();
        if (count($request->file('albums')) != 0) {
            if ($request->hasFile('albums')) {
                $fileCount = count($request->file('albums'));
                if ($fileCount > 0 && $fileCount <= 3) {
                    $filenames = [];
                    foreach ($request->file('albums') as $file) {
                        $filename = $file->getClientOriginalName();
                        $file->move('upload/product/', $filename);
                        $filenames[] = $filename;
                    }
                    // Chuyển thành JSON để upload lên cơ sở dữ liệu
                    $payload['albums'] = json_encode($filenames);
                } else {
                    return redirect()->back()->with('error', 'Số lượng ảnh cho phép từ 1 đến 3 ảnh.');
                }
            } else {
                return redirect()->back()->with('error', 'Không có ảnh được chọn.');
            }
        } else {
            return redirect()->back()->with('error', 'Không có ảnh được chọn.');
        }
        AlbumProduct::create($payload);
        return redirect()->route('admin.albums')->with('success', 'Thêm mới album thành công!');
    }

    public function update($id)
    {
        $album = AlbumProduct::find($id);
        $products = Product::all();
        if (!$album) {
            return redirect()->route('admin.albums')->with('error', 'Album không tồn tại!');
        }
        $template = 'backend.album.update';
        return view('backend.dashboard.layout', compact('template', 'album', 'products'));
    }
    public function edit($id, UpdateAlbumRequest $request)
    {
        $album = AlbumProduct::find($id);
        if (!$album) {
            return redirect()->route('admin.albums')->with('error', 'album không tồn tại!');
        }
        $payload = $request->except('albums');
        if ($request->hasFile('albums')) {
            $fileCount = count($request->file('albums'));
            if ($fileCount > 0 && $fileCount <= 3) {
                $filenames = [];
                foreach ($request->file('albums') as $file) {
                    $filename = $file->getClientOriginalName();
                    $file->move('upload/product/', $filename);
                    $filenames[] = $filename;
                }
                // Chuyển thành JSON để upload lên cơ sở dữ liệu
                $payload['albums'] = json_encode($filenames);
            } else {
                return redirect()->back()->with('error', 'Số lượng ảnh cho phép từ 1 đến 3 ảnh.');
            }
        } else {
            $payload['albums'] = $album->albums;
        }
        $album->update($payload);
        return redirect()->route('admin.albums')->with('success', 'Cập nhật album thành công!');
    }

    public function delete($id)
    {
        $album = AlbumProduct::find($id);
        $template = 'backend.album.delete';
        return view('backend.dashboard.layout', compact('template', 'album'));
    }
    public function destroy($id = 0)
    {
        $album = AlbumProduct::withTrashed()->find($id);
        $album->forceDelete();
        return redirect()->route('admin.albums')->with('success', 'Xóa thành công album sự kiện!');
    }
}
