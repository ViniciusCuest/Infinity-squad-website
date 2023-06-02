<?php

include('../conexao.php');
$pdo = Connection();

$response = array(
    'status' => 500,
    'message' => 'Form submission failed, please try again.'
);

if (isset($_POST['botao'])) {
    $dir = "../img/";
    $file = isset($_FILES['img-diagnostico']) ? $_FILES['img-diagnostico'] : FALSE;
    $destiny = $dir . $file['name'];

    if (move_uploaded_file($file['tmp_name'], $destiny)) {
        $con = $pdo->prepare("Insert into img_usuario(link_img) values (?)");
        $con->bindParam(1, $destiny);
        if ($con->execute())
            header("location: ../../project/index.php");
    } else {
        echo "Erro";
    }
}
