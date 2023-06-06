<?php
header('Access-Control-Allow-Origin: *');
include('../conexao.php');
$pdo = Connection();

$response = array(
    'status' => 500,
    'message' => 'Form submission failed, please try again.'
);

$query = $pdo->query("Select * from imagem_doenca");
if ($query->execute()) {
    $result = $query->fetch();
    $cod_disease = $result['cod_doenca'];

    $data = $pdo->prepare("Select * from doenca d INNER JOIN imagem_doenca i ON i.cod_doenca = d.cod_doenca where d.cod_doenca = :cod ORDER BY d.cod_doenca DESC");
    $arr = array(':cod' => $cod_disease);
    if($data->execute($arr)) {
        $response['status'] = 200;
        $response['data'] = $data->fetchAll();
    }
}

echo json_encode($response);

$pdo = null;
?>