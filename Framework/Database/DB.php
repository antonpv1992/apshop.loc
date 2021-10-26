<?php

namespace Framework\Database;

use Exception;

class DB
{
    private static $instance;
    private $db;

    private function __construct()
    {
        require_once ROOT. DS . "conf.php";
        $options = [
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
        ];
        $this->db = new \PDO(DB_CONNECTION . ":host=" . DB_HOST . ";dbname=" . DB_DATABASE . ";charset=utf8",
                        DB_USERNAME, DB_PASSWORD, $options);
    }

    public static function instance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function query($sql, $params = [])
    {
        $stmt = $this->db->prepare($sql);
        foreach ($params as $key => $param) {
            $stmt->bindParam($key, $param);
        }
        if ($stmt->execute($params) !== false) {
            return $stmt->rowCount() > 1 ? $stmt->fetchAll() : $stmt->fetch();
        }
        return [];
    }

    public function countQuery($table)
    {
        $stmt = $this->db->prepare("SELECT * FROM $table");
        if ($stmt->execute([]) !== false) {
            return $stmt->rowCount();
        }
        return false;
    }

    public function countByQuery($sql, $params = [])
    {
        $stmt = $this->db->prepare($sql);
        foreach ($params as $key => $param) {
            $stmt->bindParam($key, $param);
        }
        if ($stmt->execute($params) !== false) {
            return $stmt->rowCount();
        }
        return false;
    }

    public function insertOrder($data)
    {
        $this->db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        try {
            $this->db->beginTransaction();
            $sql = "INSERT INTO `order` (user_id, created_at, updated_ad) VALUES (" . $data[0]['userId'] . ", now(), now())";
            $this->transactionQuery($sql);
            $orderId = $this->db->lastInsertId();
            $this->insertOrderProduct($data, $orderId);
            $this->db->commit();
        } catch (Exception $e) {
            throw new Exception('transaction failed');
        }
        return true;
    }

    private function transactionQuery($sql, $params = [])
    {
        $stmt = $this->db->prepare($sql);
        return $stmt->execute($params);
    }

    private function insertOrderProduct($orders, $orderId)
    {
        foreach ($orders as $order) {
            extract($order);
            $sql = "INSERT INTO order_product (product_id, order_id, quantity, price) VALUES ($productId, $orderId, $quantity, $price)";
            $this->transactionQuery($sql);
            $sql = "UPDATE product_storage SET amount = amount - $quantity WHERE product_id = $productId AND storage_id = 1";
            $this->transactionQuery($sql);
        }
    }
}