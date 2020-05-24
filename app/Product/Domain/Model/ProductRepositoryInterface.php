<?php
declare(strict_types=1);

namespace App\Product\Domain\Model;

use App\Product\Domain\Product;

interface ProductRepositoryInterface
{
    public function save(Product $product): void;
}
