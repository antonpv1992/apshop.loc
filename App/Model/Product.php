<?php

namespace App\Model;

use Framework\Core\Model;

class Product extends Model
{

    private $id;
    private $title;
    private $fullTitle;
    private $description;
    private $brand;
    private $category;
    private $price;
    private $oldPrice;
    private $alias;
    private $image;
    private $features;
    private $isNew;
    private $isHot;

    public function __construct($fields = [])
    {
        $this->id = $fields["id"] ?? "";
        $this->title = $fields["title"] ?? "";
        $this->fullTitle = $fields["full_title"] ?? "";
        $this->description = $fields["description"] ?? "";
        $this->brand = $fields["brand"] ?? "";
        $this->category = $fields["category"] ?? "";
        $this->price = $fields["price"] ?? "";
        $this->oldPrice = $fields["old_price"] ?? "";
        $this->alias = $fields["alias"] ?? "";
        $this->image = $fields["image"] ?? "";
        $this->features = $fields["features"] ?? [];
        $this->isNew = $fields["new"] ?? "";
        $this->isHot = $fields["hot"] ?? "";
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getFullTitle()
    {
        return $this->fullTitle;
    }

    public function setFullTitle($fullTitle)
    {
        $this->fullTitle = $fullTitle;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getBrand()
    {
        return $this->brand;
    }

    public function setBrand($brand)
    {
        $this->brand = $brand;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function setCategory($category)
    {
        $this->category = $category;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getOldPrice()
    {
        return $this->oldPrice;
    }

    public function setOldPrice($oldPrice)
    {
        $this->oldPrice = $oldPrice;
    }

    public function getAlias()
    {
        return $this->alias;
    }

    public function setAlias($alias)
    {
        $this->alias = $alias;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

    public function getFeatures()
    {
        return $this->features;
    }

    public function setFeatures($features)
    {
        $this->features = $features;
    }

    public function getNew()
    {
        return $this->isNew;
    }

    public function getHot()
    {
        return $this->isHot;
    }

    public function setNew($new)
    {
        $this->isNew = $new;
    }

    public function setHot($hot)
    {
        $this->isHot = $hot;
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}