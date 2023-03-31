<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\product\CreateProductRequest;
use App\Http\Requests\product\UpdateProductRequest;
use App\Models\Product;
use App\Services\Product\ProductService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(private ProductService $service)
    {

    }

    public function create(CreateProductRequest $request) : JsonResponse
    {
        $response = $this->service->create($request->validated());

        return response()->success($response->code(), $response->message(), $response->getData());
    }

    public function update(UpdateProductRequest $request): JsonResponse
    {

        $response = $this->service->update($request->validated());

        return response()->success($response->code(), $response->message(), $response->getData());

    }

    public function show($id): JsonResponse
    {

        $response = $this->service->show($id);

        return response()->success($response->code(), $response->message(), $response->getData());
    }

    public function delete(Product $product): JsonResponse
    {

       $response =  $this->service->delete($product);

        return response()->success($response->code(), $response->message(), $response->getData());
    }

    public function list(): JsonResponse
    {

        $response = $this->service->list();

        return response()->success($response->code(), $response->message(), $response->getData());
    }
}