<?php

namespace App\Controller;

use Framework\Core\Controller;

class UserController extends Controller
{

    protected $template = "home";

    public function getProfile($request = [])
    {
        
        if(is_array($request)) {
            extract($request);
        }
        $pageTitle = "UserPage";
        $this->set(compact('pageTitle'));
        $this->getTemplate();
    }
    
}