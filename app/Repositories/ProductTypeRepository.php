<?php

namespace App\Repositories;

use App\Core\Repositories\AbstractRepository;
use App\Models\ProductType;

class ProductTypeRepository extends AbstractRepository {

    public function __construct(ProductType $model)
    {
        $this->model = $model;
    }

}