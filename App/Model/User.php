<?php

namespace App\Model;

use Framework\Core\Model;

class User extends Model
{

    private $id;
    private $login;
    private $email;
    private $password;
    
    public function __construct($fields = [])
    {
        $this->login = $fields['login'] ?? '';
        $this->password = $fields['password'] ?? '';
        $this->email = $fields['email'] ?? ''; 
        $this->id = $fields['id'] ?? '';
    }

    public function getId()
    {
        return $this->id;
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setLogin($login)
    {
        $this->login = $login;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

}