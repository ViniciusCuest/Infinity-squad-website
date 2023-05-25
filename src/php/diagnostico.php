<?php

include('../conexao.php');

$pdo = Connection();

if (isset($_POST['botao'])) {
    $diretorio = "./";
    $arquivo = isset($_FILES['imagemProb']) ? $_FILES['imagemProb'] : FALSE;
    $destino = $diretorio . $arquivo['name'];

    echo $data_Atual;

    if (move_uploaded_file($arquivo['tmp_name'], $destino)) {
        echo "Elias";
        $con = $pdo->prepare("Insert into img_usuario(link_img) values (?)");
        $con->bindParam(1, $destino);
        if($con->execute())
            header("location: ../../project/index.php");
    } else {
        echo "Erro";
    }
    
}
?>