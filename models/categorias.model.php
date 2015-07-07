<?php
require_once("libs/dao.php");

function obtenerCategorias(){
  $categorias= array();
  $selectQuery="SELECT * FROM categorias";
  $categorias= obtenerRegistros($selectQuery);
  return $categorias;
}

function obtenerCategoria($categoriaCodigo){
  $categoria = array();
  $sqlstr = "select * from categorias where catcod = %d;";
  $sqlstr = sprintf($sqlstr, $categoriaCodigo);
  $categoria = obtenerUnRegistro($sqlstr);
  return $categoria;
}

function insertarCategoria($categoria){
  if($categoria && is_array($categoria)){
     $sqlInsertar = "INSERT INTO categorias(`catdsc`,`catest`)VALUES('%s','%s');";
    $sqlInsertar = sprintf($sqlInsertar,
                        valstr($categoria["catdsc"]),
                        valstr($categoria["catest"])
                      );
         if(ejecutarNonQuery($sqlInsertar)){
           return getLastInserId();
         }
      }
      return false;
    }

function actualizarCategoria($categoria){
  if($categoria && is_array($categoria)){
    $sqlActualizar = "UPDATE categorias set catdsc='%s', catest='%s' where catcod=%d;";
    $sqlActualizar = sprintf($sqlActualizar,
                      valstr($categoria["catdsc"]),
                      valstr($categoria["catest"]),
                      valstr($categoria["catcod"])
                    );
        return ejecutarNonQuery($sqlActualizar);
      }
      return false;
    }

    function borrarCategoria($categoriaID){
      if($categoriaID){
        $sqlBorrar = "DELETE from categorias where catcod=%d;";
        $sqlBorrar = sprintf($sqlBorrar,
                      valstr($categoriaID)
                    );
        return ejecutarNonQuery($sqlBorrar);
      }
      return false;
    }
?>
