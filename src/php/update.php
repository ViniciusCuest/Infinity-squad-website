<?php

include('../conexao.php');

$pdo = Connection();
$pdo -> exec("SET CHARACTER SET utf8");

$cod_doenca = $_POST['cod_doenca'];

$nome = $_POST["nomeDoenca"];
$nomeCientifico = $_POST["nomeCientifico"];
$descricao = $_POST["descricao"];
$controleDoenca = $_POST["controleDoenca"];
$solCultura = $_POST["solCultura"];
$solQuimica = $_POST["solQuimica"];
$nvRisco = $_POST["nvRisco"];
$agtCausador = $_POST["agtCausador"];
$prejuizos = $_POST["prejuizos"];

$con = $pdo->prepare('UPDATE doenca SET :nome_doenca, :nomeCientifico_doenca, :descricao_doenca, :controle_doenca, :solucaoQuimica_doenca, :cod_risco, :cod_agente, :solucaoCultura_doenca, :prejuizos_doenca WHERE cod_doenca = :cod_doenca');

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
    ':cod_doenca' => $cod_doenca
);

$con->execute($array_pdo);
echo $con->rowCount();

?>