<?php

namespace App\Product\Application\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

/**
 * Class RouteServiceProvider
 * @package App\Providers
 */
class RouteServiceProvider extends ServiceProvider
{
    protected $namespace = 'App\Product\UserInterface\Http';

    public function boot(): void
    {
        parent::boot();

        $this->map();
    }

    public function map(): void
    {
        $this->mapProductRoutes();
    }

    protected function mapProductRoutes(): void
    {
        Route::prefix('/product')
            ->namespace($this->namespace)
            ->group(base_path('routes/product.php'));
    }
}
