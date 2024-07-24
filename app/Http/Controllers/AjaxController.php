<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class AjaxController extends Controller
{
    public function sort(Request $request){

        $sortOption = $request->input('sortOption');
        $productAtoZ = Product::orderBy('name', 'asc')->get();
        $productZtoA = Product::orderBy('name', 'desc')->get();
        $productAtoZ = Product::orderBy('price', 'asc')->get();
        $productZtoA = Product::orderBy('price', 'desc')->get();
        $template = 'fontend.product.index';
        return view('fontend.index.layout', compact('template'));
    }
}
