<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\pagination\paginator;
use App\Models\Page;
use App\Models\Room;


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
        Paginator::useBootstrap();

        //$page_data = Page::where('id',1)->first();
        $room_data = Room::get();
        if (Schema::hasTable('pages')) {
            $page_data = Page::where('id',1)->first();
            // Your logic here
            view()->share('global_page_data',$page_data);
        }
        //view()->share('global_page_data',$page_data);
        view()->share('global_room_data',$room_data);

    }
}
