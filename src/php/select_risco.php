<?php 
header('Access-Control-Allow-Origin: *');
include('../conexao.php');

$pdo = Connection();

$sql = $pdo->query("SELECT * FROM nivel_risco");
if($sql->execute()) 
   echo json_encode($sql->fetchAll(), JSON_UNESCAPED_UNICODE);
else 
echo 'erro';
?>
