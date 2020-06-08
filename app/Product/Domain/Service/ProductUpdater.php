<?php
declare(strict_types=1);

namespace App\Product\Domain\Service;

use App\Product\Domain\Factory\ProductFactory;
use App\Product\Domain\Model\ProductRepositoryInterface;
use App\Product\Domain\Product;
use App\Product\Domain\ValueObject\Name;
use App\Product\Domain\ValueObject\Price;

class ProductUpdater
{
    /**
     * @var ProductRepositoryInterface
     */
    private $repository;

    /**
     * @var ProductFactory
     */
    private $productFactory;

    /**
     * ProductUpdater constructor.
     */
    public function __construct(ProductRepositoryInterface $repository, ProductFactory $productFactory)
    {
        $this->repository = $repository;
        $this->productFactory = $productFactory;
    }

    public function update(string $guid, string $name, int $price): void
    {
        $product = $this->productFactory->createNew($guid, $price, $name);
        $this->repository->save($product);
    }
}
