<?php
include("conexion.php");

// Datos del usuario que quieres probar
$correo = 'admin@veterinaria.com';
$passwordIngresada = 'admin123';

// Buscar en la base de datos
$sql = "SELECT Password FROM USUARIOS_LOGIN WHERE Correo = ?";
$params = array($correo);
$stmt = sqlsrv_query($conn, $sql, $params);

if ($stmt && $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
    $hash = $row['Password'];

    // Si viene como stream, convertirlo
    if (is_resource($hash)) {
        $hash = stream_get_contents($hash);
    }

    $hash = trim((string)$hash);

    echo "<h3>🔍 Hash recuperado:</h3>";
    echo "<pre>$hash</pre>";

    if (password_verify($passwordIngresada, $hash)) {
        echo "<p style='color:green;font-weight:bold;'>✅ Coincide la contraseña correctamente.</p>";
    } else {
        echo "<p style='color:red;font-weight:bold;'>❌ No coincide la contraseña.</p>";
    }
} else {
    echo "<p style='color:red;'>⚠️ No se encontró el correo en la base de datos.</p>";
}
?>