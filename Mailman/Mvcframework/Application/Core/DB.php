<?php

namespace Mailman\Mvcframework\Application\Core;

use \PDO;

class DB
{
    private string $host;
    private string $db;
    private string $user;
    private string $pass;

    public function __construct()
    {
        $arrConnectionData = require_once PATH_SERVER_ROOT . "/Mailman/Mvcframework/Application/configs/db-connection-data.php";

        $this->host = $arrConnectionData["host"];
        $this->db = $arrConnectionData["db"];
        $this->user = $arrConnectionData["user"];
        $this->pass = $arrConnectionData["pass"];
    }

    public function getConnetDB()
    {
        $dsn = "mysql:host={$this->host};dbname={$this->db};charset=utf8";
        $opt = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];

        $pdo = new PDO($dsn, $this->user, $this->pass, $opt);
        return $pdo;
    }
}
