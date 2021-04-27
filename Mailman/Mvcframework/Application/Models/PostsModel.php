<?php

namespace Mailman\Mvcframework\Application\Models;

//require_once "PATH_SERVER_ROOT/Mailman/Mvcframework/Application/Core/DB.php";
require_once PATH_SERVER_ROOT . "/Mailman/Mvcframework/Application/Core/DB.php";

use Mailman\Mvcframework\Application\Core\DB;

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

            var_dump($arrListPosts_ReadFile);
            return $arrListPosts_ReadFile;
        }

        return null;
    }

    public function returnListInDB()
    {
        $dbObj = new DB();
        $pdo = $dbObj->getConnetDB();
        $stmt = $pdo->query(
            'SELECT posts.post_item, authors.surname, authors.name 
                        FROM posts, authors 
                        WHERE posts.author_id = authors.id;');

        $arrListPosts_ReadDB = array();

        foreach ($stmt as $row) {
            $rowListPosts_ReadDB = [
                "headerPost" => $row["post_item"],
                "authorPost_LastName" => $row["surname"],
                "authorPost_FirstName" => $row["name"]
            ];

            array_push($arrListPosts_ReadDB, $rowListPosts_ReadDB);
        }

        return $arrListPosts_ReadDB;
    }
}
