<?php
$dbHost = "localhost";
$dbName = "projeto_agenda";
$dbUsername = "root";
$dbPassword = "";

$mysqli = new mysqli ($dbHost,$dbUsername,$dbPassword);

if($mysqli->connect_errno){
    echo "Ocorreu um erro ao acessar essa página: (" . $mysqli->connect_error . ") " . $mysqli->connect_error;
    die();

}
else{
    echo "Conexão efuatuada com sucesso";
}
function formatar_data($data){
    return implode('/', array_reverse(explode('-', $data)));
}