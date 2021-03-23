<?php
// necesitamos nuestro menu y demas funciones que estan en page.php
require("../lib/page.php");
Page::header("Editar perfil");
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
    $clave2 = $_POST['clave2']; // la clave de ser repetida por seguridad, solo se guarda la primera
    // manejo de errores mas complejos
    try 
    {
        // COMO ES UPDATE YA ABRAN DATOS EN LOS INPUTS
      	if($nombres != "" && $apellidos != "") // nombres y apellidos deben ser diferentes de vacio
        {
            if($correo != "") // el correo debe ser diferentes de vacio, proximamente tendra expresion regular
            {
                if($alias != "") // alias debe ser diferentes de vacio
                {
                    if($clave1 != "" || $clave2 != "")  // las claves deben ser diferentes de vacio
                    {
                        if($clave1 == $clave2) // comparamos para que el usuario este seguro de ese clave
                        {
                            $clave = password_hash($clave1, PASSWORD_DEFAULT); // la clave llega a la base encriptada
                            // consula para actualizar los datos, ? son parametros
                            $sql = "UPDATE usuarios SET nombres = ?, apellidos = ?, correo = ?, alias = ?, clave = ? WHERE id_usuario = ?";
                            // estamos modificando UNICAMENTE al usuario que inicio session, por lo tanto tomamos su id, con EL METODO SESSION
                            $params = array($nombres, $apellidos, $correo, $alias, $clave, $_SESSION['id_usuario']);
                        }
                        else
                        {
                            // error con las claves
                            throw new Exception("Las contraseñas no coinciden");
                        }
                    }
                    else
                    {
                        // esta consulta es cuando NO SE MODIFICA LA CLAVE
                        $sql = "UPDATE usuarios SET nombres = ?, apellidos = ?, correo = ?, alias = ? WHERE id_usuario = ?";
                        $params = array($nombres, $apellidos, $correo, $alias, $_SESSION['id_usuario']);
                    }
                    // ejecutamos la consulta sql y a su ves recibe los parametros
                    Database::executeRow($sql, $params);
                    // mensaje de satisfaccion
                    Page::showMessage(1, "Operación satisfactoria", "index.php");
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
        // esto sirve para controlar errores mas complejos o inesperados
        Page::showMessage(2, $error->getMessage(), null);
    }
}
else
{
    // SI NO SE TOCA NADA, TODO SE QUEDA COMO ESTABA DESDE UN INICIO
    $sql = "SELECT * FROM usuarios WHERE id_usuario = ?";
    $params = array($_SESSION['id_usuario']);
    $data = Database::getRow($sql, $params);
    $nombres = $data['nombres'];
    $apellidos = $data['apellidos'];
    $correo = $data['correo'];
    $alias = $data['alias'];
}
?>
<!-- Este el formulario para actualizar datos, ya tendra cargados los datos que esten registrados de ese uduario -->
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
    </div>
    <div class='row center-align'>
        <label>CAMBIAR CLAVE</label>
    </div>
    <div class='row'>
        <div class='input-field col s12 m6'>
            <i class='material-icons prefix'>security</i>
            <input id='clave1' type='password' name='clave1' class='validate'/>
            <label for='clave1'>Contraseña nueva</label>
        </div>
        <div class='input-field col s12 m6'>
            <i class='material-icons prefix'>security</i>
            <input id='clave2' type='password' name='clave2' class='validate'/>
            <label for='clave2'>Confirmar contraseña</label>
        </div>
    </div>
    <div class='row center-align'>
        <a href='../main/index.php' class='btn waves-effect grey'><i class='material-icons'>cancel</i></a>
        <button type='submit' class='btn waves-effect blue'><i class='material-icons'>save</i></button>
    </div>
</form>

<?php
// llamamos nustri pie de pagina
Page::footer();
?>