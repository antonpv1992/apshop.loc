<?php

namespace Framework\Database;

class DB 
{
    public $db = [];
    
    public function __construct()
    {
        $this->db = require CONFIGS . DS . "dbconfig.php";
    }

    public function getData()
    {
        return $this->db;
    }
}