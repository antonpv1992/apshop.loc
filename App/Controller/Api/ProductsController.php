<?php

namespace App\Controller\Api;

use App\Mapper\ProductMapper;
use App\Mapper\OrderMapper;
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

    public function readNew($request = [])
    {
        $mapper = new ProductMapper();
        $products = $mapper->getHomeProducts('new');
        echo json_encode($this->jsonSerialize($products));
        return [];
    }

    public function readHot($request = [])
    {
        $mapper = new ProductMapper();
        $products = $mapper->getHomeProducts('hot');
        echo json_encode($this->jsonSerialize($products));
        return [];
    }

    public function product($request = [])
    {
        extract($request);
        $mapper = new ProductMapper();
        $product = $mapper->getFullProductByAlias($alias);
        echo json_encode($this->jsonModelSerialize($product));
        return [];
    }

    public function category($request = [])
    {
        extract($request);
        $mapper = new ProductMapper();
        $products = $mapper->getProductsByCaetgory($category);
        echo json_encode($this->jsonSerialize($products));
        return [];
    }

    public function order($request = [])
    {
        header('Content-type: application/json');
        $request['order'] = json_decode(file_get_contents('php://input'), true);
        extract($request);
        $mapper = new OrderMapper();
        echo json_encode($mapper->saveOrder($order));
    }
}