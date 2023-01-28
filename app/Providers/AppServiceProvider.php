<?php

namespace App\Providers;

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
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        response()->macro('jsonSuccess', function ($data = [], $status = 200, array $headers = [], $options = 0) {
            return response()->json([
                'status' => 'success',
                'data' => $data
            ], $status, $headers, $options);
        });
    }
}
