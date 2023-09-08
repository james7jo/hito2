<?php
require "modelo1.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['action']) && $_POST['action'] === 'delete') {
      // Obtener el ID del registro a eliminar
      $id = isset($_POST['id']) ? $_POST['id'] : null;

      if ($id !== null) {
          // Intentar eliminar el registro de la base de datos
          $success = $_DB->delete("users", "`id` = ?", [$id]);
          
          if ($success) {
              echo json_encode(['success' => true]);
              exit();
          } else {
              echo json_encode(['success' => false]);
              exit();
          }
      }
        elseif ($_POST['action'] === 'update') {
          // Actualizar el nombre de un registro
          $id = $_POST['id'];
          $name = $_POST['name'];
          $_DB->update("UPDATE `users` SET `name` = ? WHERE `id` = ?", [$name, $id]);
          echo json_encode(['success' => true]);
          exit();
      }
    }
}

$results = $_DB->select(
    "SELECT * FROM `users` WHERE `name` LIKE ?",
    ["%{$_POST["search"]}%"]
);

// Resultados
echo json_encode(count($results) == 0 ? null : $results);
/*
//Coneccion a la BD
require "modelo1.php";

//insert
/*$id=57;
$name = "Jhonny stily";
$res = $_DB->insert("insert into users (id,name) values(?,?)",
        [$id,$name]
);
$is = 56;
$name ="Luis Cacha";
$res1=$_DB->insert("insert into users(id,name)values(?,?)",[$id,$name]);*/
//Busqueda de datos
/*if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['action'])) {
      if ($_POST['action'] === 'add') {
          // Agregar un nuevo registro
          $newName = $_POST['newName'];
          $_DB->insert("INSERT INTO `users` (`name`) VALUES (?)", [$newName]);
          echo json_encode(['success' => true]);
      } elseif ($_POST['action'] === 'modify') {
          // Modificar un registro existente
          $id = $_POST['idToModify'];
          $newName = $_POST['newName'];
          $_DB->update("UPDATE `users` SET `name` = ? WHERE `id` = ?", [$newName, $id]);
          echo json_encode(['success' => true]);
      } elseif ($_POST['action'] === 'delete') {
          // Eliminar un registro
          $id = $_POST['idToDelete'];
          $_DB->delete("users", "`id` = ?", [$id]);
          echo json_encode(['success' => true]);
      } else {
          echo json_encode(['success' => false, 'message' => 'Acción no válida']);
      }
  } else {
      echo json_encode(['success' => false, 'message' => 'Acción no especificada']);
  }
//} else {
  $results = $_DB->select(
    "SELECT * FROM `users` WHERE `name` LIKE ?",
    ["%{$_POST["search"]}%"]
  );
  // Resultados
  echo json_encode(count($results)==0 ? null : $results);*/
?>