<?php
declare(strict_types=1);

namespace App\Product\Infrastructure\Model;

use App\Product\Application\Query\Model\ReadProductInterface;
use App\Product\Application\Query\Model\ReadProductRepositoryInterface;
use App\SharedKernel\Infrastructure\BaseRepository;

class ReadProductRepository extends BaseRepository implements ReadProductRepositoryInterface
{
    public function createProductProjection(string $guid, string $name, int $price)
    {
        $model = new ReadProduct();
        $model->guid = $guid;
        $model->name = $name;
        $model->price = $price;
        $model->save();
    }

    public function getOneById(string $id): ReadProductInterface
    {
        return ReadProduct::find($id);
    }
}
