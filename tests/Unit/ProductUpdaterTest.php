<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\Product\Domain\Event\ProductCreatedEvent;
use App\Product\Domain\Factory\ProductFactory;
use App\Product\Domain\Model\ProductRepositoryInterface;
use App\Product\Domain\Product;
use App\Product\Domain\Service\ProductUpdater;
use App\Product\Domain\ValueObject\Name;
use App\Product\Domain\ValueObject\Price;
use PHPUnit\Framework\TestCase;

class ProductUpdaterTest extends TestCase
{
    /**
     * @var ProductUpdater
     */
    private $productUpdater;

    /**
     * @var ProductRepositoryInterface|\PHPUnit\Framework\MockObject\MockObject
     */
    private $repositoryMock;

    /**
     * @var ProductFactory|\PHPUnit\Framework\MockObject\MockObject
     */
    private $factory;

    /**
     * @var \App\Product\Domain\Event\ProductEventDispatcher|\PHPUnit\Framework\MockObject\MockObject
     */
    private $eventDispatcher;

    public function setUp(): void
    {
        parent::setUp();

        $this->repositoryMock = $this->createMock(ProductRepositoryInterface::class);
        $this->factory = $this->createMock(ProductFactory::class);
        $this->eventDispatcher = $this->createMock(\App\Product\Domain\Event\ProductEventDispatcher::class);
        $this->productUpdater = new ProductUpdater($this->repositoryMock, $this->factory);
    }

    /**
     * @test
     */
    public function shouldCreate(): void
    {
        $this->assertInstanceOf(ProductUpdater::class, $this->productUpdater);
    }

    /**
     * @test
     */
    public function shouldCallUpdate(): void
    {
        $name = 'test name';
        $id = 'test id';
        $price = 123;
        $product = new Product(
            $id,
            new Price(
                $price
            ),
            new Name(
                $name
            )
        );
        $this->factory->expects($this->once())
            ->method('createNew')
            ->with($id, $price, $name)
            ->willReturn($product);
        $this->repositoryMock->expects($this->once())
            ->method('save')
            ->with($product);
        $this->eventDispatcher->expects($this->once())
            ->method('fire')
            ->with(new ProductCreatedEvent($id, ))

        $this->productUpdater->update($id, $name, $price);
    }
}
