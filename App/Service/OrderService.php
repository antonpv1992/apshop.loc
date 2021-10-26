<?php

namespace App\Service;

use App\Mapper\ProductMapper;
use Framework\Helpers\Sql;

trait OrderService
{
    
    protected function ordersQuery($conditions = false, $order = false, $direction = 'DESC', $limit = false)
    {
        $sqlO = new Sql();
        return $sqlO->select([
            "`order`.id", "`order`.status", "`order`.created_at", "`order`.updated_at", "user.login", "op.quantity", "op.price", "product.title", "product.alias", "category.name AS category"
        ], $this->table) 
        . $sqlO->join([
            "user" => "user.id = `order`.`user_id`",
            "order_product as op" => "op.order_id = `order`.id",
            "product" => "product.id = op.product_id",
            "product_category" => "product_category.product_id = product.id",
            "category" => "product_category.category_id = category.id"
        ])
        . $sqlO->where($conditions)
        . $sqlO->order($order, $direction)
        . $sqlO->limit($limit);
    }

    private function prepareWhereOrders($data)
    {
        $where = [];
        for($i = 0; $i < count($data['filter']); $i++) {
            $key = $data['filter'][$i] . " LIKE '%$data[search]%'";
            if ($i === 0) {
                array_push($where, [$key => ""]);
            } else {
                array_push($where, [$key => "OR"]);
            }
        }
        return $where;
    }

    private function checkOrderProducts($orders)
    {
        $result = [];
        foreach ($orders as $key => $order) {
            $mapper = new ProductMapper();
            $product = $mapper->getProductById($order['id']);
            $result[$key] = [
                'productId' => $product->getId(),
                'userId' => 2, //change user later
                'quantity' => $order['quantity'],
                'price' => $product->getPrice()
            ];
        }
        return $result;
    }

    private function checkAmountProducts($order)
    {
        $productsId = $this->prepareID($order);
        foreach ($productsId as $pid) {
            $amount = $this->getAmountOfProduct($pid);
            if ($amount <= 0) {
                return false;
            }
        }
        return true;
    }

    private function prepareId($data)
    {
        $prodId = [];
        foreach ($data as $order) {
            array_push($prodId, $order['id']);
        }
        return $prodId;
    }
}