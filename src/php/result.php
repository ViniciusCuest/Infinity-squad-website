<?php
header('Access-Control-Allow-Origin: *');
include('../conexao.php');
$pdo = Connection();
$con = $pdo->prepare("Select * from imagem_doenca");
if ($con->execute()) {
    $result = $con->fetch();

    $cod_doenca = $result['cod_doenca'];
    $conDoenca = $pdo->prepare("Select * from doenca where cod_doenca = :cod");
    $arr = array(':cod' => $cod_doenca);
    if($conDoenca->execute($arr)) 
        echo json_encode($conDoenca->fetch(), JSON_UNESCAPED_UNICODE);

    //echo json_encode($array_doenca);
    //var_dump($array_doenca[0]);
}
$pdo = null;
?>