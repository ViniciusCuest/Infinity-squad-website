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
    <div id="loading" style="display: none; padding: 0 5vw">
        <div style="
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-template-rows: repeat(4, 1fr);
            grid-column-gap: 10px;
            grid-row-gap: 10px;
            width: 400px;
            height: 75vh" id="db-img"></div>
        <img id="load" style="animation: spinner 3s ease infinite; display: none" src="../src/assets/load-icn.png" alt="">
        <div id="user-img"></div>
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
                        <input disabled id="fileInputReference" class="upload-single-image-file-input" type="file" name="img-diagnostico" accept="image/*">
                    </div>
                </div>
                <button id="removeAll"> Limpar Imagens</button>
            </div>
            <button type="button" style="cursor: pointer; width: 50%; margin-top: 20px; height: 40px; border-radius: 8px; background-color: #fff; font-weight: 800; " id="submit" name="botao"> Enviar </button>
        </form>
    </main>
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
        $("#fileInputReference").change((e) => {
            e.preventDefault();
            if (e.currentTarget.files.length) {
                const reader = new FileReader();
                reader.readAsDataURL(e.currentTarget.files[0]);
                reader.onload = () => {
                    $("#user-img").append(`<img style="width: 10vw" src="${reader.result}"/>`);
                }
            }
        });

        $('#submit').click((e) => {
            e.preventDefault();
            if (!availableToSend)
                return;

            $.ajax({
                type: "GET",
                url: "../src/php/result.php",
                dataType: 'json',
                beforeSend: () => {
                    $("#loading").addClass('loading');
                    $("#loading").css({
                        display: "flex"
                    });
                    $("#load").css({
                        display: "block"
                    });
                },
                error: (err) => {
                    console.log(err.responseText);
                },
                success: (response) => {
                    response.data.map((item, index) => {
                        setTimeout(() => {
                            $("#db-img").append(`<img style="width: 100%" src="../src/img/${item.link_imagem}"/>`);
                        }, 800 * index);
                    });
                    setTimeout(() => {
                        setTimeout(() => {
                            $("#loading").removeClass('loading');
                            $("#loading").css({
                                display: "none"
                            });
                            $("#load").css({
                                display: "none"
                            });
                            $("#user-img").empty();
                            $("#db-img").empty();
                        }, 2200);
                        $('.screenshot').remove();
                        $('.prototype-mockup').append('<img src="../src/assets/diagnostico.png" style="margin-top: 29px" id="camera" class="screenshot" />');
                    }, 2800);

                }
            });
        });
    })
</script>
<script src="../src/js/DropDownFiles.js?v=<?php echo time(); ?>"></script>

</html>