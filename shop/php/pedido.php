<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./pedido.css">
    <link rel="stylesheet" href="../main.css" />
    <title>Document</title>
</head>

<body>

    <nav>
        <div class="subHeader">
            <div class="imgHeader">
                <img class="iconHeader" src="../assets/cesta-de-la-compra.png" alt="cesta_compra" />
            </div>
            <p class="nameShop">EzFood</p>
            <div class="options">
                <a class="option" href="./pages/contact.html">Contacto</a>
            </div>
        </div>
    </nav>

    <div class="boxDetails">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Retrieve selected items
            $items = isset($_POST["item"]) ? $_POST["item"] : [];

            // Calculate base cost based on selected items
            $baseCost = count($items) * 13000;

            // Calculate drink cost
            $drinkSelect = isset($_POST["bebida"]) ? $_POST["bebida"][0] : "nada";
            $drinkCost = 0;
            if ($drinkSelect == "gaseosa") {
                $drinkCost = 3000; // Gaseosa costs $3000 extra
            } elseif ($drinkSelect == "jugo") {
                $drinkCost = 5000; // Jugo costs $5000 extra
            } elseif ($drinkSelect == "agua") {
                $drinkCost = 1000; // Agua costs $1000 extra
            }

            // Calculate delivery cost
            $deliverySelect = isset($_POST["envio"]) ? $_POST["envio"][0] : "presencial";
            $deliveryCost = ($deliverySelect == "domicilio") ? 3500 : 0;

            // Calculate total cost
            $totalCost = $baseCost + $drinkCost + $deliveryCost;

            // Check if payment is with a card and add a 3% fee
            $paymentMethods = isset($_POST["pago"]) ? $_POST["pago"] : [];
            if (in_array("tarjeta", $paymentMethods)) {
                $totalCost *= 1.03; // 3% fee for card payment
            }

            // Display the order summary
            echo "
                <div class='deliveryBox'>
                    <div class='subDelivery'>
                        <div class='boxOne'>
                            <h1>Order Summary</h1>
                        </div>
                        <div class='boxSecond'>
                            <div class='subSecond'>
                                <p>Coste comida: <span class='price'>$" . $baseCost . "</span></p>
                                <p>Coste bebidas: <span class='price'>$" . $drinkCost . "</span></p>
                                <p>Coste de entrega: <span class='price'>$" . $deliveryCost . "</span></p>
                                <p>Total impuestos: <span class='price'>$" . ($totalCost - $baseCost - $drinkCost - $deliveryCost) . "</span></p>
                                <p>Total a pagar: <span>$" . $totalCost . "</span></p>
                            </div>
                        </div>
                    </div>
                </div>
                ";
        }
        ?>

        <form action="./good.php" method="POST">
            <div class="subForm">
                <div class="box1">
                    <p>Nombre</p>
                </div>
                <div class="box2">
                    <input type="text" name="nombre">
                </div>
            </div>

            <div class="subForm">
                <div class="box1">
                    <p>Direccion</p>
                </div>
                <div class="box2">
                    <input type="text">
                </div>
            </div>

            <div class="subForm">
                <div class="box1">
                    <p>Telefono</p>
                </div>
                <div class="box2">
                    <input type="text">
                </div>
            </div>

            <div class="btnForm">
                <button type="submit">Ordenar</button>
            </div>

        </form>
    </div>
</body>

</html>