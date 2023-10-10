<?php
    $Nombre = $_POST['Nombre'];
    $Telefono = $_POST['telefono'];
    $Correo = $_POST['correo'];
    $Comida = $_POST['comida'];
    $extras = $_POST['extras'];
    $Domicilio = $_POST['Domicilio'];
    $metodoPago = $_POST['metodoPago'];
  

// el valor de la base 
$valorComida = 10000;

// extras 

$valorGaseosa = 4000;
$valorJugo = 4000;
$valorAgua = 1000;
$valorDomicilio = 3500;


//porcentaje
$tarjeta= 3;
$iva= 19;

//resultado total
$total = 0;

   // el total de la compra
   if ($extras == 'no') {
    $total = $valorComida;
}else if ($extras == 'gaseosa') {
    $total = $valorComida + 
    $valorGaseosa;

}else if ($extras == 'jugo') {
    $total = $valorComida + $valorJugo;
    
}else if ($extras == 'agua') {
    $total = $valorComida + $valorAgua;
}


// domicilio

 if ($Domicilio == 'si') {
    $total = $total + $valorDomicilio;
} else {
    $total;
}


$calculoTarjeta = $Tarjeta * $total / 100;

// calcular medio de pago

if ($medioPago == 'tarjeta') {
    $total = $total + $calculoTarjeta;
} else {
    $total;
}

$calculoIva = $iva * $total / 100;
$total = $total + $calculoIva;

// temporales
$bebidaTemporal = 0;
$DomicilioTemporal = 0;


if ($extras == 'no') {
    $bebidaTemporal = 0;
} else if ($extras == 'gaseosa') {
    $bebidaTemporal = $valorGaseosa;
} else if ($extras == 'jugo') {
    $bebidaTemporal = $valorJugo;
} else if ($extras == 'agua') {
    $bebidaTemporal = $valorAgua;
}

if ($Domicilio == 'si') {
    $DomicilioTemporal = $valorDomicilio;
} else {
    $domicilioTemporal = 0;
}

if ($medioPago == 'tarjeta') {
    $total = $total + $calculoTarjeta;
} else {
    $calculoTarjeta = 0;
}


echo 'El total es: ' . $total . '<br>';
echo 'El valor del comida: ' . $valorComida . '<br>';
echo 'El valor de la bebida fue: ' . $bebidaTemporal . '<br>';
echo 'El valor del domicilio fue: ' . $DomicilioTemporal . '<br>';
echo 'El valor del impuesto por pagar con tarjeta: ' . $calculoTarjeta . '<br>';
echo 'El valor del iva fue: ' . $calculoIva . '<br>';

// CAMBIAR URL
echo '<a href="/">Volver</a>'
?>