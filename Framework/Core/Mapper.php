<?php

namespace Framework\Core;

use Framework\Database\DB;

class Mapper
{
    protected $storage;

    public function __construct()
    {
        $this->storage = DB::instance();
    }

    public function countQuery($table)
    {
        return $this->storage->countQuery($table);
    }

    protected function dataToModel($data, $model)
    {
        if (empty($data)) {
            return [];
        }
        return new $model($data);
    }

    protected function dataToModels($data, $model)
    {
        if (empty($data)) {
            return [];
        }
        $products = [];
        foreach ($data as $product) {
            array_push($products, new $model($product));
        }
        return $products;
    }

    protected function getMapObjects($data)
    {
        return isset($data[0])
            ? $this->dataToModels($data, $this->model)
            : (!empty($data) ? [$this->dataToModel($data, $this->model)] : false);
    }
}