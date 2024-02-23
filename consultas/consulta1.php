<?php
require_once "../config/db.php";



try {
    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PWD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $query = "
        SELECT l.titulo, l.autor, u.nombre as nombre_usuario, p.fecha_prestamo, p.fecha_devolucion
        FROM prestamo p
        JOIN libro l ON p.libro_id = l.id
        JOIN usuario u ON p.usuario_id = u.id
        WHERE p.fecha_devolucion IS NULL
    ";

    $stmt = $pdo->query($query);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    
    foreach ($result as $row) {
        echo "Título: " . $row['titulo'] . "<br>";
        echo "Autor: " . $row['autor'] . "<br>";
        echo "Usuario: " . $row['nombre_usuario'] . "<br>";
        echo "Fecha de Préstamo: " . $row['fecha_prestamo'] . "<br>";
        echo "Fecha de Devolución: " . ($row['fecha_devolucion'] ?? "No devuelto") . "<br><br>";
    }

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}


?>