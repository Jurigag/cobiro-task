<?php
declare(strict_types=1);

namespace App\Product\Application\Providers;

use App\Product\Application\Query\Model\ReadProductRepositoryInterface;
use App\Product\Domain\Model\ProductRepositoryInterface;
use App\Product\Infrastructure\Model\ProductRepository;
use App\Product\Infrastructure\Model\ReadProductRepository;
use Carbon\Laravel\ServiceProvider;

/**
 * Class RepositoriesServiceProvider
 * @package App\Product\Application\Providers
 */
class RepositoriesServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        parent::register();

        $this->app->singleton(ProductRepositoryInterface::class, ProductRepository::class);
        $this->app->singleton(ReadProductRepositoryInterface::class, ReadProductRepository::class);
    }
}
