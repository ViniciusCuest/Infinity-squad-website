<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../src/assets/iconMusa.png">
    <link rel="stylesheet" href="../src/styles/index.css?v=<?php echo time(); ?>">
    <title>Infinity • MusaGo</title>
</head>

<body class="project-body">
    <div id="loading">
        <div></div>
        <img id="load" style="animation: spinner 3s ease infinite; display: none" src="../src/assets/load-icn.png" alt="">
        <div></div>
    </div>
    <main class="project-body-container">
        <div class="prototype-mockup" id="prototype-mockup">
            <img src="../src/assets/Background.png?V=<?php echo time() ?>" class="mockup">
            <img src="../src/assets/splash-screen.png?V=<?php echo time() ?>" class="screenshot" />
        </div>
        <form enctype="multipart/form-data">
            <div>
                <div id="divReference" style="opacity: .4" class="upload-single-image-container proj">
                    <div id="uploadContainer" class="upload-single-image__upload-file-container">
                        <input disabled id="fileInputReference" class="upload-single-image-file-input" type="file" name="img-diagnostico">
                    </div>
                </div>
                <button id="removeAll">Remove all Images</button>
            </div>
            <button type="button" id="submit" name="botao"> Enviar </button>
        </form>
    </main>
    <!--
    <button id="ajax"> Ajax </button>
-->
</body>
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script type="text/javascript">
    $(document).ready(() => {

        let availableToSend = false;

        $("#prototype-mockup").one('click', (e) => {
            e.preventDefault();
            $('.screenshot').remove();
            $('.prototype-mockup').append('<img src="../src/assets/blank-screen.png" class="screenshot" />');
            $('.prototype-mockup').append('<div class="loadApp"></div>');
            setTimeout(async () => {
                await $('.screenshot').remove();
                await $('.loadApp').remove();
                $('.prototype-mockup').append('<img src="../src/assets/dashboard-screen.png" id="dash-screen" class="screenshot" />');
            }, 2500);
        });

        $("#prototype-mockup").click((e) => {
            e.preventDefault();
            if (e.currentTarget.children['dash-screen']) {
                $('.screenshot').remove();
                $("#divReference").removeAttr('style');
                $("#fileInputReference").prop("disabled", false);
                $('.prototype-mockup').append('<img src="../src/assets/camera.png" id="camera" class="screenshot" />');
            }
        });

        $('#fileInputReference').change((e) => {
            e.preventDefault();
            if (e.currentTarget.files.length)
                availableToSend = true;
        });

        $('#submit').click((e) => {
            e.preventDefault();

            if (!availableToSend) 
                return;

            $.ajax({
                method: "GET",
                url: "../src/php/result.php",
                dataType: 'json',
                beforeSend: () => {
                    $("#loading").addClass('loading');
                    $("#load").css({ display: "block" });
                },
                error: ($err) => {
                    alert("Rato" + $err);
                },

                success: (response) => {

                }
            });
        });
    })
</script>
<script src="../src/js/DropDownFiles.js?v=<?php echo time(); ?>"></script>

</html>