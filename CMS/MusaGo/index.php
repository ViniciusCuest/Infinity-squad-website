<!DOCTYPE html>
<html lang="pt-br">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>MusaGo • Manager</title>
   <link rel="icon" href="../../src/assets/iconMusa.png">
   <link rel="stylesheet" href="../../src/styles/index.css?v=<?php echo time(); ?>" />
</head>

<body id="body">
   <div id="modals-area">
      <section style="display: none;" class="delete-modal" id="deleteModal">
         <div class="delete-modal-container">
            <h1>Deseja realmente excluir ?</h1>
            <div>
               <button style="cursor: pointer; width: 50px; height: 50px" id="deletarDado">Sim</button>
               <button style="cursor: pointer; width: 50px; height: 50px" id="closeDeleteModal">Não</button>
            </div>
         </div>
      </section>
      <form class="form-grid" id="modalEdit" enctype="multipart/form-data">
         <div class="grid">
            <div class="diseaseName">
               <label for="nomeDoenca">Nome da Doença:</label>
               <input type="text" class="input-box" id="nomeDoencaEdit" name="nome_doenca">
            </div>
            <div class="scientificName">
               <label for="nomeCientifico">Nome Científico:</label>
               <input type="text" class="input-box" id="nomeCientificoEdit" name="nomeCientifico_doenca">
            </div>
            <div class="descriptionArea">
               <label for="descricao">Descrição:</label>
               <textarea id="descricaoEdit" name="descricao"></textarea>
            </div>
            <div class="diseaseControl">
               <label for="controleDoenca">Controle da Doença:</label>
               <textarea id="controleDoencaEdit" name="controleDoenca"></textarea>
            </div>
            <div class="culturalSolution">
               <label for="solCultura">Solução Cultural:</label>
               <textarea id="solCulturaEdit" name="solCultura"></textarea>
            </div>
            <div class="chemicalSolution">
               <label for="solQuimicaEdit">Solução Química:</label>
               <textarea id="solQuimicaEdit" name="solucaoQuimica_doenca"></textarea>
            </div>
            <input type="hidden" name="cod_doenca">
            <div class="losses">
               <label for="prejuizos">Prejuízos da Doença:</label>
               <textarea id="prejuizosEdit" name="prejuizos"></textarea>
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
               <button type="button" name="enviarDoenca">Cancelar</button>
               <button id="submitModalEdit" type="submit" name="enviarDoenca">Enviar</button>
            </div>
            <button id="closeModal" style="position:absolute; top: 0; right: 0; border-radius: 50%;">
               <svg class="icons sm" style="fill: var(--button-text); width: 28px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                  <path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
               </svg>
            </button>
         </div>
      </form>
      <form class="form-grid" id="modalForm" enctype="multipart/form-data">
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
               <button id="submitModal" type="submit" name="enviarDoenca">Enviar</button>
            </div>
            <button id="closeModal" style="position:absolute; top: 0; right: 0; border-radius: 50%;">
               <svg class="icons sm" style="fill: var(--button-text); width: 28px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                  <path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
               </svg>
            </button>
         </div>
      </form>
   </div>
   <h1>Lista de Doenças identificadas</h1>
   <table class="content-table">
      <thead id="thead">
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
         <Th>Imagens</Th>
         <th>Editar</th>
         <th>Excluir</th>
      </thead>
      <tbody id="tbody">
      </tbody>
   </table>
   <button id="openAddDiseaseModal" class="float-button">
      <svg class="icons sm" style="fill:var(--body-bg)" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
         <path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
      </svg>
   </button>
</body>
<script src="../../src/js/jquery.js"></script>
<script type="text/javascript">
   $(document).ready(() => {
      let order = 'ASC';

      $.ajax({
         type: "GET",
         url: "../../src/php/select_risco.php",
         dataType: "json",
         success: (response) => {
            response.map((item) => {
               $("#nvRisco").append(`<option value='${item.cod_risco}'>${item.titulo_risco}</option>`);
            })
         },
         error: (err) => {
            alert('error ' + err.responseText);
         }
      });

      function fetchTableData(order) {
         $.ajax({
            type: "GET",
            url: "../../src/php/select_table.php",
            dataType: 'json',
            data: {
               order: order
            },

            success: (response) => {
               response.data.map((item) => {
                  $("#tbody").append(`
                  <tr class="row" id="${item.cod_doenca}">
                     <td>
                        ${item.nome_doenca}
                     </td>
                     <td>
                        ${item.nomeCientifico_doenca}          
                     </td>
                     <td>
                        ${item.descricao_doenca.toString().length > 20 ? item.descricao_doenca.toString().substr(0, 20) + '...' : item.descricao_doenca.toString()}
                     </td>
                     <td>
                        ${item.controle_doenca}
                     </td>
                     <td>
                        ${item.solucaoQuimica_doenca}    
                     </td>
                     <td>
                        ${item.solucaoCultura_doenca}    
                     </td>
                     <td>
                        ${item.prejuizos_doenca}
                     </td>
                     <td>
                        ${item.titulo_risco}
                     </td>
                     <td>
                        ${item.nome_agente}
                     </td>
                     <td>
                        ${item.nomeCientifico_agente}                      
                     </td>
                     <td></td>
                     <td>
                        <button 
                           type="button" 
                           id="openModal"
                           data_cod="${item.cod_doenca}"
                           data_nome="${item.nome_doenca}"
                           data_cientifico="${item.nomeCientifico_doenca}"
                           data_descricao="${item.descricao_doenca}"
                           data_controle="${item.controle_doenca}"
                           data_solucaoQui="${item.solucaoQuimica_doenca}"
                           data_solucaoCul="${item.solucaoCultura_doenca}"
                           data_prejuizo="${item.prejuizos_doenca}"
                           data_risco="${item.titulo_risco}"
                           data_agente="${item.nome_agente}"
                           data_Cientifico_agente="${item.nomeCientifico_agente}"
                        >
                           <svg xmlns="http://www.w3.org/2000/svg" style="fill:black; width: 30px" viewBox="0 0 512 512">
                              <path
                                 d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z" />
                           </svg>
                        </button>
                     </td>
                     <td>
                        <button class="openDeleteModal" type="button" data_disease="${item.cod_doenca}">
                           <svg style="fill:black; width: 30px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                              <path
                                 d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z" />
                           </svg>
                        </button>
                     </td>
                  </tr>
                  `);
               });
            },
            error: (e) => {
               alert(e.responseText);
            }
         });
      }

      $("#thead").click((e) => {
         e.preventDefault();
         if (order == 'ASC') {
            order = 'DESC'
            fetchTableData(order);
            return;
         }
         order = 'ASC';
         fetchTableData(order);
      });

      $("#modalEdit").submit((e) => {
         e.preventDefault();
         $.ajax({
            type: "POST",
            url: '../../src/php/update.php',
            dataType: 'json',
            data: new FormData(document.getElementById('modalEdit')),
            processData: false,
            contentType: false,
            cache: false,
            success: (response) => {
               if (response.status == 200)
                  window.location.reload();
               else
                  alert(response.message);
            },
            error: (err) => {
               alert('error ' + err.responseText);
            }
         });

      });

      $("#modalForm").submit((e) => {
         e.preventDefault();
         $.ajax({
            type: "POST",
            url: "../../src/php/insert.php",
            dataType: "json",
            data: new FormData(document.getElementById('modalForm')),
            processData: false,
            contentType: false,
            cache: false,
            success: (response) => {
               if (response.status == 200)
                  window.location.reload();
               else
                  alert(response.message);
            },
            error: (err) => {
               alert('error ' + err.responseText);
            }
         });
      });

      $(document).on("click", ".openDeleteModal", (e) => {
         e.preventDefault();
         $("#deleteModal #deletarDado").attr({
            cod_delete: e.currentTarget.attributes.data_disease.value
         });
         $("#deleteModal").css({
            display: 'flex',
         });
      })

      $(document).on("click", ".row #openModal", (e) => {
         e.preventDefault();

         console.log(e.currentTarget.attributes);
         $("#nomeDoencaEdit").val(e.currentTarget.attributes.data_nome.value);
         $("#nomeCientificoEdit").val(e.currentTarget.attributes.data_cientifico.value);
         $("#descricaoEdit").val(e.currentTarget.attributes.data_descricao.value);
         $("#controleDoencaEdit").val(e.currentTarget.attributes.data_controle.value);
         $("#solCulturaEdit").val(e.currentTarget.attributes.data_solucaoCul.value);
         $("#solQuimicaEdit").val(e.currentTarget.attributes.data_solucaoQui.value);
         $("#nvRiscoEdit").val(e.currentTarget.attributes.data_risco.value);
         $("#agtCausadorEdit").val(e.currentTarget.attributes.data_agente.value);
         $("#prejuizosEdit").val(e.currentTarget.attributes.data_prejuizo.value);
         $("#modalEdit").css({
            display: 'flex'
         });
      });

      $("#closeDeleteModal").on("click", (e) => {
         e.preventDefault();
         $("#deleteModal #deletarDado").removeAttr('cod_delete');
         $("#deleteModal").css({
            display: 'none'
         });
      });

      $("#deletarDado").click((e) => {
         e.preventDefault();
         $.ajax({
            type: 'GET',
            url: '../../src/php/delete.php',
            dataType: 'json',
            data: {
               cod_doenca: e.currentTarget.attributes.cod_delete.value
            },
            success: (response) => {
               if (response.status == 200)
                  window.location.reload();
               else
                  alert(response.message);
            },
            error: (err) => {
               alert("" + err.responseText);
            }
         });
      });

      $("#openAddDiseaseModal").on("click", (e) => {
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

      fetchTableData(order);

   });
</script>
<script src="../../src/js/DropDownFiles.js?j=<?php echo time(); ?>"></script>

</html>