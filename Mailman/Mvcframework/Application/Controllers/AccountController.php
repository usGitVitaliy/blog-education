<?php

namespace Mailman\Mvcframework\Application\Controllers;

use Mailman\Mvcframework\Application\Core\Controller;

class AccountController extends Controller
{
    public function loginAction()
    {
        $layoutPath = LAYOUTS_PATH . "default/layout.php";
        $layoutData = ["title" => "Авторизация", "currentPage--nav-a" => "Логин"];

        $this->action(__CLASS__, __METHOD__, $layoutPath, $layoutData);
    }

    public function registrationAction()
    {
        $layoutPath = LAYOUTS_PATH . "default/layout.php";
        $layoutData = ["title" => "Регистрация", "currentPage--nav-a" => "Регистрация"];

        $this->action(__CLASS__, __METHOD__, $layoutPath, $layoutData);
    }
}
