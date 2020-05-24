<?php
declare(strict_types=1);

namespace App\Product\Middleware;

use Closure;
use Illuminate\Http\Request;

class CreateProductMiddleware
{
    private const MAX_PRICE = 4294967295;
    private const MIN_PRICE = 0;
    private const MIN_LENGTH_NAME = 3;
    private const MAX_LENGTH_NAME = 255;

    public function handle(Request $request, Closure $next)
    {
        $maxPrice = self::MAX_PRICE;
        $minPrice = self::MIN_PRICE;
        $minLengthName = self::MIN_LENGTH_NAME;
        $maxLengthName = self::MAX_LENGTH_NAME;

        $request->validate([
            'price' => "required|between:$minPrice,$maxPrice|numeric",
            'name' => "required|between:$minLengthName,$maxLengthName|string",
        ]);

        return $next($request);
    }
}
