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



include('conexao.php'); 
$sql_usuarios = "SELECT * FROM usuarios";
$query_usuarios = $mysqli->query($sql_usuarios) or die($mysqli->error);
$numero_usuarios = $query_usuarios->num_rows;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/usuarios.css">
    <title>Lista de usuários</title>
</head>
<body>

<div class="caixa">
    <br>
    <h1 style="text-align:center;color:lightcyan"> Lista de usuários</h1>
    <p style="text-align:center;color:lightcyan;"> Estes são os usuários cadastrados</p>
</div>

    <table style="background-color:white;" class="table" border="1" cellpadding="10">
        <thead>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Sexo</th>
            <th>Nascimento</th>
            <th>Cadastro</th>
            <th>Ações</th>
        </thead>
        <tbody>
            <?php if($numero_usuarios == 0){ ?>
            <tr>
                <td colspan="7">Não há nenhum usuário cadastrado</td>
                <!--
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                -->
            </tr>
            <?php 
            }else{while($usuario = $query_usuarios->fetch_assoc()){
                $nascimento = implode('/', array_reverse(explode('-',$usuario['data_nascimento']))); // Transformando a data americana em nacional
                $data_cadastro = date("d/m/y - h:i:s",strtotime($usuario['data_cadastro'])); // transformando a data americana em nacional
            ?>
            <tr>
                <td><?php echo $usuario['id']; ?></td>
                <td><?php echo $usuario['nome']; ?></td>
                <td><?php echo $usuario['email']; ?></td>
                <td><?php echo $usuario['sexo']; ?></td>
                <td><?php echo $nascimento; ?></td>
                <td><?php echo $data_cadastro ?></td>
                <td>
                    <a href="editar_usuario.php?id=<?php echo $usuario['id']; ?>">Editar</a>
                    <a href="deletar_usuario.php?id=<?php echo $usuario['id']; ?>">Deletar</a>
                </td>
            </tr>
            <?php }
        } ?>
        </tbody>
    </table>

    <a href="dashboard.php" class="btn btn-light">Voltar ao Menu</a>

</body>
</html>