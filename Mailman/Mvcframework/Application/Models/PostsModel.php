<?php

namespace Mailman\Mvcframework\Application\Models;

require_once PATH_SERVER_ROOT . "/Mailman/Mvcframework/library/Convert.php";
require_once PATH_SERVER_ROOT . "/Mailman/Mvcframework/library/WorkingWithDB/PostMapper.php";

use Mailman\Mvcframework\library\Convert;
use Mailman\Mvcframework\library\WorkingWithDB\PostMapper;

class PostsModel
{
    public function returnListInFile()
    {
        $fileData_ListPosts = PATH_SERVER_ROOT . "/Mailman/Mvcframework/data/storage/main-list-posts";

        if (file_exists($fileData_ListPosts)) {
            $listPosts = file_get_contents($fileData_ListPosts);
            $arrListPosts_ReadFile = unserialize($listPosts);

            if (!is_array($arrListPosts_ReadFile)) {
                echo "ОШИБКА! Данные постов отсутсвуют<br />";
                return null;
            }

            return $arrListPosts_ReadFile;
        }

        return null;
    }

    //getAllPosts
    public function getListPostsInDB()
    {
        //Получаем массив объектов Post и конвертируем в массив постов
        return Convert::convertToArrayPageData((new PostMapper())->getAllPosts());
    }
}
