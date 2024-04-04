<?php

//pdo help https://phpdelusions.net/pdo_examples

include "db/db.php";

if ($_GET['type'] == 'create') {
    $sql = "INSERT INTO alumnos (nombres, apellidos, dni) VALUES (?,?,?)";
    $stmt= $pdo->prepare($sql);
    $stmt->execute([$_POST['nombres'], $_POST['apellidos'], $_POST['dni']]);
    echo json_encode([ "msj" => "Se ha guardado exitosamente."]);
}

if ($_GET['type'] == 'update') {
    $sql = "UPDATE alumnos SET nombres=?, apellidos=?, dni=? WHERE id=?";
    $stmt= $pdo->prepare($sql);
    $stmt->execute([$_POST['nombres'], $_POST['apellidos'], $_POST['dni'], $_POST['id']]);
    echo json_encode([ "msj" => "Se ha atualizado exitosamente.", "data" => $_POST]);
}

if ($_GET['type'] == 'read') {
    $sql = "SELECT  * FROM alumnos";
    $stmt= $pdo->query($sql);
    $alumnos = $stmt->fetchAll();
    echo json_encode([ "msj" => "Listando alumnos.", "data" => $alumnos]);
}

if ($_GET['type'] == 'delete') {
    $pdo->prepare("DELETE FROM alumnos WHERE id=?")
        ->execute([$_POST['id']]);
    echo json_encode([ "msj" => "Eliminado alumno.", "data" => $_POST]);
}
