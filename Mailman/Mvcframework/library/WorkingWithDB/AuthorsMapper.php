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
            return new Author($authorDB["surname"], $authorDB["name"], $authorDB["login"], $authorDB["id"]);
        }

        return null;
    }

    public function getArrayAllAuthors(): array
    {
        $stmt = $this->pdo->query("SELECT * FROM authors");

        //echo "<br>";

        $arrayAuthors = array();

        foreach ($stmt as $row) {
            $arrayAuthors[] = new Author(
                $row['surname'],
                $row['name'],
                $row['login']
            ); //, $row['id'], $row['password']);
        }

        return $arrayAuthors;
    }

    public function insertAuthor(Author $author)
    {
        $SQL_query = "INSERT INTO authors (surname, name, login, password) 
                     VALUES (:surname, :name, :login, :password);";

        $stmt = $this->pdo->prepare($SQL_query);
        $stmt->execute(
            array(
                'surname' => $author->getSurname(),
                'name' => $author->getName(),
                'login' => $author->getLogin(),
                'password' => $author->getPassword()
            )
        );
    }
}
