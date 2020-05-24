<?php
declare(strict_types=1);

namespace App\Product\Domain\Model;

interface ProductInterface
{
    public function getGuid(): string;

    public function setGuid(string $guid): self;

    public function getName(): string;

    public function getPrice(): int;

    public function setPrice(int $price): self;

    public function setName(string $name): self;
}
