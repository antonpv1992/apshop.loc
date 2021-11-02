<?php

namespace App\Controller\Api;

use App\Mapper\UserMapper;
use Framework\Core\Controller;

class UserController extends Controller
{

    protected $template = "";

    public function read($request = [])
    {
        $mapper = new UserMapper();
        $users = $mapper->getUsers();
        header('Content-type: application/json');
        echo json_encode($this->jsonSerialize($users));
        return [];
    }

    public function show($request = [])
    {
        extract($request);
        $mapper = new UserMapper();
        $user = $mapper->getUserById($id);
        header('Content-type: application/json');
        echo json_encode($this->jsonSerialize($user));
        return [];
    }
}