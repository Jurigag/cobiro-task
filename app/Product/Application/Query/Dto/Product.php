<?php
declare(strict_types=1);

namespace App\Product\Application\Query\Dto;

class Product implements \JsonSerializable
{
    /**
     * @var string
     */
    protected $guid;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $price;

    /**
     * Product constructor.
     */
    public function __construct(string $guid, string $name, string $price)
    {
        $this->guid = $guid;
        $this->name = $name;
        $this->price = $price;
    }

    public function getGuid(): string
    {
        return $this->guid;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): string
    {
        return $this->price;
    }

    public function jsonSerialize()
    {
        return [
            'guid' => $this->guid,
            'name' => $this->name,
            'price' => $this->price,
        ];
    }
}
