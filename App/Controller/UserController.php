<?php

namespace App\Controller;

use Framework\Core\Controller;
use Framework\Session\Session;

class UserController extends Controller
{

    protected $template = 'home';

    public function getProfile($request = [])
    {
        if(!Session::getSessionKey("login")) {
            header('Location: /');
        }
        extract($request);
        $pageTitle = 'UserPage';
        return compact('pageTitle');
    }

}