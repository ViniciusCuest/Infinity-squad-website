<?php
include('../conexao.php');

$pdo = Connection();

$response = array(
    'status' => 500,
    'message' => 'Form submission failed, please try again.'
);

$cod_doenca = $_GET['cod_doenca'];

$img = $pdo->prepare('SELECT * FROM imagem_doenca where cod_doenca = :cod');
$img->bindParam(':cod', $cod_doenca);

if ($img->execute() && $img->rowCount() > 0) {
    $img_data = $img->fetchAll();

    foreach ($img_data as $image)
        unlink('../img/'.$image['link_imagem']);

    $con = $pdo->prepare('DELETE FROM doenca WHERE cod_doenca = :cod_doenca');
    $con->bindParam(':cod_doenca', $cod_doenca);

    if ($con->execute()) {
        $response['status'] = 200;
        $response['message'] = 'success';
    } else {
        $response['message'] = 'Not possible to delete';
    }
} else {
    $q = $pdo->prepare("DELETE FROM doenca WHERE cod_doenca = :new_doenca");
    $q->bindParam(':new_doenca', $cod_doenca);
    if ($q->execute())
        $response['status'] = 200;
    else
        $response['status'] = 500;
}

echo json_encode($response);

$pdo = null;
