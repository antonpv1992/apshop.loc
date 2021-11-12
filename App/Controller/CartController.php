<?php

namespace App\Controller;

use Framework\Core\Controller;
use Framework\Session\Session;

class CartController extends Controller
{

    protected $template = 'cart';

    public function getCartPage($request = [])
    {
        if(!Session::getSessionKey("login")) {
            header('Location: /');
        }
        extract($request);
        $pageTitle = 'CartPage';
        return compact('pageTitle');
    }

}