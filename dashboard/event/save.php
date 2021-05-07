<?php
require("../lib/page.php");
if(empty($_GET['id'])) 
{
    Page::header("Agregar evento");
    $id = null;
    $nombre = null;
    $precio = null;
    $imagen = null;
    $estado = 1;
    $categoria = null;
}
else
{
    Page::header("Modificar evento");
    $id = $_GET['id'];
    $sql = "SELECT * FROM evento WHERE id_evento = ?";
    $params = array($id);
    $data = Database::getRow($sql, $params);
    $nombre = $data['nombre_evento'];
    $precio = $data['precio_evento'];
    $imagen = $data['imagen'];
    $estado = $data['estado'];
    $categoria = $data['id_tipo'];
}

if(!empty($_POST))
{
    $_POST = Validator::validateForm($_POST);
  	$nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $archivo = $_FILES['imagen'];
    $estado = $_POST['estado'];
    $categoria = $_POST['categoria'];

    try 
    {
        if($nombre != "")
        {
            if($precio != "")
            {
                if($precio > 0)
                {
                        if($categoria != "")
                        {
                            if($archivo['name'] != null)
                            {
                                $base64 = Validator::validateImage($archivo);
                                if($base64 != false)
                                {
                                    $imagen = $base64;
                                }
                                else
                                {
                                    throw new Exception("Ocurrió un problema con la imagen");
                                }
                            }
                            else
                            {
                                if($imagen == null)
                                {
                                    throw new Exception("Debe seleccionar una imagen");
                                }
                            }
                            if($id == null)
                            {
                                $sql = "INSERT INTO evento(nombre_evento, precio_evento, imagen, estado, id_tipo) VALUES(?, ?, ?, ?, ?)";
                                $params = array($nombre, $precio, $imagen, $estado, $categoria);
                            }
                            else
                            {
                                $sql = "UPDATE evento SET nombre_evento = ?, precio_evento = ?, imagen = ?, estado = ?, id_tipo = ? WHERE id_evento = ?";
                                $params = array($nombre, $precio, $imagen, $estado, $categoria, $id);
                            }
                            Database::executeRow($sql, $params);
                            Page::showMessage(1, "Operación satisfactoria", "index.php");
                        }
                        else
                        {
                            throw new Exception("Debe seleccionar una categoría");
                        }
                }
                else
                {
                    throw new Exception("El precio debe ser mayor que 0.00");
                }
            }
            else
            {
                throw new Exception("Debe ingresar el precio");
            }
        }
        else
        {
            throw new Exception("Debe digitar el nombre");
        }
    }
    catch (Exception $error)
    {
        Page::showMessage(2, $error->getMessage(), null);
    }
}
?>

<form method='post' enctype='multipart/form-data'>
    <div class='row'>
        <div class='input-field col s12 m6'>
          	<i class='material-icons prefix'>note_add</i>
          	<input id='nombre' type='text' name='nombre' class='validate' value='<?php print($nombre); ?>' required/>
          	<label for='nombre'>Nombre</label>
        </div>
        <div class='input-field col s12 m6'>
          	<i class='material-icons prefix'>shopping_cart</i>
          	<input id='precio' type='number' name='precio' class='validate' max='999.99' min='0.01' step='any' value='<?php print($precio); ?>' required/>
          	<label for='precio'>Precio ($)</label>
        </div>
        <div class='input-field col s12 m6'>
            <?php
            $sql = "SELECT id_tipo, nombre_tipo FROM tipo_eventos";
            Page::setCombo("Categoría", "categoria", $categoria, $sql);
            ?>
        </div>
      	<div class='file-field input-field col s12 m6'>
            <div class='btn waves-effect'>
                <span><i class='material-icons'>image</i></span>
                <input type='file' name='imagen' <?php print(($imagen == null)?"required":""); ?>/>
            </div>
            <div class='file-path-wrapper'>
                <input class='file-path validate' type='text' placeholder='Seleccione una imagen'/>
            </div>
        </div>
        <div class='input-field col s12 m6'>
            <span>Estado:</span>
            <input id='activo' type='radio' name='estado' class='with-gap' value='1' <?php print(($estado == 1)?"checked":""); ?>/>
            <label for='activo'><i class='material-icons left'>visibility</i></label>
            <input id='inactivo' type='radio' name='estado' class='with-gap' value='0' <?php print(($estado == 0)?"checked":""); ?>/>
            <label for='inactivo'><i class='material-icons left'>visibility_off</i></label>
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