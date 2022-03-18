<?php

namespace App\Providers;
use App\Model\Category;
use App\Model\Product;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $categoryMenubar = Category::with('productsMenubar')->get()->toArray();
        View::composer('*', function ($view)  use ($categoryMenubar)  {
            $view->with(compact('categoryMenubar'));
        });
    }
}
