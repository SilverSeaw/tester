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
<!-- ========== TESTE PHP FIM ========== -->

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/cadastro.css">
    <title>Cadastro</title>
</head>
<body>
    <main>
        <h1>Cadastre-se</h1>
 
    <div class="icon"> 
        <a href="#">
            <img src="./images/google.png" alt="Google" srcset="./images/google.png">
        </a>
        <a href="#">
            <img src="./images/facebook.png" alt="Facebook">
        </a>
        <a href="#">
            <img src="./images/linkedin.png" alt="Linkedin">
        </a>
    </div>

        <div class="alternative">
            <span>Ou</span>
        </div>

        <div class="nome">
            <input  class="input-form" type="text" name="name" placeholder="Nome">
        </div>

        <div class="wrap-input margin-top-35">
            <input class="input-form" type="text" name="name" placeholder="Sobrenome">
        </div>

        <div class="wrap-input margin-top-35 margin-bottom-35">
            <input  class="input-form" type="email" name="email" placeholder="E-mail" autocomplete="off">
        </div>

        <div class="wrap-input margin-bottom-35">
            <input  class="input-form" type="text" name="data" placeholder="Nascimento" onclick="(this.type='date')">
        </div>

        <div class="wrap-input margin-bottom-35">
            <input class="input-form" type="password" placeholder="Senha" name="senha">
        </div>

        <div class="wrap-input password">
            <input class="input-form" type="password" placeholder="Confirme sua senha" name="senha">
        </div>

       
      

        <!-- teste de sexo -->

<!--surround the select box with a "custom-select" DIV element. Remember to set the width:-->
<div class="custom-select" style="width:200px;">
  <select>
    <option value="0">Informe seu sexo:</option>
    <option value="1">Masculino</option>
    <option value="2">Feminino</option>
  </select>
</div>
        <!-- fim teste-->
                        
        <div class="container-login-form-btn">
            <button class="login-form-btn" type="submit">Registrar-se</button>
            <a href= "login.php"></a>
        </div>

        </form>
    </main>
    <section class="images">
        <img src="./images/registro.gif" alt="Registro">
    </section>
    <script src="./js/registro.js"></script>
</body>
</html>