<?php

namespace App\Controller;

use App\Mapper\UserMapper;
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
        extract($request);
        $mapper = new UserMapper();
        $user = $mapper->getUserByLogin($login);
        if ($mapper->checkLoginData($user, ['login' => $login, 'password' => $password])) {
            $session = new Session();
            $session->setKeyInSession('login', $user[0]->getLogin());
            $session->setKeyInSession('email', $user[0]->getEmail());
            $session->setKeyInSession('password', $user[0]->getPassword());
            $session->setKeyInSession('id', $user[0]->getId());
            header('Location: /');
            return [];
        }
        header('Location: /login');
        return [];
    }

}