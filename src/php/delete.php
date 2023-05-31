<?php
include('../conexao.php');

$pdo = Connection();

$response = array(
    'status' => 500,
    'message' => 'Form submission failed, please try again.'
);

$cod_doenca = $_GET['cod_doenca'];	

$con = $pdo->prepare('DELETE FROM doenca WHERE cod_doenca = :cod_doenca');
$con->bindParam(':cod_doenca', $cod_doenca);

if($con->execute()) {
    $response['status'] = 200;
    $response['message'] = 'success';
}

echo json_encode($response);

$pdo = null;

?>