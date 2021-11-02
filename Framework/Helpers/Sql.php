<?php

namespace Framework\Helpers;

class Sql
{

    public function select($fields, $table = "")
    {
        if (!$fields) {
            return "";
        }
        $sql = "SELECT ";
        foreach($fields as $field) {
            $sql .= "$field, ";
        }
        $sql = substr($sql, 0, -2) . " FROM $table";
        return $sql;
    }

    public function join($conditions)
    {
        if (!$conditions) {
            return "";
        }
        $sql = "";
        foreach($conditions as $table => $condition) {
            $sql .= " JOIN $table ON $condition"; 
        } 
        return $sql;
    }

    public function concat($condition, $name = "", $distinct = "")
    {
        if(!$condition) {
            return "";
        }
        return " GROUP_CONCAT($distinct $condition) AS $name";
    }

    public function where($conditions = [])
    {
        if (!$conditions) {
            return "";
        }
        $sql = " WHERE";
        foreach ($conditions as $condition) {
            foreach($condition as $params => $operator) {
                $sql .= " $operator $params";
            }
        }
        return $sql;
    }

    public function order($order, $direction = "DESC")
    {
        if (!$order) {
            return "";
        }
        return " ORDER BY $order $direction";
    }

    public function limit($limit)
    {
        if (!$limit) {
            return "";
        }
        return " LIMIT $limit";
    }

    public function group($field)
    {
        if (!$field) {
            return "";
        }
        return " GROUP BY $field";
    }

    public function update()
    {

    }

    public function insert($table, $fields, $values)
    {
        return "INSERT INTO $table ($fields) VALUES ($values)";
    }

    public function delete()
    {

    }
}