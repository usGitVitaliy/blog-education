<?php

namespace Mailman\Mvcframework\library\WorkingWithDB;

require_once PATH_SERVER_ROOT . "/Mailman/Mvcframework/library/WorkingWithDB/Post.php";
require_once PATH_SERVER_ROOT . "/Mailman/Mvcframework/library/WorkingWithDB/MapperAbstract.php";

//Mapper
class PostMapper extends MapperAbstract
{
    public function getAllPosts()
    {
        //возвращяет список постов
        $stmt = $this->pdo->query("SELECT * FROM posts");

        foreach ($stmt as $row) {
            $arrListPosts[] = new Post($row["id"], $row["author_id"], $row["post_item"]);
        }

        return $arrListPosts;
    }
}
