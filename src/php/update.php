<?php

include('../conexao.php');

$pdo = Connection();

$response = array(
    'status' => 500,
    'message' => 'Form submission failed, please try again.'
);

$cod_doenca = $_POST['cod_doenca'];
$nome = $_POST["nome_doenca"];
$nomeCientifico = $_POST["nomeCientifico_doenca"];
$descricao = $_POST["descricaoEdit"];
$controleDoenca = $_POST["controle_Doenca"];
$solCultura = $_POST["sol_Cultura"];
$solQuimica = $_POST["solucaoQuimica_doenca"];
$prejuizos = $_POST["prejuizos_doenca"];

if(isset($_FILES["imagensAdicionar"])) {
    $total_count = count($_FILES['imagensAdicionar']['name']);
    for ($i = 0; $i < $total_count; $i++) {
        $tmpFilePath = $_FILES['imagensAdicionar']['tmp_name'][$i];
        if ($tmpFilePath != "") {
            $newFilePath = "../img/" . $_FILES['imagensAdicionar']['name'][$i];
            //File is uploaded to temp dir
            if (move_uploaded_file($tmpFilePath, $newFilePath)) {
                $con = $pdo->prepare("Insert into imagem_doenca(link_imagem, cod_doenca) values (?, ?)");
                $con->bindParam(1, $newFilePath);
                $con->bindParam(2, $cod_doenca);
                if ($con->execute())
                    $response['status'] = 200;
                else
                    $response['message'] = "File not uploaded";
            }
        }
    }
}

$con = $pdo->prepare('UPDATE doenca SET nome_doenca = :nome_doenca, nomeCientifico_doenca = :nomeCientifico_doenca, descricao_doenca = :descricao_doenca, controle_doenca = :controle_doenca, solucaoQuimica_doenca=:solucaoQuimica_doenca,solucaoCultura_doenca= :solucaoCultura_doenca, prejuizos_doenca= :prejuizos_doenca WHERE cod_doenca = :cod_doenca');

$array_pdo = array(
    ':nome_doenca' => $nome,
    ':nomeCientifico_doenca' => $nomeCientifico,
    ':descricao_doenca' => $descricao,
    ':controle_doenca' => $controleDoenca,
    ':solucaoQuimica_doenca' => $solQuimica,
    ':solucaoCultura_doenca' => $solCultura,
    ':prejuizos_doenca' => $prejuizos,
    ':cod_doenca' => $cod_doenca
);

if ($con->execute($array_pdo))
    $response['status'] = 200;
else
    $response['message'] = 'Error while updating this data';

echo json_encode($response);
