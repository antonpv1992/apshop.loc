<?php

namespace App\Model;

use Framework\Core\Model;

class User extends Model
{

    public function __construct()
    {
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

}