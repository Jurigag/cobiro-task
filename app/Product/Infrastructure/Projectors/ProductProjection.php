<?php
declare(strict_types=1);

namespace App\Product\Infrastructure\Projectors;

use App\Product\Application\Query\Model\ReadProductRepositoryInterface;
use App\Product\Infrastructure\Model\ReadProduct;

class ProductProjection
{
    /**
     * @var ReadProductRepositoryInterface
     */
    protected $readProductRepository;

    /**
     * ProductProjection constructor.
     */
    public function __construct(ReadProductRepositoryInterface $readProductRepository)
    {
        $this->readProductRepository = $readProductRepository;
    }

    public function createProduct(string $guid, string $name, int $price): void
    {
        $this->readProductRepository->createProductProjection(
            $guid,
            $name,
            $price
        );
    }
}
