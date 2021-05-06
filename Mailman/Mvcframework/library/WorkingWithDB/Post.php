<?php

namespace Mailman\Mvcframework\library\WorkingWithDB;

//клвсс-сущность для паттерна DataMapper -
//Entity
class Post
{
    private int $id;
    private int $author_id;
    private string $post_item;

    public function __construct(int $id, string $author_id, string $post_item)
    {
        $this->id = $id;
        $this->author_id = $author_id;
        $this->post_item = $post_item;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getAuthorId(): int
    {
        return $this->author_id;
    }

    public function getPostItem(): string
    {
        return $this->post_item;
    }
}
