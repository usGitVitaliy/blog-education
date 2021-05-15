<?php

namespace Mailman\Mvcframework\Application\Controllers;

use Mailman\Mvcframework\Application\Core\Controller;
use Mailman\Mvcframework\Application\Core\View;

class ProfileController extends Controller
{
    public function viewAction()
    {
        $layoutPath = LAYOUTS_PATH . "default/layout.php";
        $layoutData = ["title" => "Профиль", "currentPage--nav-a" => "Профиль"];

        //$this->action(__CLASS__, __METHOD__, $layoutPath, $layoutData);

        $view_FilePath = VIEW_PATH . "/Profile/profile.php";
        View::renderPage($layoutPath, $view_FilePath, $layoutData, $layoutData);
    }
}
