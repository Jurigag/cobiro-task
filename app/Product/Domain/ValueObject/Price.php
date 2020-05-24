<?php
declare(strict_types=1);

namespace App\Product\Domain\ValueObject;

use App\Product\Domain\Exception\ProductPriceException;

/**
 * Class Price
 * @package App\Product\Domain\ValueObject
 */
class Price
{
    /**
     * @var int
     */
    protected $price;

    public function __construct(int $price)
    {
        if ($price <= 0) {
            throw new ProductPriceException("Price should be higher than zero");
        }

        $this->price = $price;
    }

    public function getInternalPrice(): int
    {
        return $this->price;
    }

    public function getFormattedPrice(): string
    {
        return number_format($this->price / 100, 2);
    }

    public function __toString()
    {
        return $this->getFormattedPrice();
    }
}
