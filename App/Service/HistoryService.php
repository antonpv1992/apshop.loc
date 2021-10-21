<?php

namespace App\Service;

trait HistoryService
{
    private function prepareSortData($data)
    {
        $result = [];
        $result['search'] = $data['hsearch'] ?? "";
        $result['filter'] = isset($data['hfilter'])
            ? $this->replaceFields($data['hfilter'])
            : [0 => 'product.title'];
        $result['sortCategory'] = isset($data['hsort'])
            ? $this->replaceFields(explode('-', $data['hsort'])[0])
            : "";
        $result['sortDirection'] = isset($data['hsort'])
            ? $this->replaceDirection(explode('-', $data['hsort'])[1])
            : "";
        return $result;
    }


    private function replaceFields($fields)
    {
        if (is_array($fields)) {
            foreach ($fields as $fieldKey => $field) {
                $fields[$fieldKey] = $this->replaceField($field);
            }
        } else {
            $fields = $this->replaceField($fields);
        }
        return $fields;
    }


    private function replaceField($field)
    {
        $dbAssoc = [
            'user' => 'user.login',
            'product' => 'product.title'
        ];

        foreach ($dbAssoc as $key => $value) {
            if ($field === $key) {
                $field = $value;
                return $field;
            }
        }
        return $field;
    }

    private function replaceDirection($field)
    {
        return $field === 'up' ? 'ASC' : ($field === 'down' ? 'DESC' : "");
    }
}