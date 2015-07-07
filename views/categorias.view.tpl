<h2> Trabajo con Categorias</h2>
<a href="index.php?page=catemore&acc=ins">Nueva Categoria</a>
<table>
  <tr>
    <th>Codigo</th>
    <th>/</th>
    <th>Categoria</th>
    <th> / </th>
    <th>Estado</th>
    <th> / </th>
    <th>Acciones</th>
  </tr>
  {{foreach categorias}}
  <tr>
    <td>{{catcod}}</td>
    <th>  </th>
    <td>{{catdsc}}</td>
    <th>  </th>
    <td>{{catest}}</td>
    <th> </th>
    <td>
      <a href="index.php?page=catemore&acc=upd&catecod={{catecod}}">Actualizar</a>
      <a href="index.php?page=catemore&acc=dlt&catecod={{catecod}}">Eliminar</a>
    </td>
  </tr>
  {{endfor categorias}}

</table>
