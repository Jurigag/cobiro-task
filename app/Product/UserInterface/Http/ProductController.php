<?php
declare(strict_types=1);

namespace App\Product\UserInterface\Http;

use App\Product\Application\Command\CreateProductCommand;
use App\Product\Application\Query\GetProductById;
use App\Product\Domain\Exception\ProductNameLengthException;
use App\Product\Domain\Exception\ProductPriceException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Routing\ResponseFactory;
use Illuminate\Support\Str;
use Joselfonseca\LaravelTactician\CommandBusInterface;
use SmoothPhp\QueryBus\QueryBus;
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
     * @var QueryBus
     */
    protected $queryBus;

    /**
     * ProductController constructor.
     */
    public function __construct(CommandBusInterface $commandBus, QueryBus $queryBus)
    {
        $this->commandBus = $commandBus;
        $this->queryBus = $queryBus;
    }

    public function create(Request $request, ResponseFactory $responseFactory)
    {
        try {
            $guid = (string)Str::uuid();
            $this->commandBus->dispatch(new CreateProductCommand(
                $request->post('name'),
                (float)$request->post('price'),
                $guid
            ));
        } catch (ProductNameLengthException|ProductPriceException $e) {
            return $responseFactory->json(['message' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }

        return $responseFactory->json(['guid' => $guid], Response::HTTP_CREATED);
    }

    public function show(Request $request, string $id, ResponseFactory $responseFactory)
    {
        try {
            $product = $this->queryBus->query(new GetProductById($id));

            return $responseFactory->json($product);
        } catch (ModelNotFoundException $e) {
            return $responseFactory->json(['message' => 'Not found'], Response::HTTP_NOT_FOUND);
        }
    }
}
