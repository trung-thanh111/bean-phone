<?php

namespace App\Http\Controllers;

use App\Mail\sendContactWithMail;
use App\Models\Banner;
use App\Traits\GetDataTrait; // use trait
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeControllers extends Controller
{
    use GetDataTrait; // sử dụng trait

    public function index()
    {
        $productDeals = $this->getProductDeals();
        $iphones = $this->getIphoneOutStandings();
        $samsungs = $this->getSamsungOutStandings();
        $xiaomis = $this->getXiaomiOutStandings();
        $accessories = $this->getAccessories();
        $brands = $this->getBrands();
        $productPriceLow  = $this->getProductLows();
        $posts  = $this->loadPostInHome();
        $postSubs  = $this->getPostSubHomes();
        $banners = Banner::where('type', 'main')->where('publish', 1)->first();
        $bannerSubs = Banner::where('type', 'sub')->where('publish', 1)->first();
        $template = 'fontend.index.home.index';
        return view('fontend.index.layout', compact('template', 'productDeals', 'iphones', 'samsungs', 'xiaomis', 'accessories', 'brands', 'productPriceLow', 'posts', 'postSubs', 'banners', 'bannerSubs'));
    }

    public function contact()
    {
        $template = 'fontend.index.home.contact';
        return view('fontend.index.layout', compact('template'));
    }

    public function sendMail(Request $request)
    {
        $array = $request->post();
        $name = trim(strip_tags($array['name']));
        $email = trim(strip_tags($array['email']));
        $phone = trim(strip_tags($array['phone']));
        $content = trim(strip_tags($array['content']));
        $mailAdmin = 'thanhduy212004@gmail.com';

        Mail::to($mailAdmin)->send(new sendContactWithMail($name, $email, $phone, $content));

        return redirect()->back()->with('success', 'Liên hệ của bạn đã được gửi');
    }

    public function about()
    {
        $template = 'fontend.index.home.about';
        return view('fontend.index.layout', compact('template'));
    }
}
