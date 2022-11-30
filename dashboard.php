<?php
session_start();
include "conexao.php";

if(!isset($_SESSION['idUser'])){
  header("Location: login.php");
  die();
}

    $id = $_SESSION['idUser'];
    $sql_code = "SELECT * FROM usuarios WHERE id = '$id' LIMIT 1";
    $sql_exec = $mysqli->query($sql_code) or die($mysqli->error);
    $usuario = $sql_exec->fetch_assoc();

    $primeiro_nome = explode(' ', $usuario['nome']);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="./css/dashboardnovo.css">
</head>
<body>
    <header class="cabecalho">
        <img src="./images/logo2.png" alt="" href="dashboard.php" class="logo"> <!-- Adicionar Logo posteriormente -->

        <nav class="cabecalho-menu">
            <a class="cabecalho-menu-item" href="registro.php">Registro</a>
            <a class="cabecalho-menu-item" href="usuarios.php">Usuários</a>
            <a class="cabecalho-menu-item">teste3</a>
            <a class="cabecalho-menu-item">teste4</a>
            <a class="cabecalho-menu-item">teste5</a>

            <?php
        
        if($usuario['sexo'] == 'Masculino') { echo "<p style='color:#D9D9D9;'> Bem-vindo,"; }
        if($usuario['sexo'] == 'Feminino') { echo "<p style='color:#D9D9D9;'> Bem-vinda,"; }
        
        ; ?>
        <?php echo "<b>" . $primeiro_nome[0] . "</b></p>"; ?>
        <a href="logout.php">Sair</a>

        </nav>
    </header>

    <main class="conteudo">
        <section class="conteudo-principal">
               Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto exercitationem earum mollitia at placeat necessitatibus, aliquid fugiat quisquam fugit voluptatum pariatur quibusdam! Aliquid minus quod aliquam, eveniet dicta ullam ipsam.
               Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto exercitationem earum mollitia at placeat necessitatibus, aliquid fugiat quisquam fugit voluptatum pariatur quibusdam! Aliquid minus quod aliquam, eveniet dicta ullam ipsam.
               Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto exercitationem earum mollitia at placeat necessitatibus, aliquid fugiat quisquam fugit voluptatum pariatur quibusdam! Aliquid minus quod aliquam, eveniet dicta ullam ipsam.
               Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto exercitationem earum mollitia at placeat necessitatibus, aliquid fugiat quisquam fugit voluptatum pariatur quibusdam! Aliquid minus quod aliquam, eveniet dicta ullam ipsam.
               Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto exercitationem earum mollitia at placeat necessitatibus, aliquid fugiat quisquam fugit voluptatum pariatur quibusdam! Aliquid minus quod aliquam, eveniet dicta ullam ipsam.
               Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto exercitationem earum mollitia at placeat necessitatibus, aliquid fugiat quisquam fugit voluptatum pariatur quibusdam! Aliquid minus quod aliquam, eveniet dicta ullam ipsam.
               Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto exercitationem earum mollitia at placeat necessitatibus, aliquid fugiat quisquam fugit voluptatum pariatur quibusdam! Aliquid minus quod aliquam, eveniet dicta ullam ipsam.
               Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto exercitationem earum mollitia at placeat necessitatibus, aliquid fugiat quisquam fugit voluptatum pariatur quibusdam! Aliquid minus quod aliquam, eveniet dicta ullam ipsam.
               Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto exercitationem earum mollitia at placeat necessitatibus, aliquid fugiat quisquam fugit voluptatum pariatur quibusdam! Aliquid minus quod aliquam, eveniet dicta ullam ipsam.
               Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto exercitationem earum mollitia at placeat necessitatibus, aliquid fugiat quisquam fugit voluptatum pariatur quibusdam! Aliquid minus quod aliquam, eveniet dicta ullam ipsam.
               Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto exercitationem earum mollitia at placeat necessitatibus, aliquid fugiat quisquam fugit voluptatum pariatur quibusdam! Aliquid minus quod aliquam, eveniet dicta ullam ipsam.
               Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto exercitationem earum mollitia at placeat necessitatibus, aliquid fugiat quisquam fugit voluptatum pariatur quibusdam! Aliquid minus quod aliquam, eveniet dicta ullam ipsam.
               Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto exercitationem earum mollitia at placeat necessitatibus, aliquid fugiat quisquam fugit voluptatum pariatur quibusdam! Aliquid minus quod aliquam, eveniet dicta ullam ipsam.
        </section>
    </main>

    <footer class="rodape">
       <nav class="rodape-menu">
        <a class="rodape-menu-item" href="https://www.eduvaleavare.com.br" target="_blank">Faculdade Eduvale</a>
        <a class="rodape-menu-item" href="sobre-nos.php">Quem somos nós?</a>
        <a class="rodape-menu-item">teste3</a>
        <a class="rodape-menu-item">teste4</a>
        <a class="rodape-menu-item">teste5</a>
       </nav>
    </footer>
</body>
</html>