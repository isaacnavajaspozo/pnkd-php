<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="./srv/public/src/DRAGON.jpg">
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
            <img src="./srv/public/src/DRAGON.png" alt="qultep">
            <p><?= $data[0]["certificado"];  ?></p>
            <p><?=  $data[0]["usuario"]; ?></p>
        </center>
    </div>
</body>
</html>
