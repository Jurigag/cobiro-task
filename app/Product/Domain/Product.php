<?php
declare(strict_types=1);

namespace App\Product\Domain;

use App\Product\Domain\ValueObject\Name;
use App\Product\Domain\ValueObject\Price;

/**
 * Class Product
 * @package App\Product\Domain
 */
class Product
{
    /**
     * @var string
     */
    protected $guid;

    /**
     * @var Price
     */
    protected $price;

    /**
     * @var Name
     */
    protected $name;

    /**
     * Product constructor.
     */
    public function __construct(string $guid, Price $price, Name $name)
    {
        $this->guid = $guid;
        $this->price = $price;
        $this->name = $name;
    }

    public function getGuid(): string
    {
        return $this->guid;
    }

    public function getPrice(): string
    {
        return $this->price->getFormattedPrice();
    }

    public function getInternalPrice(): int
    {
        return $this->price->getInternalPrice();
    }

    public function getName(): string
    {
        return $this->name->getName();
    }
}
