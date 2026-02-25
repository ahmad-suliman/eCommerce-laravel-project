<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use App\Models\Cart;
use App\Models\contact;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
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
    {

        View::share('cartTotal', function () {
            $userId = auth()->id();
            if ($userId) {
                return Cart::where('user_id', $userId)->sum('quantity');
            }
            return 0;
        });
        View::composer('*', function ($view) {
        $unreadMessage = Contact::where('is_read', 0)->count();
        $view->with('unreadMessage', $unreadMessage);
    });
    }
}
