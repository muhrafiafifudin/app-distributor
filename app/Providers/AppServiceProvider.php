<?php

namespace App\Providers;

use App\Models\OutgoingItem;
use Illuminate\Support\ServiceProvider;

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
        view()->composer('*', function ($view) {
            $count = OutgoingItem::where('status', 1)->count();

            $view->with([
                'count_outgoing_item' => $count
            ]);
        });
    }
}
