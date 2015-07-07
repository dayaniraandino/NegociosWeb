<?php
require_once("libs/dao.php");

function obtenerProductos(){
  $productos= array();
  $selectQuery="SELECT * FROM productos";
  $productos= obtenerRegistros($selectQuery);
  return $productos;
}
?>
