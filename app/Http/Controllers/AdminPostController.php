<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostCatalogue;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AdminPostController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        $query = Post::query();
        if ($keyword) {
            $query->where('title', 'LIKE', '%' . $keyword . '%');
        }
        $posts = $query->with(['post_catalogues', 'users'])->paginate(8);

        $template = 'backend.post.index';
        return view('backend.dashboard.layout', compact('template', 'posts'));
    }
    public function create() // nhận việc load dữ liệu ra view 
    {
        $postCatalogues = PostCatalogue::all();
        $users = User::where('user_catalogue_id', '!=', 6)->get();
        $template = 'backend.post.create';
        return view('backend.dashboard.layout', compact('template', 'postCatalogues', 'users'));
    }
    public function store(StorePostRequest $request)
    {

        $payload = $request->all();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $file->move('upload/post/', $filename);
            $payload['image'] = $filename;
        }
        Post::create($payload);
        return redirect()->route('admin.posts')->with('success', 'Thêm mới bài viết thành công!');
    }

    public function update($id)
    {
        $post = Post::find($id);
        $postCatalogues = PostCatalogue::all();
        $users = User::where('user_catalogue_id', '!=', 6)->get();
        $template = 'backend.post.update';
        return view('backend.dashboard.layout', compact('template', 'postCatalogues', 'users', 'post'));
    }
    public function edit($id = 0, UpdatePostRequest $request)
    {
        $post = Post::find($id);
        $payload = $request->all();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $file->move('upload/post/', $filename);
            $payload['image'] = $filename;
        } else {
            $payload['image'] = $post->image;
        }
        $post->update($payload);
        return redirect()->route('admin.posts')->with('success', 'Cập nhật bài viết thành công!');
    }

    public function delete($id)
    {
        $post = Post::find($id);
        $template = 'backend.post.delete';
        return view('backend.dashboard.layout', compact('template', 'post'));
    }
    public function destroy($id = 0)
    {
        $post = Post::withTrashed()->find($id);
        $post->forceDelete();
        return redirect()->route('admin.posts')->with('success', 'Xóa thành công bài viết!');
    }
    public function softDelete($id = 0)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('admin.posts')->with('success', 'Xóa thành công bài viết!');
    }
}
