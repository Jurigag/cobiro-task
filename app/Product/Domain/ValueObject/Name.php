<?php
declare(strict_types=1);

namespace App\Product\Domain\ValueObject;

use App\Product\Domain\Exception\ProductNameLengthException;

/**
 * Class Name
 * @package App\Product\Domain\ValueObject
 */
class Name
{
    public const MIN_NAME_LENGTH = 3;
    public const MAX_NAME_LENGTH = 255;

    /**
     * @var string
     */
    protected $name;

    /**
     * Name constructor.
     * @throws ProductNameLengthException
     */
    public function __construct(string $name)
    {
        if (strlen($name) < self::MIN_NAME_LENGTH || strlen($name) > self::MAX_NAME_LENGTH) {
            throw new ProductNameLengthException("Product name has invalid length - {$name}");
        }

        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function __toString()
    {
        return $this->name;
    }
}
