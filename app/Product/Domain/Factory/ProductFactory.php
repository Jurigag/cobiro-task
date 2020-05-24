<?php
declare(strict_types=1);

namespace App\Product\Domain\Factory;

use App\Product\Domain\Model\ProductInterface;
use App\Product\Domain\Product;
use App\Product\Domain\ValueObject\Name;
use App\Product\Domain\ValueObject\Price;

class ProductFactory
{
    public static function createNew(string $guid, float $price, string $name): Product
    {
        return new Product(
            $guid,
            new Price((int)$price * 100),
            new Name($name)
        );
    }

    public static function createByModel(ProductInterface $product): Product
    {
        return new Product(
            $product->getGuid(),
            new Price($product->getPrice()),
            new Name($product->getName())
        );
    }
}
