<?php

namespace Mailman\Mvcframework\Application\Controllers;

use Mailman\Mvcframework\Application\Core\Controller;
use Mailman\Mvcframework\Application\Models\PostsModel;

class PostsController extends Controller
{
    public function listAction()
    {
        $layoutPath = LAYOUTS_PATH . "default/layout.php";
        $layoutData = ["title" => "Главная", "currentPage--nav-a" => "Главная"];

        require_once MODEL_PATH . "PostsModel.php";
        $objPostsModel = new PostsModel();

        //$currentPageData = $objPostsModel->returnListInFile();
        $currentPageData = $objPostsModel->getListPostsInDB();

        $this->action(__CLASS__, __METHOD__, $layoutPath, $layoutData, $currentPageData);
    }
}
