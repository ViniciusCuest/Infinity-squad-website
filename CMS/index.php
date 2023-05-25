<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Infinity • MusaGo</title>
</head>

<body>
    <form action="../src/php/diagnostico.php" method="post">
        <label for="nomeDoenca">Nome da Doença:</label><br>
        <input type="text" id="nomeDoenca" name="nomeDoenca"><br>
        <label for="nomeCientifico">Nome Científico:</label><br>
        <input type="text" id="nomeCientifico" name="nomeCientifico"><br>
        <label for="descricao">Descrição:</label><br>
        <textarea id="descricao" name="descricao"></textarea><br>
        <label for="controleDoenca">Controle da Doença:</label><br>
        <textarea id="controleDoenca" name="controleDoenca"></textarea><br>
        <label for="solCultura">Solução Cultural:</label><br>
        <textarea id="solCultura" name="solCultura"></textarea><br>
        <label for="solQuimica">Solução Química:</label><br>
        <textarea id="solQuimica" name="solQuimica"></textarea><br>
        <label for="nvRisco">Nível de Risco:</label><br>
        <select name="nvRisco">
            <option value="1">Baixo</option>
            <option value="2">Médio</option>
            <option value="3">Grave</option>
        </select><br>
        <label for="agtCausador">Agente Causador:</label><br>
        <select name="tipoAgente">
            <option value="1">Fungo</option>
            <option value="2">Bactéria</option>
            <option value="3">Vírus</option>
        </select><br>
        <br><button type="submit" name="enviarDoenca">Enviar</button>
    </form>
</body>

</html>