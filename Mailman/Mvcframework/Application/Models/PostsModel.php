<?php

namespace Mailman\Mvcframework\Application\Models;

require_once PATH_SERVER_ROOT . "/Mailman/Mvcframework/library/WorkingWithDB/AuthorMapper.php";
require_once PATH_SERVER_ROOT . "/Mailman/Mvcframework/library/WorkingWithDB/PostMapper.php";

use Mailman\Mvcframework\library\WorkingWithDB\AuthorMapper;
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

            //var_dump($arrListPosts_ReadFile);
            return $arrListPosts_ReadFile;
        }

        return null;
    }

    //getAllPosts
    public function returnListPostsInDB()
    {
        //Получаем массив объектов Post
        $objPostMapper = new PostMapper();
        $postsList = $objPostMapper->returnAll();

        return $this->convertToArrPost($postsList);
    }

    private function convertToArrPost($postsList)
    {
        $arrListPosts_ReadDB = array();

        $objAuthorMapper = new AuthorMapper();

        foreach ($postsList as $post) {
            $author = $objAuthorMapper->getById($post->getAuthorId());

            $arrListPosts_ReadDB[] = [
                "headerPost" => $post->getPostItem(),
                "authorPost_LastName" => $author->getSurname(),
                "authorPost_FirstName" => $author->getName()
            ];
        }

        return $arrListPosts_ReadDB;
    }
}
