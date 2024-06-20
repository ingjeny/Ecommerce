<?php
require_once "../config/conexion.php";

$usuario = "admi2";
$nombre = "jeny";
$clave = "12345";
$clave_encriptada = md5($clave); // Encriptar la contraseña

// Comprobar si el usuario ya existe
$check_user_query = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
$result = mysqli_query($conexion, $check_user_query);

if (mysqli_num_rows($result) > 0) {
    echo "El usuario ya existe.";
} else {
    // Insertar el usuario
    $insert_query = "INSERT INTO usuarios (usuario, nombre, clave) VALUES ('$usuario', '$nombre', '$clave_encriptada')";
    if (mysqli_query($conexion, $insert_query)) {
        echo "Usuario insertado correctamente.";
    } else {
        echo "Error: " . $insert_query . "<br>" . mysqli_error($conexion);
    }
}

mysqli_close($conexion);
?>
