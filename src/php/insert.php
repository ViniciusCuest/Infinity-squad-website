<?php
header('Access-Control-Allow-Origin: *');
include('../conexao.php');
$pdo = Connection();

$response = array(
    'status' => 500,
    'message' => 'Form submission failed, please try again.'
);

$con = $pdo->prepare('INSERT INTO doenca(nome_doenca, nomeCientifico_doenca, descricao_doenca, controle_doenca, solucaoQuimica_doenca, cod_risco, cod_agente, solucaoCultura_doenca, prejuizos_doenca) VALUES (:nome_doenca, :nomeCientifico_doenca, :descricao_doenca, :controle_doenca, :solucaoQuimica_doenca, :cod_risco, :cod_agente, :solucaoCultura_doenca, :prejuizos_doenca)');

$array_pdo = array(
    ':nome_doenca' => $_POST["nomeDoenca"],
    ':nomeCientifico_doenca' => $_POST["nomeCientifico"],
    ':descricao_doenca' => $_POST["descricao"],
    ':controle_doenca' => $_POST["controleDoenca"],
    ':solucaoQuimica_doenca' => $_POST["solQuimica"],
    ':cod_risco' => $_POST["nvRisco"],
    ':cod_agente' => $_POST["agtCausador"],
    ':solucaoCultura_doenca' => $_POST["solCultura"],
    ':prejuizos_doenca' => $_POST["prejuizos"],
);

if ($con->execute($array_pdo)) {
    $cod_disease = $pdo->lastInsertId();

    $total_count = count($_FILES['imagensDoenca']['name']);

    $response['message'] = $total_count;

    for ($i = 0; $i < $total_count; $i++) {
        $tmpFilePath = $_FILES['imagensDoenca']['tmp_name'][$i];

        $ext = pathinfo($_FILES['imagensDoenca']['name'][$i], PATHINFO_EXTENSION);
        $fileName = (rand(1,99999) * $_FILES['imagensDoenca']['size'][$i]) * rand(1,999);

        if ($tmpFilePath != "") {

            $completeFile = $fileName.".".$ext;

            $newFilePath = "../img/".$completeFile;
            //File is uploaded to temp dir
            if (move_uploaded_file($tmpFilePath, $newFilePath)) {
                $con = $pdo->prepare("Insert into imagem_doenca(link_imagem, cod_doenca) values (?, ?)");
                $con->bindParam(1, $completeFile);
                $con->bindParam(2, $cod_disease);
                if ($con->execute())
                    $response['status'] = 200;
                else
                    $response['message'] = "File not uploaded";
            }
        }
    }
} else {
    $response['message'] = "Data not inserted in database";
}

echo json_encode($response);

$pdo = null;
