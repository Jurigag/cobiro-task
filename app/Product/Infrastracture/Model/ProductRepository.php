<?php
declare(strict_types=1);

namespace App\Product\Infrastracture\Model;

use App\Product\Domain\Model\ProductRepositoryInterface;
use App\Product\Domain\Product;
use App\Product\Infrastracture\Model\Product as ProductModel;
use App\SharedKernel\Infrastructure\BaseRepository;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    public function save(Product $product): void
    {
        $modelProduct = ProductModel::findOrNew($product->getGuid());

        $modelProduct->guid = $product->getGuid();
        $modelProduct->price = $product->getPrice()->getInternalPrice();
        $modelProduct->name = $product->getName()->getName();
        $modelProduct->save();
    }
}
