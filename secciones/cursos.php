<?php
include_once '../configuraciones/bd.php';


$id = isset($_POST['íd']) ? $_POST['íd'] : '';
$nombre_curso = isset($_POST['nombre_curso']) ? $_POST['nombre_curso'] : '';
$accion = isset($_POST['accion']) ? $_POST['accion'] : '';

if ($accion != '') {
    switch ($accion) {
        case 'agregar':
            $sql = "INSERT INTO cursos(id,nombre_curso) VALUES(NULL,'$nombre_curso')";
            $consulta = $conexion->prepare($sql);
            $consulta->bindParam(':nombre_curso', $nombre_curso);
            $consulta->execute();
            break;
        case 'editar':
            $sql = "UPDATE cursos SET nombre_curso=$nombre_curso";
            break;
        case 'eliminar':
            $sql = "DELETE FROM cursos WHERE id=$id";
            break;

    }

}
$conexion = BD::crearInstancia();
$consulta = $conexion->prepare("SELECT * FROM cursos");
$consulta->execute();
$listacursos = $consulta->fetchAll();