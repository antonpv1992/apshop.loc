<?php

namespace App\Controller;

use App\Mapper\ProductMapper;
use Exception;
use Framework\Core\Controller;

class ProductController extends Controller
{

    protected $template = "product";

    public function getProductPage($request = [])
    {
        extract($request);
        $pageTitle = "ProductPage";
        $mapper = new ProductMapper();
        $product = $mapper->getFullProductByAlias($alias);
        if (is_array($product) || $product->getCategory() !== $category) {
            throw new Exception("not found alias", 404);
        }
        $this->set(compact('pageTitle', 'product'));
        $this->getTemplate();
    }

}