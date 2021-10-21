<?php

namespace App\Controller;

use Framework\Core\Controller;
use Framework\Session\Session;

class LogoutController extends Controller
{

    public function logout($request = [])
    {
        $session = new Session();
        $session->sessionClean();
        header("Location: /");
        exit();
    }

}