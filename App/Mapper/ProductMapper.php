<?php

namespace App\Mapper;

use App\Service\ProductService;
use Framework\Core\Mapper;

class ProductMapper extends Mapper
{
    use ProductService;

    protected $model = 'App\\Model\\Product';
    protected $table = 'product';

    public function getFullProducts()
    {
        $sql = $this->productsWithFeatures();
        $dbData = $this->storage->query($sql);
        $prepareData = $this->transformFeatures($dbData);
        return $this->getMapObjects($prepareData);
    }

    public function getAllProducts()
    {
        $sql = $this->productsWithoutFeatures();
        $dbData = $this->storage->query($sql);
        return $this->getMapObjects($dbData);
    }

    public function getFullProductById($id)
    {
        $sql = $this->productsWithFeatures([['product.id = :productID' => ""]]);
        $dbData = $this->storage->query($sql, ['productID' => $id]);
        $prepareData = $this->transformFeatures($dbData);
        return $this->dataToModel($prepareData, $this->model);
    }

    public function getProductById($id)
    {
        $sql = $this->productsWithoutFeatures([['product.id = :productID' => '']]);
        $dbData = $this->storage->query($sql, ['productID' => $id]);
        return $this->dataToModel($dbData, $this->model);
    }

    public function getFullProductByAlias($alias)
    {
        $sql = $this->productsWithFeatures([['product.alias = :alias' => ""]]);
        $dbData = $this->storage->query($sql, ['alias' => $alias]);
        $prepareData = $this->transformFeatures($dbData);
        return $this->dataToModel($prepareData, $this->model);
    }

    public function getProductByAlias($alias)
    {
        $sql = $this->productsWithoutFeatures([['product.alias = :alias' => '']]);
        $dbData = $this->storage->query($sql, ['alias' => $alias]);
        return $this->dataToModel($dbData, $this->model);
    }

    public function getHomeProducts($field)
    {
        $sql = $this->productsWithoutFeatures([["product.$field = 1" => '']], 4);
        $dbData = $this->storage->query($sql);
        return $this->getMapObjects($dbData);
    }

    public function getProductsByCaetgory($category)
    {
        $sql = $this->productsWithoutFeatures([['category.name = :category' => '']]);
        $dbData = $this->storage->query($sql, ['category' => $category]);
        return $this->getMapObjects($dbData);
    }

    public function getProductsBySearch($search)
    {
        $sql = $this->productsWithoutFeatures([["product.title LIKE '%$search%'" => '']]);
        $dbData = $this->storage->query($sql);
        return $this->getMapObjects($dbData);
    }
}