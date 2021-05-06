<?php

namespace Mailman\Mvcframework\library\WorkingWithDB;

require_once PATH_SERVER_ROOT . "/Mailman/Mvcframework/Application/Core/DB.php";

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
