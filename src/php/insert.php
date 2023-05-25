<?php

include('../../conexao.php');

$pdo = Connection();

$nome = $_POST["nome"];
$email = $_POST["email"];
$tel = $_POST["tel"];
$tel = $_POST["tel"];
$tel = $_POST["tel"];
$tel = $_POST["tel"];
$tel = $_POST["tel"];
$tel = $_POST["tel"];
$tel = $_POST["tel"];

$con = $pdo->prepare('INSERT INTO doenca(nome_doenca, nomeCientifico_doenca, descricao_doenca, controle_doenca, solucaoQuimica_doenca, cod_risco, cod_agente, solucaoCultura_doenca, prejuizos_doenca VALUES (:nome_doenca, :nomeCientifico_doenca, :descricao_doenca, :controle_doenca, :solucaoQuimica_doenca, :cod_risco, :cod_agente, :solucaoCultura_doenca, :prejuizos_doenca)');

$array_pdo = array(
    ':nome_doenca' => $nome,
    ':nomeCientifico_doenca' => $nome,
    ':descricao_doenca' => $nome,
    ':controle_doenca' => $tel,
    ':solucaoQuimica_doenca' => $tel,
    ':cod_risco' => $tel,
    ':cod_agente' => $tel,
    ':solucaoCultura_doenca' => $tel,
    ':prejuizos_doenca' => $tel,

);


$con->execute($array_pdo);

?>