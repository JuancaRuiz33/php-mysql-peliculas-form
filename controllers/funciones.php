<?php
// Función para conectar a la base de datos
function conexion($host, $bd, $user, $password) {
    try {
        $db = new PDO("mysql:host=$host;dbname=$bd;charset=utf8", $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    } catch (PDOException $error) {
        echo '<h2 style="color:red;">Ufff ha ocurrido un error: ' . $error->getMessage() . '</h2>';
        return null;
    }
}

// Función para guardar los datos de una película
function guardarPelicula($bd, $tabla, $datos) {
    try {
        // Extraer los datos del array
        $titulo = $datos['titulo'];
        $premios = $datos['premios'];
        $fechaCreacion = $datos['fechaCreacion'];
        $duracion = $datos['duracion'];
        $genero = $datos['genero'];

        // 1.- Armar la consulta
        $sql = "INSERT INTO $tabla (titulo, premios, fechaCreacion, duracion, genero)
                VALUES (:titulo, :premios, :fechaCreacion, :duracion, :genero)";

        // 2.- Preparar la consulta
        $query = $bd->prepare($sql);
        $query->bindValue(':titulo', $titulo);
        $query->bindValue(':premios', $premios);
        $query->bindValue(':fechaCreacion', $fechaCreacion);
        $query->bindValue(':duracion', $duracion);
        $query->bindValue(':genero', $genero);

        
        $query->execute();

        // Si se guarda correctamente, devuelve "OK"
        return "OK";
    } catch (PDOException $e) {
        // Si ocurre un error, devuelve el mensaje
        return "Error al guardar: " . $e->getMessage();
    }
}
?>