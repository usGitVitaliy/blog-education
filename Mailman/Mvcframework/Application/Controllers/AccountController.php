<?php

namespace Mailman\Mvcframework\Application\Controllers;

use Mailman\Mvcframework\Application\Core\Controller;
use Mailman\Mvcframework\Application\Logic\ValidateFormInput;
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
    public function validateRegistrationAction()
    {
        $layoutPath = LAYOUTS_PATH . "default/layout.php";

        $layoutData = [
            "title" => "Регистрация",
            "currentPage--nav-a" => "Регистрация",
        ];

        $layoutData["registration-specification"] = "";

        //проверяем
        $inputFormData = array(
            'lastName' => 'lastname-user', // фамилию
            'firstName' => 'firstname-user', // имя
            'password' => 'password-user' // пароль
        );

        foreach ($inputFormData as $inputVariable => $inputFormName) {
            $$inputVariable = "";

            if (isset($_POST[$inputFormName])) {
                $$inputVariable = $_POST[$inputFormName];
            }

            if (!ValidateFormInput::$inputVariable($$inputVariable, $layoutData["registration-specification"])) {
                $view_FilePath = VIEW_PATH . "Account/validateRegistration.php";
                View::renderPage($layoutPath, $view_FilePath, $layoutData, $layoutData);
                return;
            }
        }

        $passwordUserConfirm = "";
        if (isset($_POST["password-user-confirm"])) {
            $passwordUserConfirm = $_POST["password-user-confirm"];
        }

        if ($$inputVariable !== $passwordUserConfirm) {
            $layoutData["registration-specification"] = "Введенные пароли не совпадают";
            $view_FilePath = VIEW_PATH . "Account/validateRegistration.php";
            View::renderPage($layoutPath, $view_FilePath, $layoutData, $layoutData);
            return;
        }

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
                $view_FilePath = VIEW_PATH . "Account/registered.html";

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
                $view_FilePath =  VIEW_PATH . "Account/registration.php";
                $layoutData["login-is-present"] = ": <span style='color: red;'>введенный логин уже существует</span>";
            }
        } else {
            //echo "Логин введен НЕ правильно<br><br>";

            $view_FilePath = VIEW_PATH . "Account/validateRegistration.php";
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

    public function validateLoginAction()
    {
        $layoutPath = LAYOUTS_PATH . "default/layout.php";

        $layoutData = ["title" => "Авторизация", "currentPage--nav-a" => "Логин",];
        $view_FilePath = VIEW_PATH . "Account/validateLogin.php";

        if (
            array_key_exists("login-user", $_POST) &&
            array_key_exists("password-user", $_POST)
        ) {
            if ($_POST["login-user"] === '' || $_POST["password-user"] === '') {
                //echo "Не введен логин или пароль<br>";
                //$view_FilePath = VIEW_PATH . "/Account/validateLogin.php";
                $layoutData["info-bar"] = "Не введен логин или пароль";
            } else {
                $authorsModel = new AuthorsModel();
                $author = $authorsModel->getAuthorByLogin($_POST["login-user"]);

                if ($author != null) {
                    //echo "Автор есть<br />";

                    if ($author->getPassword() === $_POST["password-user"]) {
                        //автор залогинен
                        session_start();
                        $_SESSION["username"] = $author->getName();
                        $_SESSION["login"] = $author->getLogin();
                        session_write_close();

                        header("Location: /"); /* Перенаправление браузера */

                        /* Убедиться, что код ниже не выполнится после перенаправления .*/
                        exit;

                        //пользователь залогинен
                    } else {
                        $layoutData["info-bar"] = "Неверный пароль";
                    }
                } else {
                    //echo "Автора нет в базе<br />";
                    $layoutData["info-bar"] = "Введенный логин отсутствует";
                }
            }
        }

        View::renderPage($layoutPath, $view_FilePath, $layoutData, $layoutData);
    }

    public function loggedOutAction()
    {
        // Инициализируем сессию.
        // Если вы используете session_name("something"), не забудьте добавить это перед session_start()!
        session_start();

        // Удаляем все переменные сессии.
        $_SESSION = array();

        // Если требуется уничтожить сессию, также необходимо удалить сессионные cookie.
        // Замечание: Это уничтожит сессию, а не только данные сессии!
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params["path"],
                $params["domain"],
                $params["secure"],
                $params["httponly"]
            );
        }

// Наконец, уничтожаем сессию.
        session_destroy();

        //header("Location: http://blog-education.com"); /* Перенаправление браузера */
        header("Location: /"); /* Перенаправление браузера */

        /* Убедиться, что код ниже не выполнится после перенаправления .*/
        exit;
    }
}
