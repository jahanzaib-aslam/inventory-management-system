<?php

namespace App\Core\Repositories;

use App\Core\Contracts\Repositories\AbstractRepositoryInterface;
use App\Traits\RepositoryTrait;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\Eloquent\RelationNotFoundException;
use Illuminate\Database\QueryException;

abstract class AbstractRepository implements AbstractRepositoryInterface{

    use RepositoryTrait;

    protected $model;

    protected $limit = 15;

    protected $order = 'DESC';

    protected $pagination = true;

    public function create(array $request) : Model
    {
        try{
            return $this->model->create($request);
        }catch(QueryException $e){
            throw new \Exception($e->getMessage());
        }

    }

    public function update(int $id, array $data) : bool
    {
        try{
            return $this->model->find($id)->update($data);
        }catch(QueryException $e){
            throw new \Exception($e->getMessage());
        }
    }

    public function getById(int $id, array $with = []) : Model
    {
        try {
            $data = $this->model->with($with)->find($id);
        } catch (RelationNotFoundException $e) {

            throw new RelationNotFoundException($e->getMessage());
        }
        if (!$data) {
            throw new ModelNotFoundException('Record not found');
        }

        return $data;
    }

    public function getByCondition(array $conditions, array $with = []) : Model
    {
        try {
            $data =  $this->model->where($conditions)->with($with)->first();
        } catch (RelationNotFoundException $e) {
            throw new RelationNotFoundException($e->getMessage());
        }

        if (!$data) {
            throw new ModelNotFoundException('Record not found');
        }
        return $data;
    }

    public function getList(array $conditions = [], array $with = [])
    {
        try {
            $query =  $this->model->with($with)->where($conditions)->orderBy('id', $this->order)->limit($this->limit);
            if($this->pagination){
                $data =    $query->paginate($this->limit);
            }else{
                $data = $query->get();
            }
        }catch(RelationNotFoundException $e){
            throw new RelationNotFoundException($e->getMessage());
        }

        return $data;
    }

    public function destroy(Model $model) : bool
    {
        $model->delete();
        return true;
    }

}