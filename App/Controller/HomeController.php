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

    public function testPost()
    {
        echo "test post request!";
    }

    public function testPatch()
    {
        echo "test patch request!";
    }

    public function testDelete()
    {
        echo "test delete request!";
    }

}