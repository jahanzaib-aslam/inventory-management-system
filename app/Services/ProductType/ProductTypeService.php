<?php

namespace App\Services\ProductType;

use App\Helpers\ResponseCode;
use App\Models\ProductType;
use App\Repositories\ProductTypeRepository;
use App\Responses\ProductTypeResponse;
use Illuminate\Http\Request;

class ProductTypeService {

    public function __construct(private ProductTypeRepository $repository, private ProductTypeResponse $response, private Request $request)
    {

    }

    public function create(array $request) : ProductTypeResponse
    {
        $productType =  $this->repository->create($request);

        $this->response->setResponse(ResponseCode::Regular->value, 'Product type created successfully.', $productType->toArray($this->request));

        return $this->response;
    }

    public function destroy(ProductType $type) : ProductTypeResponse
    {
        $this->repository->destroy($type);

        $this->response->setResponse(ResponseCode::Regular->value, 'Product type deleted successfully.');

        return $this->response;
    }
}