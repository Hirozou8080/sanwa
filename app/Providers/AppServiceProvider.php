<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Controllers\CommonController;

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
            $commonController = new CommonController();
            // user取得
            $user_id = session()->get('user_id');
            if ($user_id) {
                $user = $commonController->getUser($user_id);
                $view->with('user', $user);
            }
        });
    }
}
