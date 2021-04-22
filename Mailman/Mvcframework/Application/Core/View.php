<?php

namespace Mailman\Mvcframework\Application\Core;

class View
{
    public static function renderPage(
        string $layoutPath,
        string $viewPath,
        array $layoutData, //данные шаблона: <title>
        $currentPageData = null //данные полученные из модели
    ) {
        require_once($layoutPath);
    }
}
