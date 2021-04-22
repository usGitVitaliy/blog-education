<?php

namespace Mailman\Mvcframework\Application\Core;

abstract class Controller
{
    //подключаем вид, выполняем рендеринг страницы
    protected function action($className, $methodName, $layoutPath, $layoutData, $currentPageData = null)
    {
        require_once PATH_SERVER_ROOT . "/Mailman/Mvcframework/Application/Core/View.php";

        $controller = $this->returnControllerName($className);
        $action = $this->returnActionName($methodName);

        $view_FilePath = VIEW_PATH . "{$controller}/{$action}.php";
        if (file_exists($view_FilePath)) {
            View::renderPage($layoutPath, $view_FilePath, $layoutData, $currentPageData);
        } else {
            echo "ОШИБКА! Отсутствует файл представления {$view_FilePath}<br />";
        }
    }

    private function returnControllerName($controller): string
    {
        //Mailman\Mvcframework\Application\Controllers\SiteController
        //$controller

        //array(5) { ... [4]=> string(14) "SiteController" }
        $controller = explode("\\", $controller);

        //string(14) "SiteController"
        $lastIndex = count($controller) - 1;
        $controller = $controller[$lastIndex];

        //string(4) "Site"
        $controller = str_replace("Controller", "", $controller);
        return $controller;
    }

    private function returnActionName($action): string
    {
        //Mailman\Mvcframework\Application\Controllers\SiteController::aboutAction
        //$action

        //::aboutAction
        $action = strstr($action, ":");

        //aboutAction
        $action = str_replace(":", "", $action);

        //about
        $action = str_replace("Action", "", $action);
        return $action;
    }

    //удалить метод
    /*
    protected function model_ReturnData($className, $methodName)
    {
        $className = $this->returnControllerName($className);
        $methodName = $this->returnActionName($methodName);

        //echo "className: {$className}<br>";
        //echo "methodName: {$methodName}<br>";

        $modelPath = MODEL_PATH . "{$className}Model.php";
        //echo "{$modelPath}<br>";

        //*
        if (file_exists($modelPath)) {
            //==> 1) Подключаем модель <==
            require_once $modelPath;

            $modelClass = "Mailman\\Mvcframework\\Application\\Models\\{$className}Model";

            $modelMethod = "{$methodName}Action"; //<<-- ОШИБКА <<--
            //echo "$modelMethod<br>";

            if (class_exists($modelClass)) {
                //echo "Класс {$modelClass} есть<br>";

                if (method_exists($modelClass, $modelMethod)) {
                    //echo "В классе {$modelClass} метод {$modelMethod} присутствует";

                    //==> 2) Получаем данные из модели <==
                    $modelObj = new $modelClass();
                    $currentPageData = $modelObj->$modelMethod();
                    return $currentPageData;
                } else {
                    echo "ОШИБКА! В классе {$modelClass} метод {$modelMethod} ОТСУТСТВУЕТ";
                }
            } else {
                echo "ОШИБКА! Отсутствует описание класса {$modelClass} в файле {$modelPath}";
            }

            //echo "{$modelPath}<br>{$modelClass}<br>{$modelMethod}<br>";
        } else {
            echo "ОШИБКА! Отсутствует файл с описанием модели";
        }

        return false;
        ///
    }
    //*/
}
