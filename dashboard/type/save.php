<?php
require("../lib/page.php");
if(empty($_GET['id'])) 
{
    Page::header("Agregar Tipo de evento");
    $id = null;
    $nombre = null;
    $descripcion = null;
}
else
{
    Page::header("Modificar Tipo de evento");
    $id = $_GET['id'];
    $sql = "SELECT * FROM tipo_eventos WHERE id_tipo = ?";
    $params = array($id);
    $data = Database::getRow($sql, $params);
    $nombre = $data['nombre_tipo'];
    $descripcion = $data['descripcion'];
}

if(!empty($_POST))
{
    $_POST = Validator::validateForm($_POST);
  	$nombre = $_POST['nombre'];
  	$descripcion = $_POST['descripcion'];
    if($descripcion == "")
    {
        $descripcion = null;
    }

    try 
    {
      	if($nombre != "")
        {
            if($id == null)
            {
                $sql = "INSERT INTO tipo_eventos(nombre_tipo, descripcion) VALUES(?, ?)";
                $params = array($nombre, $descripcion);
            }
            else
            {
                $sql = "UPDATE tipo_eventos SET nombre_tipo = ?, descripcion = ? WHERE id_tipo = ?";
                $params = array($nombre, $descripcion, $id);
            }
            Database::executeRow($sql, $params);
            Page::showMessage(1, "Operación satisfactoria", "index.php");
        }
        else
        {
            throw new Exception("Debe digitar un nombre");
        }
    }
    catch (Exception $error)
    {
        Page::showMessage(2, $error->getMessage(), null);
    }
}
?>

<form method='post' autocomplete='off'>
    <div class='row'>
        <div class='input-field col s12 m6'>
            <i class='material-icons prefix'>note_add</i>
            <input id='nombre' type='text' name='nombre' class='validate' value='<?php print($nombre); ?>' required/>
            <label for='nombre'>Nombre</label>
        </div>
        <div class='input-field col s12 m6'>
            <i class='material-icons prefix'>description</i>
            <input id='descripcion' type='text' name='descripcion' class='validate' value='<?php print($descripcion); ?>'/>
            <label for='descripcion'>Descripción</label>
        </div>
    </div>
    <div class='row center-align'>
        <a href='index.php' class='btn waves-effect red'>Cancelar</a>
        <button type='submit' class='btn waves-effect blue'>Guardar</button>
    </div>
</form>

<?php
Page::footer();
?>