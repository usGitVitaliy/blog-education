<?php

namespace Mailman\Mvcframework\library\WorkingWithDB;

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
