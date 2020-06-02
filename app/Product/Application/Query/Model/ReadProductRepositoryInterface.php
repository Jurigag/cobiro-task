<?php
declare(strict_types=1);

namespace App\Product\Application\Query\Model;

use App\Product\Domain\Product;

interface ReadProductRepositoryInterface
{
    public function createProductProjection(string $guid, string $name, int $price);

    public function getOneById(string $id): ReadProductInterface;
}
