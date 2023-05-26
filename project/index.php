<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../src/assets/iconMusa.png">
    <link rel="stylesheet" href="../src/styles/index.css">
    <title>Infinity • MusaGo</title>
</head>

<body class="project-body">
    <main>
        <form action="../src/php/diagnostico.php" method="post" enctype="multipart/form-data">
            <input type="file" id="imagemProblema" name="imagemProb" accept="image/png, image/jpeg">
            <button type="submit" id="botaoConfirma" name="botao"> Enviar </button>
        </form>
        <img src="../src/assets/iphone_frente.png" class="image"/>
    </main>
    <button id="ajax"> Ajax </button>
</body>
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script type="text/javascript">
    $('#ajax').click(() => {
        $.ajax({
            method: "GET",
            url: "../src/php/result.php",
            dataType: 'json',
            error: ($err) => {
                alert("Rato" + $err);
            },
            
            success: (response) => {
                
            }
        });
    });
</script>

</html>