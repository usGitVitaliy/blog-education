<?php

namespace Mailman\Mvcframework\Application\Controllers;

require_once PATH_SERVER_ROOT . "/Mailman/Mvcframework/Application/Core/Controller.php";
require_once PATH_SERVER_ROOT . "/Mailman/Mvcframework/library/Convert.php";

use Mailman\Mvcframework\Application\Core\Controller;
use Mailman\Mvcframework\Application\Models\PostsModel;
use Mailman\Mvcframework\library\Convert;

class PostsController extends Controller
{
    public function listAction()
    {
        $layoutPath = LAYOUTS_PATH . "default/layout.php";
        $layoutData = ["title" => "Главная", "currentPage--nav-a" => "Главная"];

        require_once MODEL_PATH . "PostsModel.php";
        $objPostsModel = new PostsModel();

        //$currentPageData = $objPostsModel->returnListInFile();
        //$currentPageData = $objPostsModel->getListPostsInDB();

        $listPosts = $objPostsModel->getListPostsInDB();
        $currentPageData = Convert::convertToArrayPageData($listPosts);

        $this->action(__CLASS__, __METHOD__, $layoutPath, $layoutData, $currentPageData);
    }
}
