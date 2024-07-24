<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $order = Order::all()->count();
        // $currentYear = Carbon::now()->year; // Lấy năm hiện tại
        // echo $currentYear;
        $userNew = User::all()->count();
        $template = 'backend.dashboard.index.dashboard';
        return view('backend.dashboard.layout', compact('template', 'order', 'userNew'));
    }
}
