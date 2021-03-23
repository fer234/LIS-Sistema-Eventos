<?php
// necesitamos nuestro menu y demas funciones que estan en page.php
require("../lib/page.php");
Page::header("Registrar primer usuario");
// si en esta consulta  a la tabla usuarios existen datos, no iremos al login
$sql = "SELECT * FROM usuarios";
$data = Database::getRows($sql, null);
if($data != null)
{
    header("location: login.php");
}

// si todo lo que recibimos de los formularios en el metodo POST, entonces podemos ingresar datos
if(!empty($_POST))
{
    $_POST = Validator::validateForm($_POST); // revisamos que ingresa el usuario detalladamente
    // asignamos variables, esto valores los ingresa el usuario
  	$nombres = $_POST['nombres']; 
  	$apellidos = $_POST['apellidos'];
    $correo = $_POST['correo'];
    $alias = $_POST['alias'];
    $clave1 = $_POST['clave1'];
    $clave2 = $_POST['clave2']; // se repiten las claves pero no se agrega a la base, solo se comparan 
    // para ver si son iguales

    try // manejo de errores mas complejos
    {
      	if($nombres != "" && $apellidos != "") // nombres y apellidos deben ser diferentes de vacio
        {
            if($correo != "") // el correo debe ser diferentes de vacio, proximamente tendra expresion regular
            {
                if($alias != "") // alias debe ser diferentes de vacio
                {
                    if($clave1 != "" && $clave2 != "") // las claves deben ser diferentes de vacio
                    {
                        if($clave1 == $clave2) // comparamos para que el usuario este seguro de ese clave
                        {
                            $clave = password_hash($clave1, PASSWORD_DEFAULT); // la clave llega a la base encriptada
                            // consula para insertar datos ? son parametros
                            $sql = "INSERT INTO usuarios(nombres, apellidos, correo, alias, clave) VALUES(?, ?, ?, ?, ?)";
                            $params = array($nombres, $apellidos, $correo, $alias, $clave); // los datos son lo que instroduce el usuario
                            // ejecutamos la consulta sql y a su ves recibe los parametros
                            Database::executeRow($sql, $params);
                            // si todo sale bien, nos mandara al login y nos saldra el mensaje
                            Page::showMessage(1, "Operación satisfactoria", "login.php");
                        }
                        else
                        {
                            throw new Exception("Las contraseñas no coinciden"); // mensaje de error
                        }
                    }
                    else
                    {
                        throw new Exception("Debe ingresar ambas contraseñas"); // mensaje de error
                    }
                }
                else
                {
                    throw new Exception("Debe ingresar un alias"); // mensaje de error
                }
            }
            else
            {
                throw new Exception("Debe ingresar un correo electrónico"); // mensaje de error
            }
        }
        else
        {
            throw new Exception("Debe ingresar el nombre completo"); // mensaje de error
        }
    }
    catch (Exception $error)
    {
        Page::showMessage(2, $error->getMessage(), null); // esto sirve para controlar errores mas complejos
        // y errores inesperados
    }
}
else
{
    // si no se ingresa algun dato las variables se limpian
    $nombres = null;
    $apellidos = null;
    $correo = null;
    $alias = null;
}
?>
<!-- Este el formulario para ingresar los datos del nuevo usuario -->
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
        <div class='input-field col s12 m6'>
            <i class='material-icons prefix'>email</i>
            <input id='correo' type='email' name='correo' class='validate' value='<?php print($correo); ?>' required/>
            <label for='correo'>Correo</label>
        </div>
        <div class='input-field col s12 m6'>
            <i class='material-icons prefix'>person_pin</i>
            <input id='alias' type='text' name='alias' class='validate' value='<?php print($alias); ?>' required/>
            <label for='alias'>Alias</label>
        </div>
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
    <div class='row center-align'>
 	    <button type='submit' class='btn waves-effect'><i class='material-icons'>send</i></button>
    </div>
</form>

<?php
// llamamos nuestro pie de pagina
Page::footer();
?>