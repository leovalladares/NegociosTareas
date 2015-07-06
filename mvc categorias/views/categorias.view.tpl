<h2>Listado de Categorias</h2>
<a href>Agregar Categoría</a>
<table style="margin:2em; width:90%">
    <tr>
        <th>
            Cod.
        </th>
        <th>
            Categoría
        </th>
        <th>
            Estado
        </th>
        <th>

        </th>
    </tr>
    {{foreach categorias}}
    <tr>
        <td>
            {{catcod}}
        </td>
        <td>
            <a href>{{catdsc}}</a>
        </td>
        <td>
            {{catest}}
        </td>
        <td>
            <a href="index.php?page=categoria&mode=UPD&catcod={{catcod}}">Actualizar</a> |
            <a href>Eliminar</a>
        </td>
    </tr>
    {{endfor categorias}}
</table>
