<?php
declare(strict_types=1);

namespace App\Product\UserInterface\Http;

use App\Product\Application\Command\CreateProductCommand;
use App\Product\Domain\Exception\ProductNameLengthException;
use App\Product\Domain\Exception\ProductPriceException;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;
use Joselfonseca\LaravelTactician\CommandBusInterface;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class ProductController
 * @package App\Product\UserInterface\Http
 */
class ProductController extends Controller
{
    /**
     * @var CommandBusInterface
     */
    protected $commandBus;

    /**
     * ProductController constructor.
     */
    public function __construct(CommandBusInterface $commandBus)
    {
        $this->commandBus = $commandBus;
    }

    public function create(Request $request)
    {
        try {
            $guid = (string)Str::uuid();
            $this->commandBus->dispatch(new CreateProductCommand(
                $request->post('name'),
                (float)$request->post('price'),
                $guid
            ));
        } catch (ProductNameLengthException|ProductPriceException $e) {
            return response()->json(['message' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }

        return response()->json(['guid' => $guid], Response::HTTP_CREATED);
    }
}
