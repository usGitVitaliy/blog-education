<?php

namespace Mailman\Mvcframework\Application\Models;

class PostsModel
{
    public function returnList()
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
}
