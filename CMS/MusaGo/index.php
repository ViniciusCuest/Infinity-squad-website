<!DOCTYPE html>
<html lang="pt-br">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>MusaGo • Manager</title>
   <link rel="stylesheet" href="../../src/styles/index.css?v=<?php echo time(); ?>" />
</head>

<body id="body">
   <form class="form-grid" action="../src/php/insert.php" method="post" enctype="multipart/form-data">
      <div class="diseaseName">
         <label for="nomeDoenca">Nome da Doença:</label><br>
         <input type="text" class="input-box" id="nomeDoenca" name="nomeDoenca"><br>
      </div>
      <div class="scientificName">
         <label for="nomeCientifico">Nome Científico:</label><br>
         <input type="text" class="input-box" id="nomeCientifico" name="nomeCientifico"><br>
      </div>
      <div class="descriptionArea">
         <label for="descricao">Descrição:</label><br>
         <textarea id="descricao" name="descricao"></textarea><br>
      </div>
      <div class="diseaseControl">
         <label for="controleDoenca">Controle da Doença:</label><br>
         <textarea id="controleDoenca" name="controleDoenca"></textarea><br>
      </div>
      <div class="culturalSolution">
         <label for="solCultura">Solução Cultural:</label><br>
         <textarea id="solCultura" name="solCultura"></textarea><br>
      </div>
      <div class="chemicalSolution">
         <label for="solQuimica">Solução Química:</label><br>
         <textarea id="solQuimica" name="solQuimica"></textarea><br><br>
      </div>
      <div class="riskLevel">
         <label for="nvRisco">Nível de Risco:</label><br>
         <select name="nvRisco">
            <option value="1">Baixo</option>
            <option value="2">Médio</option>
            <option value="3">Grave</option>
         </select><br><br>
      </div>
      <div class="agent">
         <label for="agtCausador">Agente Causador:</label><br>
         <select name="agtCausador">
            <option value="1">Fungo</option>
            <option value="2">Bactéria</option>
            <option value="3">Vírus</option>
         </select><br><br>
      </div>
      <div class="losses">
         <label for="prejuizos">Prejuízos da Doença:</label><br>
         <textarea id="prejuizos"name="prejuizos"></textarea><br>
      </div>
      <div class="fileArea">
         <label for="imagensDoenca">Carregar imagens:</label><br>
         <div>
            <div draggable="true" id="divReference" class="upload-single-image-container">
               <div id="uploadContainer" class="upload-single-image__upload-file-container">
                  <input id="fileInputReference" class="upload-single-image-file-input" type="file" name="imagensDoenca[]" multiple="multiple">
               </div>
            </div>
            <button id="removeAll">Remove all Images</button>
         </div>
      </div>
      <div class="submitButton"></div>
      <button type="submit" name="enviarDoenca">Enviar</button>
   </form>
   <h1>Lista de Doenças indentificadas</h1>
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
         include("../../src/conexao.php");
         $pdo = Connection();
         $con = $pdo->query("SELECT * FROM doenca inner join nivel_risco on doenca.cod_risco = nivel_risco.cod_risco inner join agente_causador on doenca.cod_agente = agente_causador.cod_agente group by nome_doenca;");
         while ($row = $con->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
               <td>
                  <?= $row['nome_doenca']; ?>
               </td>
               <td>
                  <?= $row['nomeCientifico_doenca']; ?>
               </td>
               <td>
                  <?= $row['descricao_doenca']; ?>
               </td>
               <td>
                  <?= $row['controle_doenca']; ?>
               </td>
               <td>
                  <?= $row['solucaoQuimica_doenca']; ?>
               </td>
               <td>
                  <?= $row['solucaoCultura_doenca']; ?>
               </td>
               <td>
                  <?= $row['prejuizos_doenca']; ?>
               </td>
               <td>
                  <?= $row['titulo_risco']; ?>
               </td>
               <td>
                  <?= $row['nome_agente']; ?>
               </td>
               <td>
                  <?= $row['nomeCientifico_agente']; ?>
               </td>
               <td><button type="button" id="openModal">Editar</button></td>
               <td><button type="button" data-disease_id=<?= $row['cod_doenca'] ?>>Excluir</button></td>
            </tr>
         <?php
         }
         ?>
      </tbody>
   </table>
</body>
<script src="../../src/js/jquery.js"></script>
<script>
   $(document).ready(() => {
      $("#openModal").click(() => {
         $("#body").append("");
      });
   });
</script>
<script src="../../src/js/DropDownFiles.js?j=<?php echo time(); ?>"></script>

</html>