<?php
// llamamos nuestro menu
require("../lib/page.php");
// nombre del encabezado
Page::header("Eliminar usuario");
// obtenemos el ide del usuario en el que estamos logueados
if(!empty($_GET['id'])) 
{
    $id = $_GET['id'];
}
else
{
    // si eso no se cumple no podremos borrar nada
    header("location: index.php");
}
// verificamos que todo lo que el usuario escribio no tenga campos vacios
if(!empty($_POST))
{
    // tomamos el id del registro a eliminar
	$id = $_POST['id'];
	try 
	{
        // aqui validamos que no borremos el usuario en el que estamos
		if($id != $_SESSION['id_usuario'])
		{
            // si es un usuario diferente ejecutamos la consulta
			$sql = "DELETE FROM usuarios WHERE id_usuario = ?";
		    $params = array($id);
		    Database::executeRow($sql, $params);
            // luego de la ejecucion lo mandamos al index
            Page::showMessage(1, "Operación satisfactoria", "index.php");
		}
		else
		{
            // mensaje de error
			Page::showMessage(2, "No puedes eliminarte a ti mismo", "index.php");
		}
	} 
	catch (Exception $error) 
	{
        // esto es para errores mas complejos
		Page::showMessage(2, $error->getMessage(), "index.php");
	}
}
?>
<!-- Formulario para borrar el registro -->
<form method='post'>
	<div class='row center-align'>
		<input type='hidden' name='id' value='<?php print($id); ?>'/>
		<button type='submit' class='btn waves-effect blue'>Eliminar</button>
		<a href='index.php' class='btn waves-effect red'>Cancelar</a>
	</div>
</form>

<?php
Page::footer();
?>