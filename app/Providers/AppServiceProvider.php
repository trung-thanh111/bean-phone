<?php

namespace App\Providers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Traits\GetDataTrait;

class AppServiceProvider extends ServiceProvider
{
    use GetDataTrait;
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    { {
            // Sử dụng view composer để chia sẻ biến $cateMenu với mọi view
            View::composer('*', function ($view) {
                $allCategories = $this->getCategoryOutStandings();
                $cateMenu = $this->getAllCategories();
                $brandInCates = $this->getBrandsFromCates();
                $countOrders  = Order::with('orderItems.products')->where('status', '=', 'pending ')->count();

                $view
                    ->with('countOrders', $countOrders)
                    ->with('cateMenu', $cateMenu)
                    ->with('allCategories', $allCategories)
                    ->with('brandInCates', $brandInCates);
            });
        }
        //
    }
}
