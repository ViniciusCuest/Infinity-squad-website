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
    <form action="../src/php/insert.php" method="post" enctype="multipart/form-data">
        <label for="nomeDoenca">Nome da Doença:</label><br>
        <input type="text" class="input-box" id="nomeDoenca" name="nomeDoenca"><br>
        <label for="nomeCientifico">Nome Científico:</label><br>
        <input type="text" class="input-box" id="nomeCientifico" name="nomeCientifico"><br>
        <label for="descricao">Descrição:</label><br>
        <textarea id="descricao" class="input-box"name="descricao"></textarea><br>
        <label for="controleDoenca">Controle da Doença:</label><br>
        <textarea id="controleDoenca" class="input-box" name="controleDoenca"></textarea><br>
        <label for="solCultura">Solução Cultural:</label><br>
        <textarea id="solCultura" class="input-box" name="solCultura"></textarea><br>
        <label for="solQuimica">Solução Química:</label><br>
        <textarea id="solQuimica" class="input-box" name="solQuimica"></textarea><br><br>
        <label for="nvRisco">Nível de Risco:</label><br>
        <select name="nvRisco">
            <option value="1">Baixo</option>
            <option value="2">Médio</option>
            <option value="3">Grave</option>
        </select><br><br>
        <label for="agtCausador">Agente Causador:</label><br>
        <select name="agtCausador">
            <option value="1">Fungo</option>
            <option value="2">Bactéria</option>
            <option value="3">Vírus</option>
        </select><br><br>
        <label for="prejuizos">Prejuízos da Doença:</label><br>
        <textarea id="prejuizos" class="input-box" name="prejuizos"></textarea><br>
        <label for="imagensDoenca">Carregar imagens:</label><br>
        <input type="file" name="imagensDoenca[]" multiple="multiple"><br><br>
        <br><button type="submit" name="enviarDoenca">Enviar</button>
    </form>
</body>

</html>