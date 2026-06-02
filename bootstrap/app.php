<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        // Prevent back button caching for authenticated pages
        $middleware->web(\App\Http\Middleware\PreventBackButtonCache::class);
        
        // Register middleware aliases
        $middleware->alias([
            'admin' => \App\Http\Middleware\EnsureAdminRole::class,
            'employee' => \App\Http\Middleware\EnsureEmployeeRole::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
