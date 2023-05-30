<?php
include('../conexao.php');
$pdo = Connection();

$con = $pdo->query("SELECT * FROM doenca inner join nivel_risco on doenca.cod_risco = nivel_risco.cod_risco inner join agente_causador on doenca.cod_agente = agente_causador.cod_agente group by nome_doenca;");

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Infinity • MusaGo</title>
    <link rel="stylesheet" href="../src/styles/index.css">
</head>

<body>
    <h1>Lista de Doenças</h1>
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Nome Científico</th>
                <th>Descrição</th>
                <th>Controle da Doença</th>
                <th>Solução Química</th>
                <th>Solução Cultural</th>
                <th>Prejuízos de Doença</th>
                <th>Nível do Risco</th>
                <th>Agente Causador</th>
                <th>Nome Científico do Agente</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = $con->fetch(PDO::FETCH_ASSOC)) { ?>
                <tr>
                    <td>
                        <?= utf8_encode($row['nome_doenca']) ?>
                    </td>
                    <td>
                        <?= utf8_encode($row['nomeCientifico_doenca']) ?>
                    </td>
                    <td>
                        <?= utf8_encode($row['descricao_doenca']) ?>
                    </td>
                    <td>
                        <?= utf8_encode($row['controle_doenca']) ?>
                    </td>
                    <td>
                        <?= utf8_encode($row['solucaoQuimica_doenca']) ?>
                    </td>
                    <td>
                        <?= utf8_encode($row['solucaoCultura_doenca']) ?>
                    </td>
                    <td>
                        <?= utf8_encode($row['prejuizos_doenca']) ?>
                    </td>
                    <td>
                        <?= utf8_encode($row['titulo_risco']) ?>
                    </td>
                    <td>
                        <?= utf8_encode($row['nome_agente']) ?>
                    </td>
                    <td>
                        <?= utf8_encode($row['nomeCientifico_agente']) ?>
                    </td>
                    <td><button type="button">Editar</button></td>
                    <td><button type="button" data-disease_id=<?=$row['cod_doenca']?>>Excluir</button></td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</body>

</html>