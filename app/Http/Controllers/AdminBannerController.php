<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreBannerRequest;
use App\Http\Requests\UpdateBannerRequest;
use App\Models\Banner;
use Illuminate\Http\Request;


class AdminBannerController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        $query = Banner::query();
        if ($keyword) {
            $query->where('title', 'like', '%' . $keyword . '%');
        }
        $banners = $query->paginate(8);
        $template = 'backend.banner.index';
        return view('backend.dashboard.layout', compact('template', 'banners'));
    }
    public function create()
    {
        $banners = Banner::all();
        $template = 'backend.banner.create';
        return view('backend.dashboard.layout', compact('template', 'banners'));
    }
    public function store(Request $request)
    {
        $payload = $request->all();
        if ($request->hasFile('albums')) {
            $filenames = [];
            foreach ($request->file('albums') as $file) {
                $filename = $file->getClientOriginalName();
                $file->move('upload/banner/', $filename);
                $filenames[] = $filename;
            }
            //chuyển thành json để upleen csdl
            $payload['albums'] = json_encode($filenames);
        }
        // dd($payload);
        Banner::create($payload);
        return redirect()->route('admin.banners')->with('success', 'Thêm mới banner thành công!');
    }

    public function update($id)
    {
        $banner = Banner::find($id);
        if (!$banner) {
            return redirect()->route('admin.banners')->with('error', 'Banner không tồn tại!');
        }
        $template = 'backend.banner.update';
        return view('backend.dashboard.layout', compact('template', 'banner'));
    }
    public function edit($id, UpdateBannerRequest $request)
    {
        $banner = Banner::find($id);
        if (!$banner) {
            return redirect()->route('admin.banners')->with('error', 'Banner không tồn tại!');
        }
        $payload = $request->except('albums');
        if ($request->hasFile('albums')) {
            $filenames = [];
            foreach ($request->file('albums') as $file) {
                $filename = $file->getClientOriginalName();
                $file->move('upload/banner/', $filename);
                $filenames[] = $filename;
            }
            $payload['albums'] = json_encode($filenames);
        } else {
            $payload['albums'] = $banner->albums;
        }
        $banner->update($payload);

        return redirect()->route('admin.banners')->with('success', 'Cập nhật banner thành công!');
    }



    public function delete($id)
    {
        $banner = Banner::find($id);
        $template = 'backend.banner.delete';
        return view('backend.dashboard.layout', compact('template', 'banner'));
    }
    public function destroy($id = 0)
    {
        $banner = Banner::withTrashed()->find($id);
        $banner->forceDelete();
        return redirect()->route('admin.banners')->with('success', 'Xóa thành công banner sự kiện!');
    }
    public function softDelete($id = 0)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('admin.banners')->with('success', 'Xóa thành công banner sự kiện!');
    }
}
