<?php

namespace Mailman\Mvcframework\library\WorkingWithDB;

class AuthorsMapper extends MapperAbstract
{
    public function getById(int $id): ?Author
    {
        $stmt = $this->pdo->prepare('SELECT * FROM authors WHERE id = :id');
        $stmt->execute(array('id' => $id));

        $authorDB = $stmt->fetch();

        if (isset($authorDB)) {
            $author = new Author($authorDB["id"], $authorDB["surname"], $authorDB["name"]);
            return $author;
        }

        return null;
    }
}
