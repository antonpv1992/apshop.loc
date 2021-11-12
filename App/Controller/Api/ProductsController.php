<?php

namespace App\Controller\Api;

use App\Mapper\FeatureMapper;
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
        $products = $mapper->getProductsByCategory($category);
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
        return [];
    }

    public function search($request = [])
    {
        header('Content-type: application/json');
        $request['search'] = json_decode(file_get_contents('php://input'), true);
        extract($request);
        $mapper = new ProductMapper();
        $products = $mapper->getProductsBySearch($search);
        echo json_encode($this->jsonSerialize($products));
    }

    public function filtered($request = [])
    {
        header('Content-type: application/json');
        $request['data'] = json_decode(file_get_contents('php://input'), true);
        extract($request['data']);
        $mapper = new ProductMapper();
        $products = $mapper->getFilteredProducts($search, $filters);
        echo json_encode($this->jsonSerialize($products));
    }

    public function features($request = [])
    {
        extract($request);
        $mapper = new FeatureMapper();
        $features = $mapper->getFeatures();
        echo json_encode($this->jsonSerialize($features));
    }
}