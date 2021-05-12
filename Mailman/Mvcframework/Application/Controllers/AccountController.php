<?php

namespace Mailman\Mvcframework\Application\Controllers;

use Mailman\Mvcframework\Application\Core\Controller;
use Mailman\Mvcframework\Application\Models\AuthorsModel;
use Mailman\Mvcframework\library\WorkingWithDB\Author;
use Mailman\Mvcframework\Application\Core\View;

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

    //валидация данных регистрации
    //***
    //валидация: логин должен быть введен цифрами и английскими символами, начинать с буквы
    //валидация: введенный логин не должен присутствовать в БД
    public function validateAction()
    {
        $layoutPath = LAYOUTS_PATH . "default/layout.php";

        $layoutData = [
            "title" => "Регистрация",
            "currentPage--nav-a" => "Регистрация",
        ];

        if (isset($_POST["login-user"])) {
            $login = $_POST["login-user"];
        } else {
            $login = "";
        }

        if (preg_match("#^[a-zA-Z]\w{2,}$#", $login)) {
            //echo "Логин введен правильно<br><br>";

            $authorModel = new AuthorsModel();

            if (!$this->loginContainsInDataBase($login, $authorModel->getArrayAllLogins())) {
                //echo "Логина нет в базе<br>";
                $view_FilePath = VIEW_PATH . "/Account/registered.html";

                $author = new Author(
                    $_POST["lastname-user"],
                    $_POST["firstname-user"],
                    $login,
                    null,
                    $_POST["password-user"]
                );

                $authorModel->addAuthorToDB($author);
            } else {
                //echo "Логин есть в базе !!!!!!!!!!!!!!<br>";
                $view_FilePath =  VIEW_PATH . "/Account/registration.php";
                $layoutData["login-is-present"] = ": <span style='color: red;'>введенный логин уже существует</span>";
            }
        } else {
            //echo "Логин введен НЕ правильно<br><br>";

            $view_FilePath = VIEW_PATH . "/Account/validateRegistration.php";
            $layoutData["login-is-present"] = ": <span style='color: red;'>логин введен не верно</span>";
            $layoutData["registration-specification"] = "Логин должен состоять из английских букв, цифр и начинаться с 
            буквы, состоять минимум из трех символов";
        }

        View::renderPage($layoutPath, $view_FilePath, $layoutData, $layoutData);
    }

    private function loginContainsInDataBase(string $loginUserInput, array $arrayLoginsInDataBase): bool
    {
        foreach ($arrayLoginsInDataBase as $login) {
            if ($login === $loginUserInput) {
                return true;
            }
        }

        return false;
    }
}
