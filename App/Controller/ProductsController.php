<?php

namespace App\Controller;

use App\Model\Product;
use Framework\Core\Controller;

class ProductsController extends Controller
{

    protected $template = "products";
    
    public function getProductsPage($request = [])
    {
        if(is_array($request)) {
            extract($request);
        }
        $pageTitle = "ShopPage";
        $model = new Product();
        $products = $model->getAllProducts();
        $this->set(compact('pageTitle', 'products'));
        $this->getTemplate();
    }

    public function getProdsByCat($request = [])
    {
        if(is_array($request)) {
            extract($request);
        }
        $pageTitle = "CategoryPage";
        $model = new Product();
        $products = $model->load('category', ucfirst($category));
        $this->set(compact('pageTitle', 'products'));
        $this->getTemplate();
    }

    public function searchProducts()
    {
        echo "Welcome from search!";
        // to be continue ...
    }
}