<?php
/* productos Controller
 * 2015- 07-02
 * Created By OJBA
 * Last Modification
 */
  require_once("libs/template_engine.php");
  require_once("models/productos.model.php");

  function run(){
    $productos = array();
    $productos = obtenerProductos();
  
    renderizar("productos",array("productos"=> $productos));
  }
  run();
?>
