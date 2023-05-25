<?php
header('Access-Control-Allow-Origin: *');
include('../conexao.php');
$pdo = Connection();
$query = $pdo->prepare("Select * from imagem_doenca");
if ($query->execute()) {
    $result = $query->fetch();

    $cod_disease = $result['cod_doenca'];
    $data = $pdo->prepare("Select * from doenca where cod_doenca = :cod");
    $arr = array(':cod' => $cod_disease);
    if($data->execute($arr)) 
        echo json_encode($data->fetch(), JSON_UNESCAPED_UNICODE);

}
$pdo = null;
?>