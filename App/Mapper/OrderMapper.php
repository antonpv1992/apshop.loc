<?php

namespace App\Mapper;

use App\Service\OrderService;
use Framework\Core\Mapper;
use Framework\Helpers\Sql;
use Framework\Session\Session;

class OrderMapper extends Mapper
{

    use OrderService;

    protected $table = "`order`";
    protected $model = "App\\Model\\Order";

    public function getAllOrders()
    {
        $sql = $this->ordersQuery([['user.id = :userID' => ""]]);
        $dbData = $this->storage->query($sql, ['userID' => Session::getSessionKey("id")]);
        return $this->getMapObjects($dbData);
    }

    public function getPaginationOrders($limit)
    {
        $sql = $this->ordersQuery([['user.id = :userID' => ""]], false, false, $limit);
        $dbData = $this->storage->query($sql, ['userID' => Session::getSessionKey("id")]);
        return $this->getMapObjects($dbData);
    }

    public function getSortOrders($data, $limit = false)
    {
        $where = $this->prepareWhereOrders($data);
        $order = $direction = false;
        if(!empty($data['sortCategory'])) {
            $order = $data['sortCategory'];
            $direction = $data['sortDirection'];
        }
        $sql = $this->ordersQuery($where, $order, $direction, $limit);
        $dbData = $this->storage->query($sql);
        return $this->getMapObjects($dbData);
    }

    public function countPaginateOrders($data)
    {
        $where = $this->prepareWhereOrders($data);
        $order = $direction = false;
        if(!empty($data['sortCategory'])) {
            $order = $data['sortCategory'];
            $direction = $data['sortDirection'];
        }
        $sql = $this->ordersQuery($where, $order, $direction);
        $dbData = $this->storage->query($sql);
        return $dbData ? (isset($dbData[0]) ? count($dbData) : 1) : 1;
    }

    public function saveOrder($order)
    {
        if ($this->checkAmountProducts($order)) {
            $prepareOrder = $this->checkOrderProducts($order);
            $this->storage->insertOrder($prepareOrder);
        }
        return false;
    }

    public function getAmountOfProduct($id)
    {
        $sqlO = new Sql();
        $sql = $sqlO->select(['amount'], 'product_storage') . $sqlO->where([['storage_id = 1' => ""], ["product_id = $id" => "AND"]]);
        $amount = $this->storage->query($sql);
        return is_array($amount) ? $amount['amount'] : $amount;
    }

    public function getCountOrdersByUser($id)
    {
        $sqlO = new Sql();
        $sql = $sqlO->select(['*'], $this->table) 
            . $sqlO->join([
                'user' => "user.id = `order`.user_id", 
                'order_product as op' => "op.order_id = `order`.id"
                ]) 
            . $sqlO->where([["user.id = :userID" => ""]]);
        return $this->storage->countByQuery($sql, ['userID' => $id]);
    }
}