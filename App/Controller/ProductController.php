<?php

namespace App\Controller;

use App\Model\Product;
use Exception;
use Framework\Core\Controller;

class ProductController extends Controller
{

    protected $template = "product";
    public function getProductPage($request = [])
    {
        if(is_array($request)) {
            extract($request);
        }
        $pageTitle = "ProductPage";
        $model = new Product();
        $product = [];
        if($model->load("alias", $alias) 
            && $model->load("alias", $alias)[0]->getCategory() === ucfirst($category))
        {
            $product = $model->load("alias", $alias)[0];
        } else {
            throw new Exception("not found alias", 404);
        }
        $this->set(compact('pageTitle', 'product'));
        $this->getTemplate();
    }

}