<?php
declare(strict_types=1);

namespace App\Product\Application\Command;

/**
 * Class CreateProductCommand
 * @package App\Product\Command
 */
class CreateProductCommand
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var float
     */
    protected $price;

    /**
     * @var string
     */
    protected $guid;

    /**
     * CreateProductCommand constructor.
     */
    public function __construct(string $name, float $price, string $guid)
    {
        $this->name = $name;
        $this->price = $price;
        $this->guid = $guid;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getGuid(): string
    {
        return $this->guid;
    }
}
