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
<<<<<<< HEAD
    $cod_disease = $result['cod_doenca'];

=======
    $cod_disease = $result['cod_doenca'][0];
>>>>>>> d4b3410b1c3b8771e27327ff2c9f8889e195c06e
    $data = $pdo->prepare("Select * from doenca d INNER JOIN imagem_doenca i ON i.cod_doenca = d.cod_doenca where d.cod_doenca = :cod ORDER BY d.cod_doenca DESC");
    $arr = array(':cod' => $cod_disease);
    if($data->execute($arr)) {
        $response['status'] = 200;
<<<<<<< HEAD
        $response['data'] = $data->fetchAll();
=======
        $response['data'] = $data->fetch();
>>>>>>> d4b3410b1c3b8771e27327ff2c9f8889e195c06e
    }
}

echo json_encode($response);

$pdo = null;
?>