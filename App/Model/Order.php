<?php

namespace App\Model;

use Framework\Core\Model;

class Order extends Model
{

    private $id;
    private $user;
    private $category;
    private $alias;
    private $product;
    private $quantity;
    private $price;
    private $status;
    private $createdAt;
    private $updatedAt;

    public function __construct($fields = [])
    {
        $this->id = $fields['id'] ?? "";
        $this->user = $fields['login'] ?? "";
        $this->category = $fields['category'] ?? "";
        $this->alias = $fields['alias'] ?? "";
        $this->product = $fields['title'] ?? "";
        $this->quantity = $fields['quantity'] ?? "";
        $this->price = $fields['price'] ?? "";
        $this->status = $fields['status'] ?? "";
        $this->createdAt = $fields['created_at'] ?? "";
        $this->updatedAt = $fields['updated_at'] ?? "";
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function setUser($user)
    {
        $this->user = $user;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function setCategory($category)
    {
        $this->category = $category;
    }

    public function getAlias()
    {
        return $this->alias;
    }

    public function setAlias($alias)
    {
        $this->alias = $alias;
    }

    public function getProduct()
    {
        return $this->product;
    }

    public function setProduct($product)
    {
        $this->product = $product;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }
}