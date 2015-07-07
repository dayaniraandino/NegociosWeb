
<h2>{{categoryTitle}}</h2>
<a href="index.php?page=categorias">Listado de Categorías</a>
<form action="index.php?page=catemore&acc={{categoryMode}}" method="post">
  <table>
    <label class="col4" for="catcod">Código</label>
    <input class="col8" type="text" disabled="disabled" id="catcod" name="catcod" value="{{catcod}}"/>
    <input type="hidden" id="catcod" name="catcod" value="{{catcod}}"/>
  </table>
  <table>
    <label class="col4" for="catdsc">Categoría</label>
    <input class="col8" type="text" id="catdsc" name="catdsc" value="{{catdsc}}" {{disabled}}/>
  </table>
  <table>
    <label class="col4" for="catest">Estado</label>
    <select class="col8" id="catest" name="catest" {{disabled}}>
      <option value="ACT" {{actSelected}}>Activo</option>
      <option value="INA" {{inaSelected}}>Inactivo</option>
    </select>
  </table>
  <table class="right col12">
    <input type="hidden" id="btnacc" name="btnacc" value="{{categoryMode}}"/>
    <input type="button" name="btnGuardar" value="Confirmar" onclick="document.forms[0].submit();"/>
  </table>
</form>
