<?php

namespace Mailman\Mvcframework\Application\Models;

use Mailman\Mvcframework\library\WorkingWithDB\Author;
use Mailman\Mvcframework\library\WorkingWithDB\AuthorsMapper;

class AuthorsModel
{
    public function getAuthorById(int $id): ?Author
    {
        return (new AuthorsMapper())->getById($id);
    }

    public function getArrayAllLogins(): array
    {
        $arrayAuthors = (new AuthorsMapper())->getArrayAllAuthors();
        $arrayLogins = array();

        foreach ($arrayAuthors as $author) {
            $arrayLogins[] = $author->getLogin();
        }

        return $arrayLogins;
    }

    public function addAuthorToDB(Author $author)
    {
        (new AuthorsMapper())->insertAuthor($author);
    }

    public function getAuthorByLogin(string $login): ?Author
    {
        return (new AuthorsMapper())->getByLogin($login);
    }
}
