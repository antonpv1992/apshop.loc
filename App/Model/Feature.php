<?php

namespace App\Model;

use Framework\Core\Model;

class Feature extends Model
{
    
    private $screenDiagonal;
    private $screenType;
    private $cpu;
    private $cpuFrequency;
    private $core;
    private $chipset;
    private $ramType;
    private $ramMemory;
    private $memoryType;
    private $memoryAmount;
    private $memorySlot;
    private $graphicsModel;
    private $graphicsMemory;
    private $sim;
    private $simSize;
    private $connector;
    private $camera;
    private $cameraQuantity;
    private $cameraQuality;
    private $module;
    private $battery;
    private $batteryCapacity;
    private $color;
    private $country;
    private $frame;
    private $weight;
    private $system;
    private $category;

    
    public function __construct($fields = [])
    {
        $this->screenDiagonal = $fields['screen_diagonal'] ?? "";
        $this->screenType = $fields['screen_type'] ?? "";
        $this->cpu = $fields['cpu'] ?? "";
        $this->cpuFrequency = $fields['cpu_frequency'] ?? "";
        $this->core = $fields['core'] ?? "";
        $this->chipset = $fields['chipset'] ?? "";
        $this->ramType = $fields['ram_type'] ?? "";
        $this->ramMemory = $fields['ram_memory'] ?? "";
        $this->memoryType = $fields['memory_type'] ?? "";
        $this->memoryAmount = $fields['memory_amount'] ?? "";
        $this->memorySlot = $fields['memory_slot'] ?? "";
        $this->graphicsModel = $fields['graphics_model'] ?? "";
        $this->graphicsMemory = $fields['graphics_memory'] ?? "";
        $this->sim = $fields['sim'] ?? "";
        $this->simSize = $fields['sim_size'] ?? "";
        $this->connector = $fields['connector'] ?? "";
        $this->camera = $fields['camera'] ?? "";
        $this->cameraQuantity = $fields['camera_quantity'] ?? "";
        $this->cameraQuality = $fields['camera_quality'] ?? "";
        $this->module = $fields['module'] ?? "";
        $this->battery = $fields['battery'] ?? "";
        $this->batteryCapacity = $fields['battery_capacity'] ?? "";
        $this->color = $fields['color'] ?? "";
        $this->country = $fields['country'] ?? "";
        $this->frame = $fields['frame'] ?? "";
        $this->weight = $fields['weight'] ?? "";
        $this->system = $fields['system'] ?? "";
        $this->category = $fields['category'] ?? "";
    }

    public function getScreenDiagonal()
    {
        return $this->screenDiagonal;
    }

    public function getScreenType()
    {
        return $this->screenType;
    }

    public function getCpu()
    {
        return $this->cpu;
    }

    public function getCpuFrequency()
    {
        return $this->cpuFrequency;
    }

    public function getCore()
    {
        return $this->core;
    }

    public function getChipset()
    {
        return $this->chipset;
    }

    public function getRamType()
    {
        return $this->ramType;
    }

    public function getRamMemory()
    {
        return $this->ramMemory;
    }

    public function getMemoryType()
    {
        return $this->memoryType;
    }

    public function getMemoryAmount()
    {
        return $this->memoryAmount;
    }

    public function getMemorySlot()
    {
        return $this->memorySlot;
    }

    public function getGraphicsModel()
    {
        return $this->graphicsModel;
    }

    public function getGraphicsMemory()
    {
        return $this->graphicsMemory;
    }

    public function getSim()
    {
        return $this->sim;
    }

    public function getSimSize()
    {
        return $this->simSize;
    }

    public function getConnector()
    {
        return $this->connector;
    }

    public function getCamera()
    {
        return $this->camera;
    }

    public function getCameraQuality()
    {
        return $this->cameraQuality;
    }

    public function getCameraQuantity()
    {
        return $this->cameraQuantity;
    }

    public function getModule()
    {
        return $this->module;
    }

    public function getBattery()
    {
        return $this->battery;
    }

    public function getBatteryCapacity()
    {
        return $this->batteryCapacity;
    }

    public function getColor()
    {
        return $this->color;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function getFrame()
    {
        return $this->frame;
    }

    public function getWeight()
    {
        return $this->weight;
    }

    public function getSystem()
    {
        return $this->system;
    }

    public function getCategory()
    {
        return $this->category;    
    }

    public function setScreenDiagonal($screenDiagonal)
    {
        $this->screenDiagonal = $screenDiagonal;
    }

    public function setScreenType($screenType)
    {
        $this->screenType = $screenType;
    }

    public function setCpu($cpu)
    {
        $this->cpu = $cpu;
    }

    public function setCpuFrequency($cpuFrequency)
    {
        $this->cpuFrequency = $cpuFrequency;
    }

    public function setCore($core)
    {
        $this->core = $core;
    }

    public function setChipset($chipset)
    {
        $this->chipset = $chipset;
    }

    public function setRamType($ramType)
    {
        $this->ramType = $ramType;
    }

    public function setRamMemory($ramMemory)
    {
        $this->ramMemory = $ramMemory;
    }

    public function setMemoryType($memoryType)
    {
        $this->memoryType = $memoryType;
    }

    public function setMemoryAmount($memoryAmount)
    {
        $this->memoryAmount = $memoryAmount;
    }

    public function setMemorySlot($memorySlot)
    {
        $this->memorySlot = $memorySlot;
    }

    public function setGraphicsModel($graphicsModel)
    {
        $this->graphicsModel = $graphicsModel;
    }

    public function setGraphicsMemory($graphicsMemory)
    {
        $this->graphicsMemory = $graphicsMemory;
    }

    public function setSim($sim)
    {
        $this->sim = $sim;
    }

    public function setSimSize($simSize)
    {
        $this->simSize = $simSize;
    }
    
    public function setConnector($connector)
    {
        $this->connector = $connector;
    }

    public function setCamera($camera)
    {
        $this->camera = $camera;
    }

    public function setCameraQuality($cameraQuality)
    {
        $this->cameraQuality = $cameraQuality;
    }

    public function setCameraQuantity($cameraQuantity)
    {
        $this->cameraQuantity = $cameraQuantity;
    }

    public function setModule($module)
    {
        $this->module = $module;
    }

    public function setBattery($battery)
    {
        $this->battery = $battery;
    }

    public function setBatteryCapacity($batteryCapacity)
    {
        $this->batteryCapacity = $batteryCapacity;
    }

    public function setColor($color)
    {
        $this->color = $color;
    }

    public function setCountry($country)
    {
        $this->country = $country;
    }

    public function setFrame($frame)
    {
        $this->frame = $frame;
    }

    public function setWeight($weight)
    {
        $this->weight = $weight;
    }

    public function setSystem($system)
    {
        $this->system = $system;
    }

    public function setCategory($category)
    {
        $this->category = $category;    
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}