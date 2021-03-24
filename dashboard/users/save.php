<?php
require("../lib/page.php");
// obtenemos el valor de la id del usuario
if(empty($_GET['id'])) 
{
    // si esta vacio es porque no hay registros, por lo tanto reseteo las variables
    // en pocas palabras, tendremos que hacer un insert
    Page::header("Agregar usuario");
    $id = null;
    $nombres = null;
    $apellidos = null;
    $correo = null;
    $alias = null;
}
else
{
    // si el id existe, entonces haremos un update, por lo tanto el formulario
    // tendra los datos que correspondan a esa id
    Page::header("Modificar usuario");
    $id = $_GET['id'];
    // con esto obtenemos los datos
    $sql = "SELECT * FROM usuarios WHERE id_usuario = ?";
    $params = array($id);
    // obtenemos los registros
    $data = Database::getRow($sql, $params);
    // les asignamos variables
    $nombres = $data['nombres'];
    $apellidos = $data['apellidos'];
    $correo = $data['correo'];
    $alias = $data['alias'];
}

// AHORA VAMOS A LA PARTE DE INGRESO DE DATOS
if(!empty($_POST))
{
    // si no hay campos vacion provenientes del metodo POST entonces intentaremos ejecutar la operacon
    $_POST = Validator::validateForm($_POST);
  	$nombres = $_POST['nombres'];
  	$apellidos = $_POST['apellidos'];
    $correo = $_POST['correo'];
    // manejamos los errores con try catch
    try 
    {
      	if($nombres != "" && $apellidos != "") // nombres y apellidos no deben ir vacios
        {
            if($correo != "") // el correo no debe ir vacio
            {
                if($id == null) // SI EL ID ES IGUAL A NULL significa que es un nuevo registro
                {
                    $alias = $_POST['alias']; // asignamos el alias a una variable
                    if($alias != "") // el alias no debe ir vacio
                    {
                        // le asignamos variables a las claves, pero solo guardaremos una
                        $clave1 = $_POST['clave1']; 
                        $clave2 = $_POST['clave2'];
                        if($clave1 != "" && $clave2 != "") // ninguna debe quedar vacio
                        {
                            if($clave1 == $clave2) // deben coincidir
                            {
                                // encriptamos la clave
                                $clave = password_hash($clave1, PASSWORD_DEFAULT);
                                // ejecutamos la consulta
                                $sql = "INSERT INTO usuarios(nombres, apellidos, correo, alias, clave) VALUES(?, ?, ?, ?, ?)";
                                $params = array($nombres, $apellidos, $correo, $alias, $clave);
                                Page::showMessage(1, "Operación satisfactoria", "index.php");
                            }
                            else
                            {
                                // mensaje de error
                                throw new Exception("Las contraseñas no coinciden");
                            }
                        }
                        else
                        {
                            // mensaje de error
                            throw new Exception("Debe ingresar ambas contraseñas");
                        }
                    }
                    else
                    {
                        // mensaje de error
                        throw new Exception("Debe ingresar un alias");
                    }
                }
                else
                {
                    // si el id ya existe, entonces sera un update
                    $sql = "UPDATE usuarios SET nombres = ?, apellidos = ?, correo = ? WHERE id_usuario = ?";
                    $params = array($nombres, $apellidos, $correo, $id);
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
          	<input id='nombres' type='text' name='nombres' class='validate' value='<?php print($nombres); ?>' required/>
          	<label for='nombres'>Nombres</label>
        </div>
        <div class='input-field col s12 m6'>
            <i class='material-icons prefix'>person</i>
            <input id='apellidos' type='text' name='apellidos' class='validate' value='<?php print($apellidos); ?>' required/>
            <label for='apellidos'>Apellidos</label>
        </div>
    </div>
    <div class='row'>
        <div class='input-field col s12 m6'>
            <i class='material-icons prefix'>email</i>
            <input id='correo' type='email' name='correo' class='validate' value='<?php print($correo); ?>' required/>
            <label for='correo'>Correo</label>
        </div>
        <div class='input-field col s12 m6'>
            <i class='material-icons prefix'>person_pin</i>
            <input id='alias' type='text' name='alias' class='validate' <?php print("value='$alias' "); print(($id == null)?"required":"disabled"); ?>/>
            <label for='alias'>Alias</label>
        </div>
    </div>
    <?php
    if($id == null)
    {
    ?>
    <div class='row'>
        <div class='input-field col s12 m6'>
            <i class='material-icons prefix'>security</i>
            <input id='clave1' type='password' name='clave1' class='validate' required/>
            <label for='clave1'>Contraseña</label>
        </div>
        <div class='input-field col s12 m6'>
            <i class='material-icons prefix'>security</i>
            <input id='clave2' type='password' name='clave2' class='validate' required/>
            <label for='clave2'>Confirmar contraseña</label>
        </div>
    </div>
    <?php
    }
    ?>
    <div class='row center-align'>
        <a href='index.php' class='btn waves-effect red'>Cancelar</a>
        <button type='submit' class='btn waves-effect blue'>Guardar</button>
    </div>
</form>

<?php
// necesitamos el footer
Page::footer();
?>