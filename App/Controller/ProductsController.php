<?php

namespace App\Controller;

use App\Mapper\ProductMapper;
use Framework\Core\Controller;

class ProductsController extends Controller
{

    protected $template = 'products';

    public function getProductsPage($request = [])
    {
        extract($request);
        $pageTitle = 'ShopPage';
        $mapper = new ProductMapper();
        $products = $mapper->getAllProducts();
        return compact('pageTitle', 'products');
    }

    public function getProdsByCat($request = [])
    {
        extract($request);
        $pageTitle = 'CategoryPage';
        $mapper = new ProductMapper();
        $products = $mapper->getProductsByCaetgory($category);
        return compact('pageTitle', 'products');
    }

    public function searchProducts($request = [])
    {
        extract($request);
        $pageTitle = 'SearchPage';
        $mapper = new ProductMapper();
        $products = $mapper->getProductsBySearch($search);
        return compact('pageTitle', 'products');
    }
}