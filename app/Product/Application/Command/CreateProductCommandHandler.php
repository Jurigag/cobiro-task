<?php
declare(strict_types=1);

namespace App\Product\Application\Command;

use App\Product\Domain\Event\ProductCreatedEvent;
use App\Product\Domain\Factory\ProductFactory;
use App\Product\Domain\Model\ProductRepositoryInterface;
use Illuminate\Support\Str;
use Ramsey\Uuid\Guid\Guid;

/**
 * Class CreateProductCommandHandler
 * @package App\Product\Command
 */
class CreateProductCommandHandler
{
    /**
     * @var ProductRepositoryInterface
     */
    protected $productRepository;

    /**
     * CreateProductCommandHandler constructor.
     */
    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function handle(CreateProductCommand $command): void
    {
        $guid = $command->getGuid();
        $product = ProductFactory::createNew(
            $guid,
            $command->getPrice(),
            $command->getName()
        );
        $this->productRepository->save($product);
        event(new ProductCreatedEvent(
            $guid,
            $product->getName()->getName(),
            $product->getPrice()->getFormattedPrice()
        ));
    }
}
