<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="./App/Public/Src/panzer.jpg">
    <title>Qultep php</title>

    <style>
        img{
            width:20vw;
        }

    </style>
</head>
<body>
    <div class="content">
        <center>
            <br><br><br><br><br><br><br><br><br><br><br>
            <img src="./App/Public/Src/logo.svg" alt="qultep">
            <p><?= $data["titulo"];  ?></p>
            <p><?=  $data[0]["titulo"]; ?></p>
        </center>
    </div>
</body>
</html>
