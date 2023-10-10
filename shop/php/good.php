<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./good.css">
    <title>Document</title>
</head>

<body>
    <div class="subBody">
        <div class="boxClass">
            <img class="icon" src="../assets/comprobado.png" alt="comprobado">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $name = $_POST["nombre"];
            }
            echo "
            <p class='agreeText'>Gracias $name, tu pedido llegara pronto!</p>
            ";
            ?>
        </div>
    </div>
</body>

</html>