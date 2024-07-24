<?php

namespace App\Traits;

use Illuminate\Support\Facades\DB;
use App\Http\Models\Product;

trait GetDataTrait
{
    


    // home
    public function getProductDeals()
    {
        return $query = DB::table('products')
            ->where('price', '>', 0)
            ->where('del', '>', 0)
            ->where('publish', '>', 0)
            ->limit(5)
            ->get();
    }
    public function getIphoneOutStandings()
    {
        return $query = DB::table('products')
            ->select('products.*')
            ->join('brands', 'products.brand_id', '=', 'brands.id')
            ->join('product_catalogues', 'products.product_catalogue_id', '=', 'product_catalogues.id')
            ->where('brands.id', '=', 1)
            ->where('products.product_catalogue_id', '=', 11)
            ->where('products.publish', '=', 1)
            ->limit(10)
            ->get();
    }
    public function getSamsungOutStandings()
    {
        return $query = DB::table('products')
            ->select('products.*')
            ->join('brands', 'products.brand_id', '=', 'brands.id')
            ->join('product_catalogues', 'products.product_catalogue_id', '=', 'product_catalogues.id')
            ->where('brands.id', '=', 2)
            ->where('products.product_catalogue_id', '=', 11)
            ->where('products.publish', '=', 1)
            ->limit(10)
            ->get();
    }
    public function getXiaomiOutStandings()
    {
        return $query = DB::table('products')
            ->select('products.*')
            ->join('brands', 'products.brand_id', '=', 'brands.id')
            ->join('product_catalogues', 'products.product_catalogue_id', '=', 'product_catalogues.id')
            ->where('brands.id', '=', 4)
            ->where('products.product_catalogue_id', '=', 11)
            ->where('products.publish', '=', 1)
            ->limit(10)
            ->get();
    }
    public function getAccessories()
    {
        return $query = DB::table('products')
            ->select('products.*')
            ->join('product_catalogues', 'products.product_catalogue_id', '=', 'product_catalogues.id')
            ->where('products.product_catalogue_id', '=', 15)
            ->where('products.publish', '=', 1)
            ->limit(10)
            ->get();
    }
    public function getBrands()
    {
        return $query = DB::table('brands')
            ->select($this->selectColumnBrandAndCates())
            ->where('publish', '=', 1)
            ->limit(8)
            ->get();
    }
    public function getProductLows()
    {
        return $query = DB::table('products')
            ->select($this->selectColumnProducts())
            ->where('product_catalogue_id', '=', 11)
            ->where('publish', '=', 1)
            ->orderBy('price', 'ASC')
            ->limit(5)
            ->get();
    }

    // product - product_catalogue
    
    public function getAllProducts()
    {
        return $query = DB::table('products')
            ->select($this->selectColumnProducts())
            ->where('publish', '=', 1)
            ->paginate(12);
    }
    public function getCategoryOutStandings()
    {
        return $query = DB::table('product_catalogues')
            ->select($this->selectColumnBrandAndCates())
            ->where('publish', '=', 1)
            ->get();
    }
    public function getAllCategories()
    {
        return $query = DB::table('product_catalogues')
            ->select($this->selectColumnBrandAndCates())
            ->where('id', '!=', 15)
            ->where('publish', '=', 1)
            ->get();
    }
    public function getBrandsFromCates()
    {
        return $query = DB::table('product_catalogues')
            ->select('product_catalogues.id', 'product_catalogues.name', 'brands.id as brandId', 'brands.name as brandName')
            ->join('brands', 'brands.product_catalogue_id', '=', 'product_catalogues.id')
            ->where('product_catalogues.id', '!=', 15)
            ->where('brands.publish', '=', 1)
            ->get();
    }
    public function productGetById($id = 0)
    {
        return $query = DB::table('products')
            ->select($this->selectColumnProducts())
            ->where('id', '=', $id)
            ->where('publish', '=', 1)
            ->first();
    }

    public function productYourLike()
    {
        return $query = DB::table('products')
            ->select($this->selectColumnProducts())
            ->inRandomOrder()
            ->where('publish', '=', 1)
            ->take(3)
            ->get();
    }
    public function productYourLikeMains()
    {
        return $query = DB::table('products')
            ->select($this->selectColumnProducts())
            ->inRandomOrder()
            ->where('publish', '=', 1)
            ->take(5)
            ->get();
    }
    public function productRelates()
    {
        return $query = DB::table('products')
            ->select($this->selectColumnProducts())
            ->inRandomOrder()
            ->where('publish', '=', 1)
            ->take(5)
            ->get();
    }

    public function productInCategory($id = 0)
    {
        return $query = DB::table('products')
            ->select('products.*', 'product_catalogues.name as categoryName')
            ->join('product_catalogues', 'products.product_catalogue_id', '=', 'product_catalogues.id')
            ->where('products.product_catalogue_id', '=', $id)
            ->where('products.publish', '=', 1)
            ->paginate(12);
    }

    public function productInbrands($id = 0)
    {
        return $query = DB::table('products')
            ->select('products.*', 'brands.name as brandName')
            ->join('brands', 'products.brand_id', '=', 'brands.id')
            ->where('products.brand_id', '=', $id)
            ->where('products.publish', '=', 1)
            ->paginate(12);
    }

    public function searchWithKeyword($keyword = ''){
        return $query = DB::table('products')
            ->select($this->selectColumnProducts())
            ->where('title', 'like', '%' . $keyword . '%')
            ->where('publish', '=', 1)
            ->paginate(12);
    }

    // post - post_catalogues
    public function getAllPosts()
    {
        return $query = DB::table('posts')
            ->select('posts.*', 'users.id as userId', 'users.name as userName')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->where('posts.publish', '=', 1)
            ->paginate(4);
    }
    public function getPostOutStandings()
    {
        return $query = DB::table('posts')
            ->select($this->selectColumnPosts())
            ->where('hot', '=', 1)
            ->where('publish', '=', 1)
            ->limit(6)
            ->get();
    }
    public function getPostNew()
    {
        return $query = DB::table('posts')
            ->select($this->selectColumnPosts())
            ->where('publish', '=', 1)
            ->orderBy('date_submit', 'DESC')
            ->limit(1)
            ->get();
    }
    public function getPostNewInHomes()
    {
        return $query = DB::table('posts')
            ->select($this->selectColumnPosts())
            ->where('publish', '=', 1)
            ->orderBy('date_submit', 'DESC')
            ->limit(2)
            ->get();
    }
    public function getPostSubs()
    {
        return $query = DB::table('posts')
            ->select($this->selectColumnPosts())
            ->where('hot', '=', 1)
            ->where('publish', '=', 1)
            ->inRandomOrder()
            ->limit(4)
            ->get();
    }
    public function getPostSubHomes()
    {
        return $query = DB::table('posts')
            ->select('posts.*', 'users.id as userId', 'users.name as userName')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->inRandomOrder()
            ->where('posts.hot', '=', 1)
            ->where('posts.publish', '=', 1)
            ->limit(4)
            ->get();
    }
    public function loadPostInHome()
    {
        return $query = DB::table('posts')
            ->select('posts.*', 'users.id as userId', 'users.name as userName')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->where('posts.hot', '=', 1)
            ->where('posts.publish', '=', 1)
            ->orderBy('posts.date_submit', 'DESC')
            ->limit(2)
            ->get();
    }
    public function getAllPostCategoris()
    {
        return $query = DB::table('post_catalogues')
            ->select($this->selectColumnPostCates())
            ->where('publish', '=', 1)
            ->get();
    }

    public function getProductOne()
    {
        return $query = DB::table('products')
            ->select($this->selectColumnProducts())
            ->inRandomOrder()
            ->where('publish', '=', 1)
            ->limit(1)
            ->get();
    }

    public function postGetById($id = 0)
    {
        return $query = DB::table('posts')
            ->select('posts.*', 'users.id as userId', 'users.name as userName', 'users.image as userImage')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->where('posts.id', '=', $id)
            ->where('posts.publish', '=', 1)
            ->first();
    }

    public function postInCategory($id = 0)
    {
        return $query = DB::table('posts')
            ->select('posts.*', 'post_catalogues.name as categoryName', 'users.name as userName')
            ->join('post_catalogues', 'posts.post_catalogue_id', '=', 'post_catalogues.id')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->where('posts.post_catalogue_id', '=', $id)
            ->where('posts.publish', '=', 1)
            ->paginate(4);
    }

    private function selectColumnPosts()
    {
        return [
            'id',
            'title',
            'image',
            'albums',
            'description',
            'content',
            'cre',
            'date_submit',
            'position',
            'post_catalogue_id',
            'user_id',
            'views',
            'likes',
            'publish',
        ];
    }
    private function selectColumnPostCates()
    {
        return [
            'id',
            'name',
            'image',
            'description',
            'order',
            'publish',
        ];
    }
    private function selectColumnProducts()
    {
        return [
            'id',
            'title',
            'image',
            'short_desc',
            'description',
            'color',
            'gift',
            'hot',
            'price',
            'del',
            'product_catalogue_id',
            'brand_id',
            'rate',
            'sold',
            'feedback',
            'accessory',
            'publish'
        ];
    }
    private function selectColumnBrandAndCates()
    {
        return [
            'id',
            'name',
            'image',
            'description',
            'publish',
        ];
    }
}
