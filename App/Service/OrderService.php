<?php

namespace App\Service;

use App\Mapper\ProductMapper;
use App\Model\Order;

trait OrderService
{
    protected function dataToOrder($data)
    {
        if (empty($data)) {
            return [];
        }
        return new Order($data);
    }

    protected function dataToOrders($data)
    {
        if (empty($data)) {
            return [];
        }
        $orders = [];
        foreach ($data as $order) {
            array_push($orders, new Order($order));
        }
        return $orders;
    }

    private function prepareWhereOrders($data)
    {
        $where = '';
        foreach ($data['filter'] as $filter) {
            $where .= $where === ''
                ? "WHERE user.id = 2 AND $filter LIKE '%$data[search]%' " //change user later
                : "OR $filter LIKE '%$data[search]%' ";
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