<?php

namespace App\Controller;

use Framework\Core\Controller;

class SignUpController extends Controller
{

    protected $template = "sign-up";
    
    public function getRegistrationPage($request = [])
    {
        if(is_array($request)) {
            extract($request);
        }
        $pageTitle = "RegistrationPage";
        $this->set(compact('pageTitle'));
        $this->getTemplate();
    }

    public function registration($request = [])
    {
        if(is_array($request)) {
            extract($request);
        }
    }
    
}