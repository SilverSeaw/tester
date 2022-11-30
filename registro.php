<?php

    session_start();
    if(isset($_SESSION['idUser'])){
        header("Location: dashboard.php");
        die();
    }


    $erro = false;

    if(count($_POST) > 1){
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $sexo = $_POST['sexo'];
        $nascimento = $_POST['nascimento'];
    
        include('conexao.php');

    if(empty($nascimento)){
        $erro = "Preencha a data do seu nascimento";
    }

    if(empty($sexo)){
        $erro = "Selecione o gênero";
    }
        
    if(empty($senha)){
        $erro = "Preencha a senha";
    }

    if(empty($email)){
        $erro = "Preencha o email";
    }

    if(empty($nome)){
        $erro = "Preencha o nome";
    }

    


    if(!empty($nascimento)){
        $tmp = explode('/', $nascimento);
        if(count($tmp) == 3){
        $dividirdata = implode('-',array_reverse(explode('/',$nascimento)));
        }else{
            $erro = "O formato do nascimento deve ser Dia/Mes/Ano";
        }
    }


    // CRIPTOGRAFIA DE SENHA

    $senha_criptografada = password_hash($senha, PASSWORD_DEFAULT);

    if($erro){
        echo "<p><b>Erro: $erro</p></b>";
    } else {
        $sql_code = "INSERT INTO usuarios (nome, email, senha, sexo, data_nascimento) VALUES ('$nome','$email','$senha_criptografada','$sexo','$dividirdata')";

        $sucesso = $mysqli->query($sql_code) or die($mysqli->error);


        if($sucesso){
            echo "<img src='./imagens/confirmado.gif'/> Usuario cadastrado";


            unset($_POST);
        }
    }
}

    

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="./css/caduser.css"> -->
    <link rel="stylesheet" href="./css/teste.css">
    <title>Registro</title>
   
</head>
<body>

<!-- TESTE BACKGROUND -->


<!-- FIM TESTE BACKGROUND -->



    <div class="login-tela">
        <div class="box">
        <h1>Cadastro de Usuários</h1>



<body>
    <form action="" method="post">
        <p class="nome">
            <label>Nome:</label><br>
            <input value="<?php if(isset($_POST['nome'])) echo $_POST['nome']; ?>" name="nome" type="text"><br>
        </p>

        <p class="email">
            <label>E-mail:</label><br>
            <input value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>"name="email" type="text"><br>
        </p>
        
        <p class="senha">
            <label>Senha:</label><br>
            <input value="<?php if(isset($_POST['senha'])) echo $_POST['senha']; ?>" type="password" name="senha"><br>
        </p>

        <p class="nasc">
            <label>Nascimento:</label><br>
            <input value="<?php if(isset($_POST['nascimento'])) echo $_POST['nascimento']; ?>" name="nascimento" type="text"><br>
        </p>

        <p class="sexo">
            <label>Gênero:</label><br>
            <input name="sexo" value="Masculino" type="radio">Masculino<br>
            <input name="sexo" value="Feminino"type="radio">Feminino<br>
        </p>


        <button class="btn btn-info" type="submit" class="button">Cadastrar</button>
        <div>
            <!-- <a class="botao" href="login.php">Login</a> -->
            <a href="login.php" class="btn btn-light">Entrar</a>
        </div>
           
    </form>
            </div>
        <div>
    <div>
</body>
</html>