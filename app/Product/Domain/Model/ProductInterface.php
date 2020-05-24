<?php
declare(strict_types=1);

namespace App\Product\Domain\Model;

interface ProductInterface
{
    public function getGuid(): string;

    public function setGuid(string $guid): ProductInterface;

    public function getName(): string;

    public function getPrice(): int;

    public function setPrice(int $price): ProductInterface;

    public function setName(string $name): ProductInterface;
}
