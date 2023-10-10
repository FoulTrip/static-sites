<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Fn = $_POST["firstNote"];
    $Sn = $_POST["secondNote"];
    $Tn = $_POST["threeNote"];

    $suma = $Fn + $Sn + $Tn;
    $promedio = $suma / 3;

    if ($promedio < 2.5) {
        echo "<p>Promedio: $promedio</p>
        <p>Reprueba y debe repetir la asignatura.</p>";
    } elseif ($promedio < 2.6 || $promedio < 3.4) {
        echo "<p>Promedio: $promedio</p>
        <p>Aplazado y debe habilitar la asignatura.</p>";
    } else {
        echo "<p>Promedio: $promedio</p>
        <p>aprueba la materia.</p>";
    }
}

?>