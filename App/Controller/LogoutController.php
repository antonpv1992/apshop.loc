<?php

namespace App\Controller;

use Framework\Core\Controller;
use Framework\Session\Session;

class LogoutController extends Controller
{

    protected $template = "";
    
    public function logout($request = [])
    {
        $session = new Session();
        $session->sessionClean();
        header('Location: /');
        return [];
    }

}