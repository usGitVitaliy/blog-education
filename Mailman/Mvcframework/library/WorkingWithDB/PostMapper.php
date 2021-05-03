<?php

namespace Mailman\Mvcframework\library\WorkingWithDB;

require_once PATH_SERVER_ROOT . "/Mailman/Mvcframework/library/WorkingWithDB/Post.php";

//Mapper
class PostMapper extends MapperAbstract
{
    public function getById(int $id)
    {
        //получаем объект Post по id
    }

    public function save(Post $post)
    {
        //сохраняем элемент списка постов в БД
    }

    public function returnAll()
    {
        //возвращяет список постов
        $stmt = $this->pdo->query("SELECT * FROM posts");

        $arrListPosts = array();

        foreach ($stmt as $row) {
            $arrListPosts[] = new Post($row["id"], $row["author_id"], $row["post_item"]);
        }

        return $arrListPosts;
    }
}
