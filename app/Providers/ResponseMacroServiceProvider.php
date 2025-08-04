<?php

namespace App\Providers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Routing\ResponseFactory;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;

class ResponseMacroServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(ResponseFactory $factory): void
    {
        $factory->macro('success', function (array|string $message = '', $data = null) use ($factory) {
            $format = [
                'ok' => true,
                'message' => $message,
                'data' => $data,
            ];
            return $factory->make($format);
        });
        $factory->macro('error', function (int $code, array|string $message = '', array|string $errors = []) use ($factory){
            $format = [
                'ok' => false,
                'error_code'=> $code,
                'message' => $message,
                'errors' => $errors,
            ];
            return $factory->make($format, $code);
        });
    }
}
