<?php
require("../lib/page.php");
Page::header("Eventos");

if(!empty($_POST))
{
	$search = trim($_POST['buscar']);
	$sql = "SELECT * FROM evento, tipo_eventos WHERE evento.id_tipo = tipo_eventos.id_tipo AND nombre_evento LIKE ? ORDER BY nombre_evento";
	$params = array("%$search%");
}
else
{
	$sql = "SELECT * FROM evento, tipo_eventos WHERE evento.id_tipo = tipo_eventos.id_tipo ORDER BY nombre_evento";
	$params = null;
}
$data = Database::getRows($sql, $params);
if($data != null)
{
?>

<form method='post'>
	<div class='row'>
		<div class='input-field col s6 m4'>
			<i class='material-icons prefix'>search</i>
			<input id='buscar' type='text' name='buscar'/>
			<label for='buscar'>Buscar</label>
		</div>
		<div class='input-field col s6 m4'>
			<button type='submit' class='btn waves-effect green'><i class='material-icons'>check_circle</i></button> 	
		</div>
		<div class='input-field col s12 m4'>
			<a href='save.php' class='btn waves-effect btn-small indigo'><i class='material-icons'>add_box</i></a>
			<a href='reportesEventos.php' class='btn waves-effect btn-small red'><i class='material-icons'>print</i></a>
		</div>
	</div>
</form>
<table class='striped'>
	<thead>
		<tr>
			<th>IMAGEN</th>
			<th>NOMBRE</th>
			<th>PRECIO ($)</th>
			<th>TIPO EVENTO</th>
			<th>ESTADO</th>
			<th>ACCIÓN</th>
		</tr>
	</thead>
	<tbody>

<?php
	foreach($data as $row)
	{
		print("
			<tr>
				<td><img src='data:image/*;base64,".$row['imagen']."' class='materialboxed' width='100' height='100'></td>
				<td>".$row['nombre_evento']."</td>
				<td>".$row['precio_evento']."</td>
				<td>".$row['nombre_tipo']."</td>
				<td>
		");
		if($row['estado'] == 1)
		{
			print("<i class='material-icons'>visibility</i>");
		}
		else
		{
			print("<i class='material-icons'>visibility_off</i>");
		}
		print("
				</td>
				<td>
					<a href='save.php?id=".$row['id_evento']."' class='blue-text'><i class='material-icons'>mode_edit</i></a>
					<a href='delete.php?id=".$row['id_evento']."' class='red-text'><i class='material-icons'>delete</i></a>
				</td>
			</tr>
		");
	}
	print("
		</tbody>
	</table>
	");
} //Fin de if que comprueba la existencia de registros.
else
{
	Page::showMessage(4, "No hay registros disponibles", "save.php");
}

Page::footer();
?>