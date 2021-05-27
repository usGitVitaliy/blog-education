<?php

namespace Mailman\Mvcframework\Application\Logic;

class ValidateFormInput
{
    public static function lastName($lastName, string &$errorDescription): bool
    {
        if ($lastName == "") {
            $errorDescription = "Фамилия не введена";
            return false;
        }

        if (!preg_match("#^[A-Za-zа-яА-Я]{3,30}$#u", $lastName)) {
            $errorDescription = "Фамилия должна состоять из букв, от 3 до 30 символов";
            return false;
        }

        return true;
    }

    public static function firstName($firstName, string &$errorDescription): bool
    {
        if ($firstName == "") {
            $errorDescription = "Имя не введено";
            return false;
        }

        if (!preg_match("#^[A-Za-zа-яА-Я]{3,30}$#u", $firstName)) {
            $errorDescription = "Имя должно состоять из букв, от 3 до 30 символов";
            return false;
        }

        return true;
    }

    public static function password($password, string &$errorDescription): bool
    {
        if ($password == "") {
            $errorDescription = "Пустые пароли запрещены";
            return false;
        }

        if (!preg_match("#^\S{4,15}$#", $password)) {
            $errorDescription = "Пароль должен состоять от 4 до 15 символов и не содержать пробелов";
            return false;
        }

        return true;
    }
}
