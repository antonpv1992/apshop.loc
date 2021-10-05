<?php

namespace App\Controller;

use Framework\Core\Controller;

class HomeController extends Controller
{
    protected $template = "home"; 

    public function getHomePage($request = [])
    {
        if(is_array($request)) {
            extract($request);
        }
        $pageTitle = "HomePage";
        $this->set(compact('pageTitle'));
        $this->getTemplate();
    }

}