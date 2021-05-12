<?php

namespace Mailman\Mvcframework\Application\Core;

/* Маршруты
 * http://blog-education.com
 * http://blog-education.com/posts/list
 * http://blog-education.com/site/about
 * http://blog-education.com/site/terms
 * http://blog-education.com/account/login
 * http://blog-education.com/account/registration
 * http://blog-education.com/profile/view
 * http://blog-education.com/profile/change
 *
 * http://blog-education.com/posts/post/12
 * posts/post/12 => http://blog-education.com/posts/view/$parameter1/$parameter2
 */

class Router
{
    private $routes;
    private $route;

    public function __construct()
    {
        $this->routes = require_once PATH_SERVER_ROOT . "/Mailman/Mvcframework/Application/configs/routes.php";
    }

    public function startRouting(): void
    {
        //==> 1) получаем строку запроса <==
        $query = trim($_SERVER['REQUEST_URI'], "/");

        //==> 2) проверяем наличие запроса в таблице маршрутов - routes.php <==
        if (isset($this->routes) && is_array($this->routes)) {
            //Таблица маршрутов присутствует
            if ($this->matchRoute($query)) {
                //echo "Найдено совпадение в таблице маршрутов";
                $routeExplode = explode('/', $this->route);

                //echo "{$this->route}<br /><br />";

                //==> 3) определяем Controller и Action <==
                $controller = ucfirst($routeExplode[0] . "Controller");
                $action = $routeExplode[1] . "Action";

                //==> 4) подключаем файл класса котроллера <==
                $fileController_Path = CONTROLLER_PATH . $controller . ".php";
                //если файл с описанием Контроллера присутствует
                if (file_exists($fileController_Path)) {
                    //echo "<br /> Файл: " . CONTROLLER_PATH . $controller . ".php ЕСТЬ";
                    //то подключаем данный файл

                    require_once($fileController_Path);

                    $controller = "Mailman\\Mvcframework\\Application\\Controllers\\" . $controller;

                    //==> 5) создаем объект контроллера, вызываем метод action <==
                    if (class_exists($controller)) {
                        $objController = new $controller();

                        if (method_exists($objController, $action)) {
                            $objController->$action();
                        } else {
                            echo "ОШИБКА! Отсутствует определение ->> action <<- для Класса Контроллера<br />";
                        }
                    } else {
                        echo "ОШИБКА! Отсутствует определение Класса Контроллера<br />";
                    }
                } else {
                    echo "ОШИБКА! Отсутствует файл с определением Класса Контроллера<br />";
                }
            } else {
                echo "ОШИБКА! Отсутствует маршрут в таблице маршрутов<br />";
            }
        } else {
            echo "ОШИБКА! Отсутсвует таблица маршрутов<br />";
        }
    }

    private function matchRoute($checkedRoute): bool
    {
        foreach ($this->routes as $currentRoute => $currentPath) {
            if ($currentRoute === $checkedRoute) {
                $this->route = $currentPath;
                return true;
            }
        }

        return false;
    }
}
