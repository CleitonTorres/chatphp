<?php
include('conn/Conn.php');
use Conn\Conn;

if (!empty($_POST['nomeUser'])) {
    $nomeUser = $_POST['nomeUser'];
};

$cor = 0; //controla a alternação das cores das caixas de msg.

$conn = new Conn();
$query_lista = mysqli_query($conn->connection(), 'SELECT * FROM chat ORDER BY id DESC LIMIT 10');

if (empty($nomeUser)) {
    $aviso = "Você não está logado!";
    print($aviso);
    return;
}
?>
<html>

<head>
    <link rel='stylesheet' type='text/css' href='format.css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type='text/javascript' src='localhost/chatphp/scriptsJS/enviarForm.js'></script>
</head>

<body>
<?php
while ($row_lista = mysqli_fetch_assoc($query_lista)) {
    if ($cor == 0) { ?>
        <div class="container" style="max-height:30px;">
            <?php echo $row_lista['nome'] . " : " . $row_lista['msg']; ?>
        </div>
    <?php }

    if ($cor == 1) { ?>
        <div class="container darker" style="max-height:30px;">
            <?php echo $row_lista['nome'] . " : " . $row_lista['msg']; ?>
        </div>
    <?php }
    $cor++;

    if ($cor == 2) {
        $cor = 0;
    }
}
?>
<form action="" name="formMSG" id="formMSGid" method="POST">
<div>
    <input type="hidden" name="nome" id="nomeId" placeholder="Seu nome" value="<?php echo $nomeUser; ?>"/>
</div>

<div>
        <label for="msg">Mensagem</label>
        <input type="text" name="msg" id="msgId" placeholder="digite sua mensagem" />
        <button type="button" id="enviarId">Enviar</button>
</div>
</form>

<script>
    $('#enviarId').click(function ()
    {
        $.ajax({
            url: 'http://localhost/ChatPHP/process-new-msg.php',
            type: 'POST',
            data: $('#formMSGid').serialize(),
            success: function (msg) {
                alert('Enviado!');
                window.location.reload();
            }
        });
    });
</script>

</body>
</html>
