<?php

namespace App\Controller;

use Framework\Core\Controller;

class SignInController extends Controller
{

    protected $template = "sign-in";

    public function getLoginPage($request = [])
    {
        if(is_array($request)) {
            extract($request);
        }
        $pageTitle = "LoginPage";
        $this->set(compact('pageTitle'));
        $this->getTemplate();
    }
    
}