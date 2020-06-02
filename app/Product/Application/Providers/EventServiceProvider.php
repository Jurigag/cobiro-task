<?php

namespace App\Product\Application\Providers;

use App\Product\Application\Listeners\LoggableListener;
use App\Product\Domain\Event\ProductCreatedEvent;
use App\Product\Infrastructure\Projectors\ProductProjector;
use App\SharedKernel\Interfaces\Loggable;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Loggable::class => [
            LoggableListener::class,
        ],
    ];

    /**
     * The subscriber classes to register.
     *
     * @var array
     */
    protected $subscribe = [
        ProductProjector::class,
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot(): void
    {
        parent::boot();
    }
}
