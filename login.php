<?php

session_start();
include "conexao.php";


if(isset($_POST['email']) && isset($_POST['senha']) && !empty($_POST['email']) && !empty($_POST['senha'])){
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql_code = "SELECT * FROM usuarios WHERE email = '$email' LIMIT 1";
    $sql_exec = $mysqli->query($sql_code) or die($mysqli->error);

    $erro  = false;

    if($sql_exec->num_rows == 0){
        $erro = "Não há nenhum cadastro com o e-mail informado";
    }

    if(!$erro){
        $usuario = $sql_exec->fetch_assoc();
        if(password_verify($senha, $usuario['senha'])){
                $_SESSION['idUser'] = $usuario['id'];
                $_SESSION['Level'] = $usuario['nivel'];
                header("Location: calendario.php");
                unset($_POST);
        }else{
            echo "<p style=text-align:center>Usuário ou senha incorretos</p>";
        }
    }else{
        echo $erro;
    }
}


if(isset($_SESSION['idUser'])){
    header("Location: dashboard.php");
    die();
}



?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
    <link rel="stylesheet" href="./css/minimal.css">
    <link rel="stylesheet" href="./css/login.css">
</head>

<body>
    <div class="container">
        <div class="container-login">
            <div class="wrap-login">
                <form class="login-form" action="testLogin.php" method="POST" id="login-form">
                    <span class="login-form-title">
                        Agenda ADS
                    </span>


                        <div class="wrap-input margin-top-35 margin-bottom-35">
                            <input required value="<?php if(isset($_POST['email'])) echo $_POST['email'] ?>" class="input-form" type="email" name="email" placeholder="E-mail" autocomplete="off">
                        </div>

                        <div class="wrap-input margin-bottom-35">
                            <input required value="<?php if(isset($_POST['email'])) echo $_POST['senha'] ?>" class="input-form" type="password" placeholder="Senha" name="senha">
                        </div>
                        
                        <div class="container-login-form-btn">
                            <button class="login-form-btn" type="submit">Login</button>
                        </div>
                    <ul class="login-utils">
                        <li class="margin-top-8 margin-bottom-8">
                            <span class="text1">
                                Esqueceu sua 
                            </span>
                            <a href="recuperar_senha.php"class="text2">
                                senha?
                            </a>
                        </li>

                        <li>
                            <span class="text1">
                                Não tem conta?
                            </span>
                            <a href="registroreal.php" class="text2">Cadastre-se</a>
                        </li>
                    </ul>

                </form>
            </div>
            <img src="./images/login.gif" alt="Login" width="300" height="300" class="margin-left-50">
            
        </div>
    </div>


</body>
</html>