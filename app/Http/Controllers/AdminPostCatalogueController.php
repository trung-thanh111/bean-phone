<?php

namespace App\Http\Controllers;

use App\Models\PostCatalogue;
use App\Http\Requests\StorePostCatalogueRequest;
use App\Http\Requests\UpdatePostCatalogueRequest;
use Illuminate\Http\Request;

class AdminPostCatalogueController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        $query = PostCatalogue::query();
        if($keyword){ 
            $query->where('name', 'LIKE', '%'.$keyword.'%');
        }
        $postCatalogues = $query->paginate(10);
        $template = 'backend.postcatalogue.index';
        return view('backend.dashboard.layout', compact('template', 'postCatalogues'));
    }
    public function create() 
    {
        $postCatalogue = PostCatalogue::all();
        $template = 'backend.postcatalogue.create';
        return view('backend.dashboard.layout', compact('template', 'postCatalogue'));
    }
    public function store(StorePostCatalogueRequest $request)
    {
        $payload = $request->all(); 
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $file->move('upload/post/', $filename);
            $payload['image'] = $filename;
        }
        PostCatalogue::create($payload);
        return redirect()->route('admin.post.catalogues')->with('success', 'Thêm mới nhóm bài viết thành công!');
    }

    public function update($id)
    {
        $postCatalogue = PostCatalogue::find($id);
        $template = 'backend.postcatalogue.update';
        return view('backend.dashboard.layout', compact('template', 'postCatalogue'));
    }
    public function edit($id = 0, UpdatePostCatalogueRequest $request)
    {
        $postCatalogue = PostCatalogue::find($id);
        $payload = $request->all();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $file->move('upload/post/', $filename);
            $payload['image'] = $filename;
        } else {
            $payload['image'] = $postCatalogue->image;
        }
        // $newOrder = $request->input('order');
        // $existingPost = PostCatalogue::where('order', $newOrder)->first();

        // if ($existingPost && $existingPost->id != $postCatalogue->id) {
        //     // Hoán đổi giá trị order của hai bài viết
        //     $existingPost->update(['order' => $postCatalogue->order]);
        // }
        $postCatalogue->update($payload);
        return redirect()->route('admin.post.catalogues')->with('success', 'Cập nhật nhóm bài viết thành công!');
    }

    public function delete($id)
    {
        $postCatalogue = PostCatalogue::find($id);
        $template = 'backend.postcatalogue.delete';
        return view('backend.dashboard.layout', compact('template', 'postCatalogue'));
    }
    public function destroy($id = 0)
    {
        $postCatalogue = PostCatalogue::withTrashed()->find($id);
        $postCatalogue->forceDelete();
        return redirect()->route('admin.post.catalogues')->with('success', 'Xóa thành công nhóm bài viết!');
    }
    public function softDelete($id = 0)
    {
        $product = PostCatalogue::find($id);
        $product->delete();
        return redirect()->route('admin.post.catalogues')->with('success', 'Xóa thành công nhóm bài viết!');
    }
}


