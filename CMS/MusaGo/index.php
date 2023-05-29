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
   <form class="form-grid" id="modalForm" method="post" enctype="multipart/form-data">
      <div class="grid">
         <div class="diseaseName">
            <label for="nomeDoenca">Nome da Doença:</label>
            <input type="text" class="input-box" id="nomeDoenca" name="nomeDoenca">
         </div>
         <div class="scientificName">
            <label for="nomeCientifico">Nome Científico:</label>
            <input type="text" class="input-box" id="nomeCientifico" name="nomeCientifico">
         </div>
         <div class="descriptionArea">
            <label for="descricao">Descrição:</label>
            <textarea id="descricao" name="descricao"></textarea>
         </div>
         <div class="diseaseControl">
            <label for="controleDoenca">Controle da Doença:</label>
            <textarea id="controleDoenca" name="controleDoenca"></textarea>
         </div>
         <div class="culturalSolution">
            <label for="solCultura">Solução Cultural:</label>
            <textarea id="solCultura" name="solCultura"></textarea>
         </div>
         <div class="chemicalSolution">
            <label for="solQuimica">Solução Química:</label>
            <textarea id="solQuimica" name="solQuimica"></textarea>
         </div>
         <div class="riskLevel">
            <label for="nvRisco">Nível de Risco:</label>
            <select id="nvRisco" name="nvRisco">

            </select>
         </div>
         <div class="agent">
            <label for="agtCausador">Agente Causador:</label>
            <select id="agtCausador" name="agtCausador">
               <option value="1">Fungo</option>
               <option value="2">Bactéria</option>
               <option value="3">Vírus</option>
            </select>
         </div>
         <div class="losses">
            <label for="prejuizos">Prejuízos da Doença:</label>
            <textarea id="prejuizos" name="prejuizos"></textarea>
         </div>
         <div class="fileArea">
            <label for="imagensDoenca">Carregar imagens:</label>
            <div>
               <div draggable="true" id="divReference" class="upload-single-image-container">
                  <div id="uploadContainer" class="upload-single-image__upload-file-container">
                     <input id="fileInputReference" class="upload-single-image-file-input" type="file" name="imagensDoenca[]" multiple="multiple">
                  </div>
               </div>
               <button id="removeAll">Remove all Images</button>
            </div>
         </div>
         <div class="submitButton">
            <button type="" name="enviarDoenca">Cancelar</button>
            <button id="submitModal" type="" name="enviarDoenca">Enviar</button>
         </div>
         <button id="closeModal" style="position:absolute; top: 0; right: 0; border-radius: 50%;">
            <svg class="icons sm" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
               <path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
            </svg>
         </button>
      </div>
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
   <button id="openAddDiseaseModal" class="float-button">
      <svg class="icons sm" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
         <path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
      </svg>
   </button>
</body>
<script src="../../src/js/jquery.js"></script>
<script>
   $(document).ready(() => {

      $.ajax({
         type: "GET",
         url: "../../src/php/select_risco.php",
         dataType: "json",
         success: (response) => {
            response.map((item) => {
               $("#nvRisco").append(`<option value='${item.cod_risco}'>${item.titulo_risco}</option>`)
            })
         },
         error: (err) => {
            alert('error ' + err.responseText)
         }
      });


      $("#submitModal").click((e) => {
         e.preventDefault();
         var form_data = new FormData(document.getElementById("modalForm"));
         var data = {
            nomeDoenca: $("#nomeDoenca").val(),
            nomeCientifico: $("#nomeCientifico").val(),
            descricao: $("#descricao").val(),
            controleDoenca: $("#controleDoenca").val(),
            solCultura: $("#solCultura").val(),
            solQuimica: $("#solQuimica").val(),
            nvRisco: $("#nomeDoenca").val(),
            agtCausador: $("#nomeDoenca").val(),
            prejuizos: $("#nomeDoenca").val(),
         }

         $.ajax({
            type: "POST",
            url: "../../src/php/insert.php",
            dataType: "json",
            data: data,
            success: (Ea) => {
               alert('sucesso' + Ea)
            },
            error: (err) => {
               alert('error ' + err.responseText)
            }
         });
      })
      $("#openAddDiseaseModal").click((e) => {
         e.preventDefault();
         $("#body").css({
            "overflow": "hidden"
         });
         $(".form-grid").css({
            "display": "flex",
            "overflow": "hidden"
         });
         $(".form-grid .grid").css({
            "overflow": "auto",
         });
      });
      $("#closeModal").click((e) => {
         e.preventDefault();
         $(".form-grid").css({
            "display": "none"
         });
      });
   });
</script>
<script src="../../src/js/DropDownFiles.js?j=<?php echo time(); ?>"></script>

</html>