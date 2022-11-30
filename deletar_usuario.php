<?php

session_start();


if(!isset($_SESSION['idUser'])){
    header("Location: login.php");
  die();
}

if($_SESSION['Level'] == 0){
    echo "Acesso permitido apenas para Admin.";
  die();
}



if(isset($_POST['confirmar'])) {

    include("conexao.php");
    $id = intval($_GET['id']);
    $sql_code = "DELETE FROM usuarios WHERE id = '$id'";
    $sql_query = $mysqli->query($sql_code) or die($mysqli->error);

    if($sql_query) { ?>
        <h1>Usuário deletado com sucesso!</h1>
        <p><a href="usuarios.php">Clique aqui</a> para voltar para a lista de usuários.</p>
        <?php
        die();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deletar Usuário</title>
</head>
<body>
    <h1>Tem certeza que deseja deletar este Usuário?</h1>
    
    <form action="" method="post">
        <a style="margin-right:40px;" href="usuarios.php">Não</a>
        <button name="confirmar" value="1" type="submit">Sim</button>
    </form>
</body>
</html>