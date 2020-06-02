<?php
declare(strict_types=1);

namespace App\Product\Infrastructure\Projectors;

use App\Product\Domain\Event\ProductCreatedEvent;

class ProductProjector
{
    /**
     * @var ProductProjection
     */
    protected $projection;

    /**
     * ProductProjector constructor.
     */
    public function __construct(ProductProjection $productProjection)
    {
        $this->projection = $productProjection;
    }

    public function handleCreated(ProductCreatedEvent $event)
    {
        $this->projection->createProduct(
            $event->getGuid(),
            $event->getName(),
            $event->getInternalPrice()
        );
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param  \Illuminate\Events\Dispatcher  $events
     */
    public function subscribe($events)
    {
        $events->listen(
            ProductCreatedEvent::class,
            'App\Product\Infrastructure\Projectors\ProductProjector@handleCreated'
        );
    }
}
