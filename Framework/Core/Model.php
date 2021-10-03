<?php

namespace Framework\Core;

abstract class Model
{
    protected $fields = [];
    protected $mapper;

    abstract public function load($field, $value);

    abstract public function save();

    public function getFields()
    {
        return $this->fields;
    }

    public function cleanFields()
    {
        $this->fields = [];
    }
}