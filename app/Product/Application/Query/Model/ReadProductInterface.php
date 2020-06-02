<?php
declare(strict_types=1);

namespace App\Product\Application\Query\Model;

interface ReadProductInterface
{
    public function getGuid(): string;

    public function getName(): string;

    public function getPrice(): int;
}
