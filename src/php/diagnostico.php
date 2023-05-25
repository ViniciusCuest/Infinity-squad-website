<?php

include('../conexao.php');

$pdo = Connection();

if (isset($_POST['botao'])) {
    $dir = "./";
    $file = isset($_FILES['imagemProb']) ? $_FILES['imagemProb'] : FALSE;
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
