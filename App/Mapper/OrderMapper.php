<?php

namespace App\Mapper;

use App\Service\OrderService;
use Framework\Core\Mapper;

class OrderMapper extends Mapper
{

    use OrderService;

    public function getAllOrders()
    {
        $sql = "SELECT `order`.id, `order`.status, `order`.created_at, `order`.updated_at, user.login, op.quantity, op.price, product.title, product.alias, category.name AS category
                FROM `order`
                JOIN user ON user.id = `order`.`user_id`
                JOIN order_product as op ON op.order_id = `order`.id
                JOIN product ON product.id = op.product_id
                JOIN product_category ON product_category.product_id = product.id
                JOIN category ON product_category.category_id = category.id
                WHERE user.id = :userID
                ";
        $dbData = $this->storage->query($sql, ['userID' => 2]);//change user later
        return isset($dbData[0])
            ? $this->dataToOrders($dbData)
            : (!empty($dbData) ? [$this->dataToOrder($dbData)] : false);
    }

    public function getPaginationOrders($limit)
    {
        $sql = "SELECT `order`.id, `order`.status, `order`.created_at, `order`.updated_at, user.login, op.quantity, op.price, product.title, product.alias, category.name AS category
                FROM `order`
                JOIN user ON user.id = `order`.`user_id`
                JOIN order_product as op ON op.order_id = `order`.id
                JOIN product ON product.id = op.product_id
                JOIN product_category ON product_category.product_id = product.id
                JOIN category ON product_category.category_id = category.id
                WHERE user.id = :userID
                LIMIT $limit
                ";
        $dbData = $this->storage->query($sql, ['userID' => 2]);//change user later
        return isset($dbData[0])
            ? $this->dataToOrders($dbData)
            : (!empty($dbData) ? [$this->dataToOrder($dbData)] : false);
    }

    public function getSortOrders($data)
    {
        $where = $this->prepareWhereOrders($data);
        $sort = !empty($data['sortCategory']) ? "ORDER BY $data[sortCategory] $data[sortDirection]" : '';
        $sql = "SELECT `order`.id, `order`.status, `order`.created_at, `order`.updated_at, user.login, op.quantity, op.price, product.title, product.alias, category.name AS category
                FROM `order`
                JOIN user ON user.id = `order`.`user_id`
                JOIN order_product as op ON op.order_id = `order`.id
                JOIN product ON product.id = op.product_id
                JOIN product_category ON product_category.product_id = product.id
                JOIN category ON product_category.category_id = category.id
                $where
                $sort";
        $dbData = $this->storage->query($sql);
        return isset($dbData[0])
            ? $this->dataToOrders($dbData)
            : (!empty($dbData) ? [$this->dataToOrder($dbData)] : false);
    }

    public function saveOrder($order)
    {
        $tempOrder = [
            0 => [
                'id' => 2,
                'quantity' => 1
            ],
            1 => [
                'id' => 3,
                'quantity' => 1
            ],
            2 => [
                'id' => 9,
                'quantity' => 2
            ]
        ];
        if ($this->checkAmountProducts($tempOrder)) {
            $prepareOrder = $this->checkOrderProducts($tempOrder);
            return $this->storage->insertOrder($prepareOrder);
        }
        return false;
    }

    public function getAmountOfProduct($id)
    {
        $sql = "SELECT amount FROM product_storage WHERE storage_id = 1 AND product_id = $id";
        $amount = $this->storage->query($sql);
        return is_array($amount) ? $amount['amount'] : $amount;
    }

    public function getCountOrdersByUser()
    {
        $sql = "SELECT * FROM `order`
                JOIN user ON user.id = `order`.user_id
                JOIN order_product as op ON op.order_id = `order`.id
                WHERE user.id = :userID";
        return $this->storage->countByQuery($sql, ['userID' => 2]);//change user later
    }
}