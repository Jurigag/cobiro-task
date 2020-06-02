<?php
declare(strict_types=1);

namespace App\Product\Application\Query;

use App\Product\Application\Query\Dto\Product;
use App\Product\Application\Query\Model\ReadProductRepositoryInterface;

class GetProductByIdHandler
{
    /**
     * @var ReadProductRepositoryInterface
     */
    protected $readProductRepository;

    /**
     * GetProductByIdHandler constructor.
     */
    public function __construct(ReadProductRepositoryInterface $readProductRepository)
    {
        $this->readProductRepository = $readProductRepository;
    }

    public function handle(GetProductById $query): Product
    {
        $eloquentModel = $this->readProductRepository->getOneById($query->getId());

        return new Product(
            $eloquentModel->getGuid(),
            $eloquentModel->getName(),
            number_format($eloquentModel->getPrice() / 100, 2)
        );
    }
}
