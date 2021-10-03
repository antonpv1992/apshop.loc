<?php

namespace App\Model;

use Framework\Core\Model;
use App\Mapper\ProductMapper;

class Product extends Model
{

    public function __construct($mapper = true)
    {
        //ternary operator only for testing, remove later
        $this->mapper = $mapper ? new ProductMapper() : null;
    }
    
    public function load($field, $value)
    {
        $dbdata = $this->mapper->getByField($field, $value);
        return $this->setProducts($dbdata);
    }

    public function save()
    {
        $this->mapper->save($this);
    }

    public function saveProducts($products)
    {
        foreach($products as $product){
            $this->mapper->save($product);
        }
    }

    public function set($data)
    {
        $this->fields = $data;
        return $this;
    }

    public function setProduct($data)
    {
        $objProd = new Product(false);
        $objProd->fields = $data;
        return $objProd;
    }

    public function setProducts($products)
    {
        $objProducts = [];
        $index = 0;
        foreach($products as $key => $product){
            $obj = $this->setProduct($product);
            $obj->setName($key);
            array_push($objProducts, $obj);
            $index++;
        }
        return $objProducts;
    }

    public function get()
    {
        return $this;
    }

    public function getAllProducts()
    {
        return $this->setProducts($this->mapper->getAll());
    }

    public function searchByQuery($params = [], $condition = false, $order = false, $limit = false)
    {
        return $this->setProducts($this->mapper->getByQuery($params, $condition, $order, $limit));
    }

    public function getId()
    {
        return $this->fields['id'] ?? '';
    }

    public function getName()
    {
        return $this->fields['name'] ?? '';
    }

    public function getTitle()
    {
        return $this->fields['title'] ?? '';
    }

    public function getCategory()
    {
        return $this->fields['category'] ?? '';
    }

    public function getFeatures()
    {
        return $this->fields['features'] ?? '';
    }

    public function getBrand()
    {
        return $this->fields['brand'] ?? '';
    }

    public function getImage()
    {
        return $this->fields['image'] ?? '';
    }

    public function getDesc()
    {
        return $this->fields['desc'] ?? '';
    }

    public function getPrice()
    {
        return $this->fields['price'] ?? '';
    }

    public function getOldPrice()
    {
        return $this->fields['old_price'] ?? '';
    }

    public function getAlias()
    {
        return $this->fields['alias'] ?? '';
    }

    public function setName($name)
    {
        $this->fields['name'] = $name;    
    }
}