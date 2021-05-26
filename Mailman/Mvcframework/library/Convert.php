<?php

namespace Mailman\Mvcframework\library;

use Mailman\Mvcframework\library\WorkingWithDB\Author;
use Mailman\Mvcframework\library\WorkingWithDB\AuthorsMapper;

class Convert
{
    /*
     * Конвертирует массив объектов Post в массив постов
     */
    public static function convertToArrayPageDataListPosts(array $listPosts): array
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

    public static function convertToArrayAuthorFields(Author $author)
    {
        $authorFiels = array();

        $authorFiels["surname"] = $author->getSurname();
        $authorFiels["name"] = $author->getName();
        $authorFiels["login"] = $author->getLogin();
        $authorFiels["photo"] = $author->photo;

        return $authorFiels;
    }
}
