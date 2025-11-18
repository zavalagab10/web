<?php
// ============================================
// Archivo: conexion.php
// Descripción: Conexión a SQL Server
// Base de datos: clinica_vet
// ============================================

// Parámetros de conexión
$serverName = "localhost\\SQLEXPRESS"; // Nombre del servidor (doble barra)

$connectionOptions = array(
    "Database" => "clinica_vet", // Nombre de la base de datos
    "Uid" => "",                 // Usuario (vacío si usas autenticación de Windows)
    "PWD" => "",                 // Contraseña (vacío si usas autenticación de Windows)
    "CharacterSet" => "UTF-8"    // Soporte de acentos y ñ
);

// Intentar conexión
$conn = sqlsrv_connect($serverName, $connectionOptions);

// Verificar si la conexión fue exitosa
if ($conn) {
    echo "<p style='color: green;'>✔️ Conexión exitosa a SQL Server.</p>";
} else {
    echo "<p style='color: red;'>❌ Error en la conexión a SQL Server.</p>";
    die(print_r(sqlsrv_errors(), true)); // Corregido: solo necesita los paréntesis normales
}
?>
