<?php

namespace Conn;

class Conn
{
    public function connection()
    {
        $usuario = "root";
        $senha = "";
        $bdname = "chat";
        $conn = mysqli_connect("localhost", $usuario, $senha, $bdname);
        mysqli_set_charset($conn, 'utf8');
        if (mysqli_connect_error()) {
            echo "Erro na conexão" . mysqli_connect_error();
        }
        return $conn;
    }
}
;
