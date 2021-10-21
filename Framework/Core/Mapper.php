<?php

namespace Framework\Core;

use Framework\Database\DB;

class Mapper
{
    protected $storage;

    public function __construct()
    {
        $this->storage = DB::instance();
    }

    public function countQuery($table)
    {
        return $this->storage->countQuery($table);
    }
}