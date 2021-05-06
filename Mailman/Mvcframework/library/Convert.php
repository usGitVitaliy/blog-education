<?php

namespace Mailman\Mvcframework\library;

require_once PATH_SERVER_ROOT . "/Mailman/Mvcframework/library/WorkingWithDB/AuthorsMapper.php";

use Mailman\Mvcframework\library\WorkingWithDB\AuthorsMapper;

class Convert
{
    /*
     * Конвертирует массив объектов Post в массив постов
     */
    public static function convertToArrayPageData(array $listPosts): array
    {
        $arrListPosts_ReadDB = array();

        $objAuthorMapper = new AuthorsMapper();

        foreach ($listPosts as $post) {
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
