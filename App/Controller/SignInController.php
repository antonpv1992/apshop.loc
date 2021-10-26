<?php

namespace App\Controller;

use Framework\Core\Controller;
use Framework\Session\Session;

class SignInController extends Controller
{

    protected $template = 'sign-in';

    public function getLoginPage($request = [])
    {
        extract($request);
        $pageTitle = 'LoginPage';
        return compact('pageTitle');
    }

    public function authorization($request = [])
    {
        $reg_email = 'admin@apshop.com';
        $reg_pass = 'qwerty';
        extract($request);
        if ($email === $reg_email && $password === $reg_pass) {
            $session = new Session();
            $session->setKeyInSession('email', $email);
            $session->setKeyInSession('password', $password);
            header('Location: /');
            return [];
        }
        header('Location: /login');
        return [];
    }

}