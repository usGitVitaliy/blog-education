<?php

namespace Mailman\Mvcframework\Application\Configs;

use Mailman\Mvcframework\Application\Core\Router;

require_once("config-define.php");
require_once("Mailman/Mvcframework/Application/Core/Router.php");

//функция автозагрузки классов
spl_autoload_register(function ($class) {
    $filePath = PATH_SERVER_ROOT . "/" . str_replace("\\", "/", $class) . ".php";

    if (file_exists($filePath)) {
        require_once $filePath;
    } else {
        echo "Не найден подключаемый файл.<br />";
    }
});

$route = new Router();
$route->startRouting();
