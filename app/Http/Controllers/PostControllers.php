<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Traits\GetDataTrait;

class PostControllers extends Controller
{
    use GetDataTrait;
    public function index()
    {
        $posts = $this->getAllPosts();
        $postNew = $this->getPostNew();
        $postSubs = $this->getPostSubs();
        $postOutStandings = $this->getPostOutStandings();
        $catagories = $this->getCategoryOutStandings();
        $allPostCatagories = $this->getAllPostCategoris();
        $allCategories = $this->getCategoryOutStandings();
        $brandInCates = $this->getBrandsFromCates();

        $template = 'fontend.post.index';
        return view('fontend.index.layout', compact('template', 'posts', 'catagories','allCategories','brandInCates','postOutStandings','postNew','postSubs','allPostCatagories'));
    }

    public function detail($id = 0)
    {
        $post = $this->postGetById($id);
        $productOne = $this->getProductOne();
        $allCategories = $this->getCategoryOutStandings();
        $brandInCates = $this->getBrandsFromCates();
        $postOutStandings = $this->getPostOutStandings();
        $allPostCatagories = $this->getAllPostCategoris();
        $postCmts = Post::with('comment.user')->where('publish', '=', 1)->find($id);
        $template = 'fontend.post.detail';
        return view('fontend.index.layout', compact('template', 'post','productOne','allCategories','brandInCates','postOutStandings','allPostCatagories','postCmts'));
    }
    public function category($id = 0)
    {   
        $allCategories = $this->getCategoryOutStandings(); //dm sp 
        $brandInCates = $this->getBrandsFromCates(); // brands in cate
        $postInCategories = $this->postInCategory($id);
        $postOutStandings = $this->getPostOutStandings(); // bv nổi bật
        $allPostCatagories = $this->getAllPostCategoris(); // dm bv

        $template = 'fontend.post.category';
        return view('fontend.index.layout', compact('template', 'postInCategories','allCategories','brandInCates','postOutStandings','allPostCatagories'));
    }

    public function storeComment(StoreCommentRequest $request, $id = 0)
    {
        $request->all();
        $post = Post::find($id);

        $comment = new Comment();
        $comment->content = $request->input('content');
        $comment->user_id = auth()->id();
        $comment->post_id = $post->id;
        $comment->save();
        return redirect()->back()->with('success', 'Đánh giá của bạn đã được ghi nhận!');
    }
    public function destroy(Request $request, $id = 0)
    {
        $comnentPost = Comment::find($id);
        if ($comnentPost && $comnentPost->post_id == $request->input('post_id')) {
            $comnentPost->forceDelete();
            return redirect()->back()->with('success', 'Đánh giá của bạn đã được xóa!');
        }else{
            return redirect()->back()->with('error', 'Bạn không thể xóa đánh giá này!');
        }
    }
}
