<?php
declare(strict_types=1);

namespace App\Product\Application\Middlewares;

use App\Product\Domain\ValueObject\Name;
use Closure;
use Illuminate\Http\Request;

class CreateProductMiddleware
{
    private const MAX_PRICE = 4294967295;
    private const MIN_PRICE = 0;

    public function handle(Request $request, Closure $next)
    {
        $maxPrice = self::MAX_PRICE;
        $minPrice = self::MIN_PRICE;
        $minLengthName = Name::MIN_NAME_LENGTH;
        $maxLengthName = Name::MAX_NAME_LENGTH;

        $request->validate([
            'price' => "required|between:$minPrice,$maxPrice|numeric",
            'name' => "required|between:$minLengthName,$maxLengthName|string",
        ]);

        return $next($request);
    }
}
