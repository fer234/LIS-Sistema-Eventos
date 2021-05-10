<?php
require("../lib/page.php");
// obtenemos el valor de la id del usuario
if(empty($_GET['id'])) 
{
    // si esta vacio es porque no hay registros, por lo tanto reseteo las variables
    // en pocas palabras, tendremos que hacer un insert
    Page::header("Agregar Reserva");
    $id = null;
    $nombre = null;
    $apellido = null;
    $dui = null;
    $correo = null;
    $evento = null;
    $telefono = null;
    $fecha = null;

}
else
{
    // si el id existe, entonces haremos un update, por lo tanto el formulario
    // tendra los datos que correspondan a esa id
    Page::header("Modificar reserva");
    $id = $_GET['id'];
    // con esto obtenemos los datos
    $sql = "SELECT * FROM re WHERE id = ?";
    $params = array($id);
    // obtenemos los registros
    $data = Database::getRow($sql, $params);
    // les asignamos variables
    $nombre = $data['nombre'];
    $apellido = $data['apellido'];
    $dui = $data['dui'];
    $correo = $data['correo'];
    $evento = $data['evento'];
    $telefono = $data['telefono'];
    $fecha = $data['fecha'];
}

// AHORA VAMOS A LA PARTE DE INGRESO DE DATOS
if(!empty($_POST))
{
    // si no hay campos vacion provenientes del metodo POST entonces intentaremos ejecutar la operacon
    $_POST = Validator::validateForm($_POST);
  	$nombre = $_POST['nombre'];
  	$apellido = $_POST['apellido'];
    $dui = $_POST['dui'];
    $correo = $_POST['correo'];
    $evento = $_POST['evento'];
    $telefono = $_POST['telefono'];
    $fecha = $_POST['fecha'];
    // manejamos los errores con try catch
    try 
    {
      	if($nombre != "" && $apellido != "") // nombres y apellidos no deben ir vacios
        {
            if($correo != "") // el correo no debe ir vacio
            {
                if($id == null) // SI EL ID ES IGUAL A NULL significa que es un nuevo registro
                {
                    if($dui != "") // el alias no debe ir vacio
                    {
                        if($fecha !="")
                        {
                            if($telefono !="")
                            {
                                if($evento !="")
                                {
                                    // ejecutamos la consulta
                                    $sql = "INSERT INTO re(nombre, apellido, dui, correo, evento, telefono, fecha) VALUES(?, ?, ?, ?, ?, ?, ?)";
                                    $params = array($nombre, $apellido, $dui, $correo, $evento, $telefono, $fecha);
                                    Page::showMessage(1, "Operación satisfactoria", "index.php");
                                }
                                else
                                {
                                    // mensaje de error
                                    throw new Exception("Debe ingresar un evneto a reservar");
                                }
                            }
                            else
                            {
                                // mensaje de error
                                throw new Exception("Debe ingresar una fecha");
                            }
                        }
                        else
                        {
                            // mensaje de error
                            throw new Exception("Debe ingresar un telefono");
                        }
                    }
                    else
                    {
                        // mensaje de error
                        throw new Exception("Debe ingresar tu DUI");
                    }
                }
                else
                {
                    // si el id ya existe, entonces sera un update
                    $sql = "UPDATE re SET nombre = ?, apellido = ?, dui = ?, correo = ?, evento = ?, telefono = ?, fecha = ? WHERE id = ?";
                    $params = array($nombre, $apellido, $dui, $correo, $evento, $telefono, $fecha, $id);
                }
                //ejecutamos la consulta aql
                Database::executeRow($sql, $params);
                // mandamos al usuario donde estan todos los registros
                Page::showMessage(1, "Operación satisfactoria", "index.php");
            }
            else
            {
                // mensaje de error
                throw new Exception("Debe ingresar un correo electrónico");
            }
        }
        else
        {
            // mensaje de error
            throw new Exception("Debe ingresar el nombre completo");
        }
    }
    catch (Exception $error)
    {
        // mensaje de error, pero seran personalisados aunque sean mas complejos
        Page::showMessage(2, $error->getMessage(), null);
    }
}
?>
<!-- Este el formulario donde se ingresan los datos -->
<!-- Si ya hay registros entonces los imprimimos en el campo que corresponde -->
<form method='post'>
    <div class='row'>
        <div class='input-field col s12 m6'>
          	<i class='material-icons prefix'>person</i>
          	<input id='nombres' type='text' name='nombre' class='validate' value='<?php print($nombre); ?>' required/>
          	<label for='nombres'>Nombres</label>
        </div>
        <div class='input-field col s12 m6'>
            <i class='material-icons prefix'>person</i>
            <input id='apellidos' type='text' name='apellido' class='validate' value='<?php print($apellido); ?>' required/>
            <label for='apellidos'>Apellidos</label>
        </div>
    </div>
    <div class='row'>
        <div class='input-field col s12 m6'>
            <i class='material-icons prefix'>beenhere</i>
            <input id='dui' type='text' name='dui' class='validate' value='<?php print($dui); ?>' required/>
            <label for='dui'>Documento de identidad</label>
        </div>
        <div class='input-field col s12 m6'>
            <i class='material-icons prefix'>email</i>
            <input id='correo' type='email' name='correo' class='validate' value='<?php print($correo); ?>' required/>
            <label for='correo'>Correo</label>
        </div>
    </div>
    <div class='row'>
        <div class='input-field col s12 m13'>
        <select name="evento">
        <optgroup label="BODA">
            <option value="Boda Normal">Boda Normal</option>
            <option value="Boda Beach">Boda Beach</option>
            <option value="Boda Deluxe">Boda Deluxe</option>
        </optgroup>
        <optgroup label="XV AÑOS">
            <option value="XV Normal">XV Normal</option>
            <option value="XV Deluxe">XV Deluxe</option>
            <option value="My XV">My XV</option>
        </optgroup>
        <optgroup label="GRADUACIÓN">
            <option value="Graduacion Normal">Graduacion Normal</option>
            <option value="Graduacion Deluxe">Graduacion Deluxe</option>
            <option value="Last party">Last party</option>
        </optgroup>
        </select>
        <label>Selecciona tu evento</label>
        </div>
    </div>
    <div class='row'>
        <div class='input-field col s12 m6'>
            <i class='material-icons prefix'>call</i>
            <input id='telefono' type='number' name='telefono' class='validate' value='<?php print($telefono); ?>' required/>
            <label for='telefono'>Telefono</label>
        </div>
        <div class='input-field col s12 m6'>
            <i class='material-icons prefix'>date_range</i>
            <input id='fecha' type='date' name='fecha' class='validate' value='<?php print($fecha); ?>' required/>
            <label for='fecha'>Fecha</label>
        </div>
    </div>
    <div class='row center-align'>
        <a href='index.php' class='btn waves-effect red'>Cancelar</a>
        <button type='submit' class='btn waves-effect blue'>Guardar</button>
    </div>
</form>

<?php
// necesitamos el footer
Page::footer();
?>