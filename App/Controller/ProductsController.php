<?php

namespace App\Controller;

use App\Mapper\ProductMapper;
use Framework\Core\Controller;

class ProductsController extends Controller
{

    protected $template = "products";

    public function getProductsPage($request = [])
    {
        extract($request);
        $pageTitle = "ShopPage";
        $mapper = new ProductMapper();
        $products = $mapper->getAllProducts();
        $this->set(compact('pageTitle', 'products'));
        $this->getTemplate();
    }

    public function getProdsByCat($request = [])
    {
        extract($request);
        $pageTitle = "CategoryPage";
        $mapper = new ProductMapper();
        $products = $mapper->getProductsByCaetgory($category);
        $this->set(compact('pageTitle', 'products'));
        $this->getTemplate();
    }

    public function searchProducts($request = [])
    {
        extract($request);
        $pageTitle = "SearchPage";
        $mapper = new ProductMapper();
        $products = $mapper->getProductsBySearch($search);
        $this->set(compact('pageTitle', 'products'));
        $this->getTemplate();
    }
}