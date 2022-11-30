
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/edituser.css">
    <title>Editar Usuário</title>
</head>

<h1>Editar Usuário</h1>
<?php

    if(!isset($_SESSION['idUser'])){
        header("Location: login.php");
    die();
    }

    if($_SESSION['Level'] == 0){
        echo "Acesso permitido apenas para Admin.";
    die();
    }


    include('conexao.php');

    $id_usuario = intval($_GET['id']);
    $erro = false;

    if(count($_POST) > 1){
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $sexo = $_POST['sexo'];
        $nascimento = $_POST['nascimento'];
    

    if(empty($nome)){
        $erro = "Preencha o nome";
    }

    if(empty($email)){
        $erro = "Preencha o email";
    }

    if(empty($senha)){
        $erro = "Preencha a senha";
    }

    if(empty($sexo)){
        $erro = "Preencha o sexo";
    }

    if(empty($nascimento)){
        $erro = "Preencha a data do seu nascimento";
    }


    if(!empty($nascimento)){
        $tmp = explode('/', $nascimento);
        if(count($tmp) == 3){
        $dividirdata = implode('-',array_reverse(explode('/',$nascimento)));
        }else{
            $erro = "O formato do nascimento deve ser Dia/Mes/Ano";
        }
    }

    if($erro){
        echo "<p><b>Erro: $erro</p></b>";
    } else {
        $sql_code = "UPDATE usuarios SET
        nome = '$nome',
        email = '$email',
        senha = '$senha',
        sexo = '$sexo',
        data_nascimento = '$dividirdata'
        WHERE id = '$id_usuario'";
        
        $sucesso = $mysqli->query($sql_code) or die($mysqli->error);

        if($sucesso){
            echo "Usuário atualizado com sucesso!";
            unset($_POST);
        }
    }
}


    $sql_usuario = "SELECT * FROM usuarios WHERE id = '$id_usuario'";
    $query_usuario = $mysqli->query($sql_usuario) or die($mysqli->error);
    $usuario = $query_usuario->fetch_assoc();


?>



<body>


<div class="box">   
    <!-- <a href="./index.php" class="voltar">Voltar para a Página Inicial</a> -->

           

    <form action="" method="post">
        <p class="nome">
            <label>Nome:</label><br>
            <input value="<?php echo $usuario['nome']; ?>" name="nome" type="text"><br>
        </p>

        <p class="email">
            <label>E-mail:</label><br>
            <input value="<?php echo $usuario['email']; ?>"name="email" type="text"><br>
        </p>
        
        <p class="senha">
            <label>Senha:</label><br>
            <input value="<?php echo $usuario['senha']; ?>" type="password" name="senha"><br>
        </p>

        <p class="sexo">
            <label>Sexo:</label><br>
            <input value="<?php echo $usuario['sexo']; ?>"  name="sexo" type="text"><br>
        </p>

        <p class="nasc">
            <label>Nascimento:</label><br>
            <input value="<?php echo formatar_data($usuario['data_nascimento']); ?>" name="nascimento" type="text"><br>
        </p>

        <button class="button" type="submit" class="button">Editar</button>
    </form>
    <a href="dashboard.php" class="btn btn-success">Voltar para a Página Inicial</a>
</div>
</body>

</html>