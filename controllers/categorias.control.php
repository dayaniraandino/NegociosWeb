<?php
/* categorias Controller
 * 2015- 07-02
 * Created By OJBA
 * Last Modification
 */
  require_once("libs/template_engine.php");
  require_once("models/categorias.model.php");

  function run(){
    $categorias = array();
    $categorias = obtenerCategorias();

    renderizar("categorias",array("categorias"=> $categorias));
  }
  run();
?>
