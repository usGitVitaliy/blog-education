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
}
