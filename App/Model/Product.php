<?php

namespace App\Model;

use Framework\Core\Model;
use App\Mapper\ProductMapper;

class Product extends Model
{

    private $name;
    private $id;
    private $alias;
    private $category;
    private $brand;
    private $price;
    private $oldprice;
    private $desc;
    private $screen;
    private $cpu;
    private $ram;
    private $ssd;
    private $hdd;
    private $graphics;
    private $color;
    private $chipset;
    private $ramType;
    private $system;
    private $hdmi;
    private $wifi;
    private $country;
   
    public function __construct($fields = [])
    {
        $this->mapper = new ProductMapper();
        $this->name = $fields["name"] ?? "";
        $this->id = $fields["id"] ?? "";
        $this->alias = $fields["alias"] ?? "";
        $this->image = $fields["image"] ?? "";
        $this->category = $fields["category"] ?? "";
        $this->brand = $fields["brand"] ?? "";
        $this->price = $fields["price"] ?? "";
        $this->oldprice = $fields["old_price"] ?? "";
        $this->desc = $fields["desc"] ?? "";
        $this->screen = $fields["screen"] ?? "";
        $this->cpu = $fields["cpu"] ?? "";
        $this->ram = $fields["ram"] ?? "";
        $this->ssd = $fields["ssd"] ?? "";
        $this->hdd = $fields["hdd"] ?? "";
        $this->graphics = $fields["graphics_card"] ?? "";
        $this->cores =  $fields["cores"] ?? "";
        $this->color = $fields["color"] ?? "";
        $this->chipset = $fields["chipset"] ?? "";
        $this->ramType = $fields["type_of_ram"] ?? "";
        $this->system = $fields["system"] ?? "";
        $this->hdmi = $fields["hdmi"] ?? "";
        $this->wifi = $fields["wifi"] ?? "";
        $this->country = $fields["country"] ?? "";
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
        $objProd = new Product($data);
        return $objProd;
    }

    public function setProducts($products)
    {
        $objProducts = [];
        $index = 0;
        foreach($products as $product){
            $obj = $this->setProduct($product);
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
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function getBrand()
    {
        return $this->brand;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function getDesc()
    {
        return $this->desc;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getOldPrice()
    {
        return $this->oldprice;
    }

    public function getAlias()
    {
        return $this->alias;
    }

    public function getScreen()
    {
        return $this->screen;
    }

    public function getCpu()
    {
        return $this->cpu;
    }

    public function getRam()
    {
        return $this->ram;
    }

    public function getSsd()
    {
        return $this->ssd;
    }

    public function getHdd()
    {
        return $this->hdd;
    }

    public function getGraphics()
    {
        return $this->graphics;
    }

    public function getColor()
    {
        return $this->color;
    }

    public function getCores()
    {
        return $this->cores;
    }

    public function getChipset()
    {
        return $this->chipset;
    }

    public function getRamType()
    {
        return $this->ramType;
    }

    public function getSystem()
    {
        return $this->system;
    }

    public function getHdmi()
    {
        return $this->hdmi;
    }

    public function getWifi()
    {
        return $this->wifi;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function getFeatures()
    {
        return [
            "screen" => $this->getScreen(),
            "cpu" => $this->getCpu(),
            "ram" => $this->getRam(),
            "ssd" => $this->getSsd(),
            "hdd" => $this->getHdd(),
            "graphics" => $this->getGraphics(),
            "color" => $this->getColor(),
            "cores" => $this->getCores(),
            "chipset" => $this->getChipset(),
            "type" => $this->getRamType(),
            "system" => $this->getSystem(),
            "hdmi" => $this->getHdmi(),
            "wifi" => $this->getWifi(),
            "country" => $this->getCountry()
        ];
    }

    public function setName($name)
    {
        $this->name = $name;    
    }
}