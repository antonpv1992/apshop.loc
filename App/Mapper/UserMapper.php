<?php

namespace App\Mapper;

use Framework\Core\Mapper;
use Framework\Helpers\Sql;
use App\Service\UserService;

class UserMapper extends Mapper
{
    protected $model = 'App\\Model\\User';
    protected $table = 'user';

    use UserService;

    public function getUsers()
    {
        $sqlO = new Sql();
        $sql = $sqlO->select(['*'], $this->table);
        $dbData = $this->storage->query($sql);
        return $this->getMapObjects($dbData);
    }

    public function getUserByEmail($email)
    {
        $sqlO = new Sql();
        $sql = $sqlO->select(['*'], $this->table) . $sqlO->where([['email = :email' => ""]]);
        $dbData = $this->storage->query($sql, ['email' => $email]);
        return $this->getMapObjects($dbData);
    }

    public function getUserByLogin($login)
    {
        $sqlO = new Sql();
        $sql = $sqlO->select(['*'], $this->table) . $sqlO->where([['login = :login' => ""]]);
        $dbData = $this->storage->query($sql, ['login' => $login]);
        return $this->getMapObjects($dbData);
    }

    public function getUserById($id)
    {
        $sqlO = new Sql();
        $sql = $sqlO->select(['*'], $this->table) . $sqlO->where([['id = :id' => ""]]);
        $dbData = $this->storage->query($sql, ['id' => $id]);
        return $this->getMapObjects($dbData);
    }

    public function saveUser($data)
    {
        if(!$this->checkRegistrationData($data)) {
            return false;
        }
        unset($data['confirm_password']);
        $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
        $sqlO = new Sql();
        $insertFieldsAndData = $this->prepareInsertFields($data);
        foreach($insertFieldsAndData as $fields => $values) {
            $sql = $sqlO->insert($this->table, $fields, $values);
        }
        return $this->storage->query($sql);
    }
}