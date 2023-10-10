<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $hrs = $_POST["hrs"];
    $tarifa = $_POST["tarifa"];

    $sueldo = $hrs * $tarifa;

    echo "<p>hrs: $hrs</p>
    <p>Tarifa: $tarifa</p>
    <p>Conversion (hrs * tarifa): $hrs * $tarifa </p>
    <p>Sueldo: $sueldo</p>";
}

?>