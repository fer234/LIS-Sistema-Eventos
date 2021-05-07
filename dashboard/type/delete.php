<?php
require("../lib/page.php");
Page::header("Eliminar Tipo de evento");

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
		$sql = "DELETE FROM tipo_eventos WHERE id_tipo = ?";
	    $params = array($id);
	    Database::executeRow($sql, $params);
	    header("location: index.php");
        Page::showMessage(1, "Operación satisfactoria", "index.php");
	} 
	catch (Exception $error) 
	{
		Page::showMessage(2, $error->getMessage(), "index.php");
	}
}
?>

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