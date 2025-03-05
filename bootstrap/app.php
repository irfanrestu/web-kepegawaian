<?php

use App\Http\Middleware\Authen;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'auth.role' => Authen::class, //mengubah alias ke "auth.role"
        ]);

        // grouping route admin only
        $middleware->group('admin', [
            'auth', // 
            'auth.role:Admin', // Your custom role-based middleware
        ]);

        //grouping route untuk admin dan pegawai konten
        $middleware->group('konten', [
            'auth', // Laravel's built-in authentication middleware
            'auth.role:Admin,Pegawai Konten', // Your custom role-based middleware
        ]);

    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
