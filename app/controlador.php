<?php
//Coneccion a la BD
require "modelo.php";

//insert
$id=55;
$name = "Jhonny Deep";
$res = $_DB->insert("insert into users (id,name) values(?,?)",
        [$id,$name]
);

// Busqueda de datos
$results = $_DB->select(
    "SELECT * FROM `users` WHERE `name` LIKE ?",
    ["%{$_POST["search"]}%"]
  );
  
  // Resultados
  echo json_encode(count($results)==0 ? null : $results);
?>