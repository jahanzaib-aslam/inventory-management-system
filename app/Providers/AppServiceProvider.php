<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Response;

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

        Response::macro('success', function ($code, $message, $data = null){

            return response()->json([
               'code'      =>  $code,
               'message'   =>  $message,
               'data'      =>  $data
            ]);
       });

       Response::macro('error', function ($code, $message, $error, $status = 400){
           return response()->json([
               'code'      =>  $code,
               'message'   =>  $message,
               'error'     =>  [$error]
           ], $status);
       });
    }
}
