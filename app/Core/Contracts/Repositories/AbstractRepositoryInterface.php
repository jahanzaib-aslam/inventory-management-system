<?php

namespace App\Core\Contracts\Repositories;

use Illuminate\Database\Eloquent\Model;


interface AbstractRepositoryInterface {

    public function create(array $request) : Model;
    public function update(int $id, array $request) : bool;
    public function getById(int $id, array $with = []) : Model;
    public function getByCondition(array $condtions, array $with = []) : Model;
    public function destroy(Model $model) : bool;
}