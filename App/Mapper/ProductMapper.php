<?php

namespace App\Mapper;

use Framework\Database\DB;

class ProductMapper
{
    private $db;

    public function __construct()
    {
        $db = new DB();
        $this->db = $db->getData();
    }

    public function getAll()
    {
        return $this->db;
    }

    public function getById($id)
    {
        $data = [];
        foreach($this->db as $model => $chars){
            if($chars['id'] === $id) {
                $data[$model] = $chars;
            }
        }
        return $data;
    }

    public function getByAlias($alias)
    {
        $data = [];
        foreach($this->db as $model => $chars){
            if($chars['alias'] === $alias) {
                $data[$model] = $chars;
            }
        }
        return $data;
    }

    public function getByName($name)
    {
        $data = [];
        foreach($this->db as $model => $chars){
            if($model === $name) {
                $data[$model] = $chars;
            }
        }
        return $data;
    }

    public function getByField($field, $value)
    {
        $data = [];
        foreach($this->db as $model => $chars){
            if($chars[$field] === $value) {
                $data[$model] = $chars;
            }
        }
        return $data;
    }

    public function getByQuery($params = [], $condition = false, $order = false, $limit = false)
    {
        if(!empty($params))
            extract($params);
        //to be continue...
    }

    public function saveProducts($products)
    {
        //to be continue...
    }

    public function save($product)
    {
        //to be continue...
    }
}