<?php

namespace Mailman\Mvcframework\library\WorkingWithDB;

use Mailman\Mvcframework\Application\Core\DB;

abstract class MapperAbstract
{
    protected $pdo;

    public function __construct()
    {
        $dbObj = new DB();
        $this->pdo = $dbObj->getConnetDB();
    }
}
