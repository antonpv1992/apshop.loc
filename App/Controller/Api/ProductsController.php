<?php

namespace App\Controller\Api;

use App\Mapper\ProductMapper;
use Framework\Core\Controller;

class ProductsController extends Controller
{

    protected $template = "";

    public function read($request = [])
    {
        $mapper = new ProductMapper();
        $products = $mapper->getAllProducts();
        echo json_encode($this->jsonSerialize($products));
        return [];
    }
}