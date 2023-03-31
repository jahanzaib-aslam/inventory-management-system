<?php

namespace App\Services\Product;

use App\Http\Requests\product\CreateProductRequest;
use App\Http\Resources\product\ProductResource;
use App\Models\Product;
use App\Repositories\ProductRepository;
use App\Responses\ProductResponse;
use App\Services\FileUpload;
use Illuminate\Http\Request;

class ProductService {

    public function __construct(private ProductRepository $repository, private ProductResponse $response, private Request $request)
    {

    }

    public function create(array $request) : ProductResponse
    {

        $fileUploader = app(FileUpload::class);

        $request['image'] = $fileUploader->upload(config('paths.images.product'), $request['productImage']);

        $product = $this->repository->create($request);

        $product =  new ProductResource($product);

        $this->response->setResponse(1, 'product created successfully', $product->toArray($this->request));

        return $this->response;
    }

    public function update(array $request) : ProductResponse
    {
        if(isset($request['productImage'])){
            $fileUploader = app(FileUpload::class);
            $request['image'] = $fileUploader->upload(config('paths.images.product'), $request['productImage']);
        }

        $this->repository->update($request['id'], $request);

        $product =  $this->repository->getById($request['id']);

        $product =  new ProductResource($product);

        $this->response->setResponse(1, 'product updated successfully', $product->toArray($this->request));

        return $this->response;

    }

    public function show(int $id) : ProductResponse
    {

        $product =  $this->repository->getById($id);
        $product = new ProductResource($product);

        $this->response->setResponse(1, 'product created successfully', $product->toArray($this->request));

        return $this->response;
    }

    public function delete(Product $product) : ProductResponse
    {
        $this->repository->destroy($product);

        $this->response->setResponse(1, 'product deleted successfully');

        return $this->response;
    }

    public function list(){

        $this->repository->setPagination(false);

        $productList = $this->repository->getList();

        $productList = ProductResource::collection($productList);

        $this->response->setResponse(1, 'list of products', $productList->toArray($this->request));

        return $this->response;
    }
}