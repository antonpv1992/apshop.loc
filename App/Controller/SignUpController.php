<?php

namespace App\Controller;

use Framework\Core\Controller;

class SignUpController extends Controller
{

    protected $template = 'sign-up';

    public function getRegistrationPage($request = [])
    {
        extract($request);
        $pageTitle = 'RegistrationPage';
        return compact('pageTitle');
    }

    public function registration($request = [])
    {
        extract($request);
    }

}