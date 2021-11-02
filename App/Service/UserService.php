<?php 

namespace App\Service;

trait UserService 
{
    
    private function prepareInsertFields($data)
    {
        $array = [];
        $fields = 'id, ';
        $values = $this->tableMaxID() + 1 . ', ' ;
        foreach ($data as $field => $value) {
            $fields .= $field . ', ';
            $values .= "'". $value . "'" . ', ';
        }
        $array[substr($fields, 0, -2)] = substr($values, 0, -2);
        return $array;
    }

    public function checkRegistrationData($data)
    {
        if ($this->getUserByEmail($data['email']) 
            || $this->getUserByLogin($data['login'])
            || $data['password'] !== $data['confirm_password']) 
            {
            return false;
            }
        return true;
    }

    public function checkLoginData($user, $data)
    {
        if($user && ($user[0]->getLogin() === $data['login'] && password_verify($data['password'], $user[0]->getPassword()))){
            return true;
        }
        return false;
    }

    private function tableMaxID()
    {
        $sql = "SELECT MAX(id) FROM user";
        $id = $this->storage->query($sql);
        return $id['MAX(id)'];
    }
}