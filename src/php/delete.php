<?php
include('../conexao.php');

$pdo = Connection();

$cod_doenca = $_POST['cod_doenca'];	

$con = $pdo->prepare('DELETE FROM doenca WHERE cod_doenca = :cod_doenca');
$con->bindParam(':cod_doenca', $cod_doenca);

if($con->execute())
    echo $con->rowCount();
else{
    echo $con->errorInfo();
}

?>