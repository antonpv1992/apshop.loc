<?php

namespace App\Service;

trait StringService 
{
    private function upperCamelCase(string $name)
    {
        return str_replace(' ', '', ucwords(str_replace('-', ' ', $name)));
    }

    private function lowerCamelCase(string $name)
    {
        return lcfirst($this->upperCamelCase($name));
    }

    private function transliterate($text)
    {
        $alphabet = [
            "а" => "a", "б" => "b", "в" => "v", "г" => "g", "д" => "d", "е" => "e", "ё" => "yo",
            "ж" => "j", "з" => "z", "и" => "i", "й" => "i", "к" => "k", "л" => "l", "м" => "m",
            "н" => "n", "о" => "o", "п" => "p", "р" => "r", "с" => "s", "т" => "t", "у" => "y",
            "ф" => "f", "х" => "h", "ц" => "c", "ч" => "ch", "ш" => "sh", "щ" => "sh", "ы" => "i",
            "э" => "e", "ю" => "u", "я" => "ya", "А" => "A", "Б" => "B", "В" => "V", "Г" => "G",
            "Д" => "D", "Е" => "E", "Ё" => "Yo", "Ж" => "J", "З" => "Z", "И" => "I", "Й" => "I",
            "К" => "K", "Л" => "L", "М" => "M", "Н" => "N", "О" => "O", "П" => "P", "Р" => "R",
            "С" => "S", "Т" => "T", "У" => "Y", "Ф" => "F", "Х" => "H", "Ц" => "C", "Ч" => "Ch",
            "Ш" => "Sh", "Щ" => "Sh", "Ы" => "I", "Э" => "E", "Ю" => "U", "Я" => "Ya", "ь" => "",
            "Ь" => "", "ъ" => "", "Ъ" => "", "ї" => "j", "і" => "i", "ґ" => "g", "є" => "ye",
            "Ї" => "J","І" => "I","Ґ" => "G","Є" => "YE"
        ];
        $symbols = ["-", "_", "/", "\\", "@", "$", "^", "&", "*", "~", "`"];
        return str_ireplace($symbols, "-", strtr($text, $alphabet));
    }

    private function generateAlias($text)
    {
        return strtolower(
            implode(
                "-",
                array_filter(
                    explode(' ', $this->transliterate($text)),
                    function ($key) {
                        return $key !== "-";
                    }
                )
            )
        );
    }

    private function aliasCollision($alias)
    {
        $array = explode("-", $alias);
        if (is_numeric($array[count($array) - 1])) {
            $array[count($array) - 1]++;
        } else {
            array_push($array, '1');
        }
        return implode("-", $array);
    }

    private function camelToSlesh($text)
    {
        $temp = preg_split('/(?<=[а-я,a-z])(?=[А-Я,A-Z])/u', $text);
        return strtolower(implode('-', $temp));
    }

    private function sleshToCamel($text)
    {
        $temp = explode('-', $text);
        $res = $temp[0];
        for ($i = 1; $i < count($temp); $i++) {
            $res .= ucfirst($temp[$i]);
        }
        return $res;
    }
}