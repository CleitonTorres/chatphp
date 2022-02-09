<?php

namespace ConnPDO;

use PDO;
use PDOException;

class ConnPDO
{
    //Conexãocom PDO
    public function connectionPDO()
    {
        define('MYSQL_HOST', 'localhost');
        define('MYSQL_USER', 'root');
        define('MYSQL_PASSWORD', '');
        define('MYSQL_DB_NAME', 'chat');

        try {
            $conn = new PDO('mysql:host=' . MYSQL_HOST . ';dbname=' . MYSQL_DB_NAME, MYSQL_USER, MYSQL_PASSWORD);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn->exec('SET CHARACTER SET utf8');//Define o charset como UTF-8
        } catch (PDOException $e) {
            echo 'Erro ao conectar com o MySQL: ' . $e->getMessage();
        }
        return $conn;
    }
}
;
