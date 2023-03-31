<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\productType\ProductTypeRequest;
use App\Models\ProductType;
use App\Services\ProductType\ProductTypeService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductTypeController extends Controller
{
    public function __construct(private ProductTypeService $service)
    {
    }

    public function create(ProductTypeRequest $request) : JsonResponse
    {

        $response = $this->service->create($request->validated());
        return response()->success($response->code(), $response->message(), $response->getData());
    }

    public function delete(ProductType $type): JsonResponse
    {
         $response =  $this->service->destroy($type);
        return response()->success($response->code(), $response->message(), $response->getData());
    }

}
