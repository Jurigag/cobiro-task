<?php
declare(strict_types=1);

namespace App\Product\Infrastructure\Model;

use App\Product\Application\Query\Model\ReadProductInterface;
use App\Product\Domain\Model\ProductInterface;
use Illuminate\Database\Eloquent\Model;

class ReadProduct extends Model implements ReadProductInterface
{
    public $incrementing = false;
    protected $primaryKey = 'guid';
    protected $keyType = 'string';
    public $timestamps = false;

    protected $guarded = ['guid'];
    protected $fillable = ['price', 'name'];

    public function getGuid(): string
    {
        return $this->guid;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
