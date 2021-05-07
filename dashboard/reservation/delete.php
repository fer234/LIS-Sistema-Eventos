<?php
require("../lib/page.php");
Page::header("Eliminar reserva");

if(!empty($_GET['id'])) 
{
    $id = $_GET['id'];
}
else
{
    header("location: index.php");
}

if(!empty($_POST))
{
	$id = $_POST['id'];
	try 
	{
		$sql = "DELETE FROM reserva WHERE id_reserva = ?";
	    $params = array($id);
	    Database::executeRow($sql, $params);
	    Page::showMessage(1, "Operación satisfactoria", "index.php");
	}
	catch (Exception $error) 
	{
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