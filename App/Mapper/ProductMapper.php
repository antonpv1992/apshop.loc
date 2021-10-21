<?php

namespace App\Mapper;

use App\Service\ProductService;
use Framework\Core\Mapper;

class ProductMapper extends Mapper
{
    use ProductService;

    public function getFullProducts()
    {
        $sql = "SELECT product.*,
            GROUP_CONCAT(DISTINCT category.name) AS category,
            GROUP_CONCAT(DISTINCT feature.feature, ';', fv.value) AS features
            FROM product
            JOIN product_category ON product_category.product_id = product.id
            JOIN category ON product_category.category_id = category.id
            JOIN product_feature_value AS pfv ON pfv.product_id = product.id
            JOIN feature_value AS fv ON fv.id = pfv.feature_value_id
            JOIN feature ON feature.id = pfv.feature_value_feature_id
            GROUP BY product.id";
        $dbData = $this->storage->query($sql);
        $prepareData = $this->transformFeatures($dbData);
        return isset($prepareData[0])
            ? $this->dataToProducts($prepareData)
            : (!empty($prepareData) ? [$this->dataToProduct($prepareData)] : false);
    }

    public function getAllProducts()
    {
        $sql = "SELECT product.*, category.name AS category 
                FROM product
                JOIN product_category ON product_category.product_id = product.id
                JOIN category ON product_category.category_id = category.id";
        $dbData = $this->storage->query($sql);
        return isset($dbData[0])
            ? $this->dataToProducts($dbData)
            : (!empty($dbData) ? [$this->dataToProduct($dbData)] : false);
    }

    public function getFullProductById($id)
    {
        $sql = "SELECT product.*,
            GROUP_CONCAT(DISTINCT category.name) AS category,
            GROUP_CONCAT(DISTINCT feature.feature, ';', fv.value) AS features
            FROM product
            JOIN product_category ON product_category.product_id = product.id
            JOIN category ON product_category.category_id = category.id
            JOIN product_feature_value AS pfv ON pfv.product_id = product.id
            JOIN feature_value AS fv ON fv.id = pfv.feature_value_id
            JOIN feature ON feature.id = pfv.feature_value_feature_id
            WHERE product.id = :productID
            GROUP BY product.id";
        $dbData = $this->storage->query($sql, ['productID' => $id]);
        $prepareData = $this->transformFeatures($dbData);
        return $this->dataToProduct($prepareData);
    }

    public function getProductById($id)
    {
        $sql = "SELECT product.*, category.name AS category 
                FROM product
                JOIN product_category ON product_category.product_id = product.id
                JOIN category ON product_category.category_id = category.id
                WHERE product.id = :productID";
        $dbData = $this->storage->query($sql, ['productID' => $id]);
        return $this->dataToProduct($dbData);
    }

    public function getFullProductByAlias($alias)
    {
        $sql = "SELECT product.*,
            GROUP_CONCAT(DISTINCT category.name) AS category,
            GROUP_CONCAT(DISTINCT feature.feature, ';', fv.value) AS features
            FROM product
            JOIN product_category ON product_category.product_id = product.id
            JOIN category ON product_category.category_id = category.id
            JOIN product_feature_value AS pfv ON pfv.product_id = product.id
            JOIN feature_value AS fv ON fv.id = pfv.feature_value_id
            JOIN feature ON feature.id = pfv.feature_value_feature_id
            WHERE product.alias = :alias
            GROUP BY product.id";
        $dbData = $this->storage->query($sql, ['alias' => $alias]);
        $prepareData = $this->transformFeatures($dbData);
        return $this->dataToProduct($prepareData);
    }

    public function getProductByAlias($alias)
    {
        $sql = "SELECT product.*, category.name AS category 
                FROM product
                JOIN product_category ON product_category.product_id = product.id
                JOIN category ON product_category.category_id = category.id
                WHERE product.alias = :alias";
        $dbData = $this->storage->query($sql, ['alias' => $alias]);
        return $this->dataToProduct($dbData);
    }

    public function getHomeProducts($field)
    {
        $sql = "SELECT product.*, category.name AS category 
                FROM product
                JOIN product_category ON product_category.product_id = product.id
                JOIN category ON product_category.category_id = category.id
                WHERE product.$field = 1
                LIMIT 4";
        $dbData = $this->storage->query($sql);
        return isset($dbData[0])
            ? $this->dataToProducts($dbData)
            : (!empty($dbData) ? [$this->dataToProduct($dbData)] : false);
    }

    public function getProductsByCaetgory($category)
    {
        $sql = "SELECT product.*, category.name AS category 
                FROM product
                JOIN product_category ON product_category.product_id = product.id
                JOIN category ON product_category.category_id = category.id
                WHERE category.name = :category";
        $dbData = $this->storage->query($sql, ['category' => $category]);
        return isset($dbData[0])
            ? $this->dataToProducts($dbData)
            : (!empty($dbData) ? [$this->dataToProduct($dbData)] : false);
    }

    public function getProductsBySearch($search)
    {
        $sql = "SELECT product.*, category.name AS category 
                FROM product
                JOIN product_category ON product_category.product_id = product.id
                JOIN category ON product_category.category_id = category.id
                WHERE product.title LIKE '%$search%'";
        $dbData = $this->storage->query($sql);
        return isset($dbData[0])
            ? $this->dataToProducts($dbData)
            : (!empty($dbData) ? [$this->dataToProduct($dbData)] : false);
    }
}