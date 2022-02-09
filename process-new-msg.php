<?php

namespace ProcessNewMsg;

include('conn/ConnPDO.php');

use ConnPDO\ConnPDO;

$conn = new ConnPDO();

$nome = $_POST['nome'];
$msg = $_POST['msg'];

if (!empty($msg)) {
    $gravando = (new ProcessNewMsg())->gravarRegistroAcesso($nome, $msg, $conn);
} else {
    echo 'Nenhuma msg aqui!';
}

class ProcessNewMsg
{
    public function gravarRegistroAcesso($nome_, $msg_, $conn_)
    {
        $sql = "INSERT INTO chat (nome, msg) VALUES ('$nome_', '$msg_')";
        $result = $conn_->connectionPDO()->query($sql);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}
;
