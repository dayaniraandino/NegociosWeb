<?php

  require_once("libs/template_engine.php");
  require_once("models/categorias.model.php");

  function run(){
    //htmlDatos, arreglo que contiene todas las substituciones
    // que se darán en la plantilla.
    $htmlDatos = array();
    $htmlDatos["categoryTitle"] = "";
    $htmlDatos["categoryMode"] = "";
    $htmlDatos["catcod"] = "";
    $htmlDatos["catdsc"]="";
    $htmlDatos["catest"]="";
    $htmlDatos["actSelected"]="selected";
    $htmlDatos["inaSelected"]="";
    $htmlDatos["disabled"]="";

    if(isset($_GET["acc"])){
      switch($_GET["acc"]){
        //Manejando si es un insert
        case "ins":
          $htmlDatos["categoryTitle"] = "Ingreso de Nueva Categoría";
          $htmlDatos["categoryMode"] = "ins";
          //se determina si es una acción del formulario
          if(isset($_POST["btnacc"])){
            $lastID = insertarCategoria($_POST);
            if($lastID){
              redirectWithMessage("¡Categoría Ingresada!","index.php?page=catemore&acc=upd&catcod=".$lastID);
            }else{
              //Se obtiene los datos que estaban en el post
              $htmlDatos["catcod"] = $_POST["catcod"];
              $htmlDatos["catdsc"]=$_POST["catdsc"];
              $htmlDatos["catest"]=$_POST["catest"];
              $htmlDatos["actSelected"]=($_POST["ctgest"] =="ACT")?"selected":"";
              $htmlDatos["inaSelected"]=($_POST["ctgest"] =="INA")?"selected":"";
            }
          }
          //si no es una acción del post se muestra los datos
          renderizar("catemore", $htmlDatos);
          break;
        //Manejando si es un Update
        case "upd":
          if(isset($_POST["btnacc"])){
            //implementar logica de guardado
            if(actualizarCategoria($_POST)){
              //forzando a que se actualice con los datos de la db
              redirectWithMessage("¡Categoría Actualizada!","index.php?page=catemore&acc=upd&catcod=".$_POST["catcod"]);
            }
          }
          if(isset($_GET["catcod"])){
            $categoria = obtenerCategoria($_GET["catcod"]);
            if($categoria){
              $htmlDatos["categoryTitle"] = "Actualizar".$categoria["catdsc"];
              $htmlDatos["categoryMode"] = "upd";
              $htmlDatos["catcod"] = $categoria["catcod"];
              $htmlDatos["catdsc"]=$categoria["catdsc"];
              $htmlDatos["catest"]=$categoria["catest"];
              $htmlDatos["actSelected"]=($categoria["catest"] =="ACT")?"selected":"";
              $htmlDatos["inaSelected"]=($categoria["catest"] =="INA")?"selected":"";
              renderizar("catemore", $htmlDatos);
            }else{
              redirectWithMessage("¡Categoría No Encontrada!","index.php?page=categorias");
            }
          }else{
            redirectWithMessage("¡Categoría No Encontrada! else","index.php?page=categorias");
          }
          break;
        //Manejando un delete
        case "dlt":
        if(isset($_POST["btnacc"])){
          //implementar logica de guardado
          if(borrarCategoria($_POST["catcod"])){
            //forzando a que se actualice con los datos de la db
            redirectWithMessage("¡Categoría Borrada!","index.php?page=categorias");
          }
        }
          if(isset($_GET["catcod"])){
            $categoria = obtenerCategoria($_GET["catcod"]);
            if($categoria){
              $htmlDatos["categoryTitle"] = "¿Desea borrar ".$categoria["catdsc"] . "?";
              $htmlDatos["categoryMode"] = "dlt";
              $htmlDatos["catcod"] = $categoria["catcod"];
              $htmlDatos["catdsc"]=$categoria["catdsc"];
              $htmlDatos["catest"]=$categoria["catest"];
              $htmlDatos["actSelected"]=($categoria["catest"] =="ACT")?"selected":"";
              $htmlDatos["inaSelected"]=($categoria["catest"] =="INA")?"selected":"";
              $htmlDatos["disabled"]='disabled="disabled"';
              renderizar("catemore", $htmlDatos);
            }else{
              redirectWithMessage("¡Categoría No Encontrada!","index.php?page=categorias");
            }
          }else{
            redirectWithMessage("¡Categoría No Encontrada!","index.php?page=categorias");
          }
          break;
        defualt:
          redirectWithMessage("¡Acción no permitida!","index.php?page=categorias");
          break;
      }
    }


  }

  run();
?>
