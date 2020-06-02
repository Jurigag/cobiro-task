<?php
declare(strict_types=1);

namespace App\Product\Application\Query;

class GetProductById
{
    /**
     * @var string
     */
    protected $id;

    /**
     * GetProductById constructor.
     */
    public function __construct(string $id)
    {
        $this->id = $id;
    }

    public function getId(): string
    {
        return $this->id;
    }
}
