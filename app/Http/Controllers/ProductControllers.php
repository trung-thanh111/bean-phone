<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Models\AlbumProduct;
use App\Models\Banner;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Traits\GetDataTrait;

class ProductControllers extends Controller
{
    use GetDataTrait;

    public function index()
    {
        $products = $this->getAllProducts();
        $catagories = $this->getCategoryOutStandings();
        $bannerProducts = Banner::where('type', 'product')->where('publish', 1)->first();
        $template = 'fontend.product.index';
        return view('fontend.index.layout', compact('template', 'products', 'catagories', 'bannerProducts'));
    }
    public function detail($id = 0)
    {
        $productYourLikes = $this->productYourLike();
        $productYourLikeMains = $this->productYourLikeMains();
        $productRelates = $this->productRelates();
        $product = Product::with('comment.user')->where('publish', '=', 1)->find($id);
        $commentHots = Comment::with('user')->where('publish', '=', 1)->orWhere('hot', '=', 1)->limit(3)->get();
        $albumProduct = AlbumProduct::where('product_id', $product->id)->where('publish',1)->first();

        if ($albumProduct && !empty($albumProduct['albums'])) {
            $albumSubs = json_decode(str_replace("'", '"', $albumProduct['albums']), true);
        } else {
            $albumSubs = [];
        }

        $template = 'fontend.product.detail';
        return view('fontend.index.layout', compact('template', 'product', 'productYourLikes', 'productRelates', 'productYourLikeMains', 'commentHots', 'albumProduct', 'albumSubs'));
    }
    public function category($id = 0)
    {
        $catagories = $this->getCategoryOutStandings();
        $productInCategories = $this->productInCategory($id);
        $template = 'fontend.product.category';
        return view('fontend.index.layout', compact('template', 'productInCategories', 'catagories'));
    }
    public function brand($id = 0)
    {
        $catagories = $this->getCategoryOutStandings();
        $productInCategories = $this->productInCategory($id);
        $productInBrands = $this->productInbrands($id);
        $bannerBrands = Banner::where('type', 'brand')->where('publish', 1)->first();
        $template = 'fontend.product.brand';
        return view('fontend.index.layout', compact('template', 'productInCategories', 'catagories', 'productInBrands', 'bannerBrands'));
    }
    public function search(Request $request, $keyword = '')
    {
        $keyword = $request->input('keyword');
        $products = $this->searchWithKeyword($keyword);
        $template = 'fontend.product.search';
        return view('fontend.index.layout', compact('template', 'products', 'keyword'));
    }
    public function storeComment(StoreCommentRequest $request, $id = 0)
    {
        $request->all();
        $product = Product::find($id);

        $comment = new Comment();
        $comment->content = $request->input('content');
        $comment->user_id = auth()->id();
        $comment->product_id = $product->id;
        $comment->save();
        return redirect()->back()->with('success', 'Đánh giá của bạn đã được ghi nhận!');
    }
    public function destroy(Request $request, $id = 0)
    {
        $comnentProduct = Comment::find($id);
        if ($comnentProduct && $comnentProduct->product_id == $request->input('product_id')) {
            $comnentProduct->forceDelete();
            return redirect()->back()->with('success', 'Đánh giá của bạn đã được xóa!');
        } else {
            return redirect()->back()->with('error', 'Bạn không thể xóa đánh giá này!');
        }
    }
}
