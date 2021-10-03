<?php

namespace App\Controller;

use Framework\Core\Controller;

class CartController extends Controller
{
    
    protected $template = "cart";
    
    public function getCartPage($request = [])
    {
        if(is_array($request)) {
            extract($request);
        }
        $pageTitle = "CartPage";
        $this->set(compact('pageTitle'));
        $this->getTemplate();
    }
    
}