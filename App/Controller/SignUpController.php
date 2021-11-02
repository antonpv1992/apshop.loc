<?php

namespace App\Controller;

use App\Mapper\UserMapper;
use Framework\Core\Controller;
use Framework\Session\Session;

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
        //print_r($request);
        extract($request);
        //echo $login . $email . $password . $confirm_password;
        $mapper = new UserMapper();
        if(!$mapper->saveUser(['login' => $login, 'email' => $email, 'password' => $password, 'confirm_password' => $confirm_password])) {
            $session = new Session();
            $user = $mapper->getUserByLogin($login);
            $session->setKeyInSession('login', $user[0]->getLogin());
            $session->setKeyInSession('email', $user[0]->getEmail());
            $session->setKeyInSession('password', $user[0]->getPassword());
            $session->setKeyInSession('id', $user[0]->getId());
            header('Location: /');
            return [];
        }
        header('Location: /registration');
        return [];
    }

}