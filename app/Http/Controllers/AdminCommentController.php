<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Product;
use App\Models\User;
use App\Models\UserCatalogue;
use Illuminate\Http\Request;

class AdminCommentController extends Controller    
{
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        $query = Comment::query();
        if ($keyword) { 
            $query->where('content', 'LIKE', '%' . $keyword . '%');
        }
        $comments = $query->paginate(12);
        $template = 'backend.comment.index';
        return view('backend.dashboard.layout', compact('template', 'comments'));
    }
    public function create() 
    {
        $products = Product::all();
        $users = User::where('user_catalogue_id', '!=', 5)->get();
        $posts = Post::all();
        $template = 'backend.comment.create';
        return view('backend.dashboard.layout', compact('template', 'products', 'users', 'posts'));
    }
    public function store(StoreCommentRequest $request)
    {
        $payload = $request->all();
        Comment::create($payload);
        return redirect()->route('admin.comments')->with('success', 'Thêm mới bình luận thành công!');
    }

    public function update($id)
    {
        $comment = Comment::find($id);
        $products = Product::all();
        $users = User::where('user_catalogue_id', '!=', 5)->get();
        $posts = Post::all();
        $template = 'backend.comment.update';
        return view('backend.dashboard.layout', compact('template', 'comment','products', 'users', 'posts'));
    }
    public function edit($id = 0, UpdateCommentRequest $request)
    {
        $comment = Comment::find($id);  
        $payload = $request->all();
        $comment->update($payload);
        return redirect()->route('admin.comments')->with('success', 'Cập nhật bình luận thành công!');
    }

    public function delete($id)
    {
        $comment = Comment::find($id);
        $template = 'backend.comment.delete';
        return view('backend.dashboard.layout', compact('template', 'comment'));
    }
    public function destroy($id = 0)
    {
        $comment = Comment::withTrashed()->find($id);
        $comment->forceDelete(); 
        return redirect()->route('admin.comments')->with('success', 'Xóa thành công bình luận!');
    }
    public function softDelete($id = 0)
    {
        $comment = Comment::find($id);
        $comment->delete();
        return redirect()->route('admin.comments')->with('success', 'Xóa thành công thương hiệu!');
    }
}
