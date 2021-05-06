<?php

namespace Mailman\Mvcframework\Application\Controllers;

use Mailman\Mvcframework\Application\Core\Controller;

class SiteController extends Controller
{
    public function aboutAction()
    {
        $layoutPath = LAYOUTS_PATH . "default/layout.php";
        $layoutData = ["title" => "О проекте", "currentPage--nav-a" => "О проекте"];

        $this->action(__CLASS__, __METHOD__, $layoutPath, $layoutData);
    }

    public function termsAction()
    {
        $layoutPath = LAYOUTS_PATH . "default/layout.php";
        $layoutData = ["title" => "Правила", "currentPage--nav-a" => "Правила"];

        $this->action(__CLASS__, __METHOD__, $layoutPath, $layoutData);
    }
}
