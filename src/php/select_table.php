<?php
include("../conexao.php");
include("../../src/php/sorting.php");

$pdo = Connection();
$con = $pdo->query("SELECT * FROM doenca inner join nivel_risco on doenca.cod_risco = nivel_risco.cod_risco inner join agente_causador on doenca.cod_agente = agente_causador.cod_agente group by nome_doenca;");

$order = $_GET['order'];

$response = array(
    'status' => 500,
    'message' => 'Data fetch failed, please try again.',
    'data' => []
);

$array = array();
if ($con->execute()) {
    while ($row = $con->fetch(PDO::FETCH_ASSOC))
        $array[] = $row;

    $response['status'] = 200;
    $response['data'] = mergeSort($array, $order);
}

echo json_encode($response);
?>