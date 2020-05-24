<?php
declare(strict_types=1);

namespace App\Product\Domain\Event;

use App\SharedKernel\Domain\Event\BaseEvent;

/**
 * Class ProductCreatedEvent
 * @package App\Product\Domain\Event
 */
class ProductCreatedEvent extends BaseEvent
{
    /**
     * @var string
     */
    protected $guid;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $price;

    /**
     * ProductCreatedEvent constructor.
     */
    public function __construct(string $guid, string $name, string $price)
    {
        $this->guid = $guid;
        $this->name = $name;
        $this->price = $price;
    }

    public function getGuid(): string
    {
        return $this->guid;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): string
    {
        return $this->price;
    }

    public function getLoggableContent(): string
    {
        return "Created product with name {$this->name} and price {$this->price} and guid {$this->guid}";
    }
}
