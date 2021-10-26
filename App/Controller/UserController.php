<?php

namespace App\Controller;

use Framework\Core\Controller;

class UserController extends Controller
{

    protected $template = 'home';

    public function getProfile($request = [])
    {
        extract($request);
        $pageTitle = 'UserPage';
        return compact('pageTitle');
    }

}