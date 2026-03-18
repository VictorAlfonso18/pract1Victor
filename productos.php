<?php

// Crear conexión con MySQL
// Parámetros: servidor, usuario, contraseña, base de datos
$conexion = new mysqli("localhost", "root", "roma666", "Heladeria");

// Verificar si hubo error en la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Ejecutar consulta SQL
// ORDER BY id ASC significa ordenar por id de menor a mayor
$resultado = $conexion->query("SELECT * FROM productos ORDER BY id ASC");

// Título que aparecerá en la página
echo "<h2>Lista de Productos - Heladería </h2>";

// Crear la estructura de la tabla HTML
// border = grosor del borde
// cellpadding = espacio interno de cada celda
// cellspacing = espacio entre celdas
echo "<table border='1' cellpadding='10' cellspacing='0'>";

// Encabezados de la tabla (th = table header)
echo "<tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Sabor</th>
        <th>Precio</th>
      </tr>";

// Recorrer cada fila que devuelve la consulta
while ($fila = $resultado->fetch_assoc()) {

    // Crear una fila nueva en la tabla
    echo "<tr>";

    // Mostrar cada columna dentro de una celda (td = table data)
    echo "<td>" . $fila['id'] . "</td>";
    echo "<td>" . $fila['nombre'] . "</td>";
    echo "<td>" . $fila['sabor'] . "</td>";
    echo "<td>$" . $fila['precio'] . "</td>";

    echo "</tr>";
}

// Cerrar la tabla
echo "</table>";

// Cerrar la conexión a la base de datos
$conexion->close();

?>