<?php
header('Access-Control-Allow-Origin: *');
include('../conexao.php');
$pdo = Connection();

$nome = $_POST["nomeDoenca"];
$nomeCientifico = $_POST["nomeCientifico"];
$descricao = $_POST["descricao"];
$controleDoenca = $_POST["controleDoenca"];
$solCultura = $_POST["solCultura"];
$solQuimica = $_POST["solQuimica"];
$nvRisco = $_POST["nvRisco"];
$agtCausador = $_POST["agtCausador"];
$prejuizos = $_POST["prejuizos"];

$con = $pdo->prepare('INSERT INTO doenca(nome_doenca, nomeCientifico_doenca, descricao_doenca, controle_doenca, solucaoQuimica_doenca, cod_risco, cod_agente, solucaoCultura_doenca, prejuizos_doenca) VALUES (:nome_doenca, :nomeCientifico_doenca, :descricao_doenca, :controle_doenca, :solucaoQuimica_doenca, :cod_risco, :cod_agente, :solucaoCultura_doenca, :prejuizos_doenca)');

$array_pdo = array(
    ':nome_doenca' => $nome,
    ':nomeCientifico_doenca' => $nomeCientifico,
    ':descricao_doenca' => $descricao,
    ':controle_doenca' => $controleDoenca,
    ':solucaoQuimica_doenca' => $solQuimica,
    ':cod_risco' => $nvRisco,
    ':cod_agente' => $agtCausador,
    ':solucaoCultura_doenca' => $solCultura,
    ':prejuizos_doenca' => $prejuizos,
);

if ($con->execute($array_pdo)) {
    $cod_disease = $pdo->lastInsertId();

    $total_count = count($_FILES['imagensDoenca']['name']);

    // Loop through every file
    for ($i = 0; $i < $total_count; $i++) {
        //The temp file path is obtained
        $tmpFilePath = $_FILES['imagensDoenca']['tmp_name'][$i];
        //A file path needs to be present
        if ($tmpFilePath != "") {
            //Setup our new file path
            $newFilePath = "../img/" . $_FILES['imagensDoenca']['name'][$i];
            //File is uploaded to temp dir
            if (move_uploaded_file($tmpFilePath, $newFilePath)) {
                $con = $pdo->prepare("Insert into imagem_doenca(link_imagem, cod_doenca) values (?, ?)");
                $con->bindParam(1, $newFilePath);
                $con->bindParam(2, $cod_disease);
                if ($con->execute()) {
                    echo "Success";
                } else {
                    echo "Error";
                }
            }
        }
    }
    header("location: ../../cms/index.php");
} else {
    echo "Rato";
}

$pdo = null;
?>