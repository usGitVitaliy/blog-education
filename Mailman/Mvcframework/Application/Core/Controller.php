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
}
