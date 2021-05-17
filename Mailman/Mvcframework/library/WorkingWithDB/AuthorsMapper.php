<?php

namespace Mailman\Mvcframework\library\WorkingWithDB;

class AuthorsMapper extends MapperAbstract
{
    public function getById(int $id): ?Author
    {
        $stmt = $this->pdo->prepare('SELECT * FROM authors WHERE id = :id');
        $stmt->execute(array('id' => $id));

        $authorDB = $stmt->fetch();

        if ($authorDB) {
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

    public function getByLogin(string $login): ?Author
    {
        $stmt = $this->pdo->prepare('SELECT * FROM authors WHERE login = :login');
        $stmt->execute(array('login' => $login));

        $authorInDB = $stmt->fetch();

        if ($authorInDB) {
            return new Author(
                $authorInDB["surname"],
                $authorInDB["name"],
                $authorInDB["login"],
                $authorInDB["id"],
                $authorInDB["password"]
            );
        }

        return null;
    }
}