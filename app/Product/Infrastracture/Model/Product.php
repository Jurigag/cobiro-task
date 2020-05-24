<?php
declare(strict_types=1);

namespace App\Product\Infrastracture\Model;

use App\Product\Domain\Model\ProductInterface;
use Illuminate\Database\Eloquent\Model;
use Eloquent;

/**
 * Class Product
 * @package App\Product\Inftrastracture\Model
 * @mixin Eloquent
 */
class Product extends Model implements ProductInterface
{
    public $incrementing = false;
    protected $primaryKey = 'guid';
    protected $keyType = 'string';
    public $timestamps = false;

    protected $guarded = ['guid'];
    protected $fillable = ['price', 'name'];

    /**
     * @var string
     */
    protected $guid;

    /**
     * @var int
     */
    protected $price;

    /**
     * @var string
     */
    protected $name;

    public function getGuid(): string
    {
        return $this->guid;
    }

    public function setGuid(string $guid): ProductInterface
    {
        $this->guid = $guid;

        return $this;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function setPrice(int $price): ProductInterface
    {
        $this->price = $price;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): ProductInterface
    {
        $this->name = $name;

        return $this;
    }
}
