<?php
require("../lib/page.php");
Page::header("Reservaciones");
// AQUI INICIA EL BUSCADOR
// El buscador recibe un valor ingresado por el usuario mediante el metodo POST
if(!empty($_POST))
{
	// recibimos el parametro y lo colocamos en la consulta
	// si hay resutados se mostraran
	$search = trim($_POST['buscar']);
	$sql = "SELECT * FROM reserva WHERE apellido LIKE ? OR nombre LIKE ? ORDER BY apellido";
	$params = array("%$search%", "%$search%");
}
else
{
	// si no hay resultado simplemente nos mostrara los registros con normlaidad
	$sql = "SELECT * FROM reserva ORDER BY apellido";
	$params = null;
}
// obtenemos los datos de la base
$data = Database::getRows($sql, $params);
if($data != null)
{
// si hay registros se mostraran de esta manera en una tabla normal
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
			<a href='save.php' class='btn waves-effect indigo'>Nuevo registro</a>
		</div>
	</div>
</form>
<table class='striped'>
	<thead>
		<tr>
			<th>APELLIDOS</th>
			<th>NOMBRES</th>
			<th>DUI</th>
			<th>CORREO</th>
			<th>EVENTO</th>
			<th>TELEFONO</th>
			<th>FECHA</th>
			<th>ACCIÓN</th>
		</tr>
	</thead>
	<tbody>

<?php
	foreach($data as $row)
	{
		print("
			<tr>
				<td>".$row['apellido']."</td>
				<td>".$row['nombre']."</td>
				<td>".$row['dui']."</td>
				<td>".$row['correo']."</td>
				<td>".$row['evento']."</td>
				<td>".$row['telefono']."</td>
				<td>".$row['fecha']."</td>
				<td>
					<a href='save.php?id=".$row['id_reserva']."' class='blue-text'><i class='material-icons'>edit</i></a>
					<a href='delete.php?id=".$row['id_reserva']."' class='red-text'><i class='material-icons'>delete</i></a>
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
	// si no hay registros veremos este mensaje y nos mandara a crear uno
	Page::showMessage(4, "No hay registros disponibles", "save.php");
}
Page::footer();
?>