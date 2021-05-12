<?php
// mandamos a llamar el menu y ponemos un encabezado
require("../lib/page.php");
Page::header("Grand Event");
// Verificamos que existan usuarips de lo contrario nos enviara al login
$sql = "SELECT * FROM usuarios"; // consulta para verificar los registros
$data = Database::getRows($sql, null); // obtenemos todos los registros ingresados
if($data == null) // si no hay registros 
{
    header("location: register.php"); // nos manda al login
}

// no podemos permitir valores vacios que vengan de los formularios
if(!empty($_POST))
{
	$_POST = validator::validateForm($_POST); // gracias a validateForm podemos ver cada dato recibido con
	// un foreach
	// CREAMOS LAS VARIABLES DE ALIAS Y CLAVE 
	// esto lo ingresa el usuario
  	$alias = $_POST['alias'];
  	$clave = $_POST['clave'];
  	try // para facilitar el manejo de errores usamos un try catch
    {
      	if($alias != "" && $clave != "") // los valores deben ser diferentes de vacio
  		{
			// esta consulta llama toda la info del usuario con el alias que ingresamos
			// por eso ? sirve como parametro
  			$sql = "SELECT * FROM usuarios WHERE alias = ?";
		    $params = array($alias);
		    $data = Database::getRow($sql, $params); // aqui obtenemos la info de ese usuario en especifico
		    if($data != null) // si esta lleno entonces podemos seguir con la clave
		    {
		    	$hash = $data['clave']; // con hash protegemos nuestra clave
		    	if(password_verify($clave, $hash)) // verificamos nuestra clave, pero siempre siendo protegida
		    	{
					// si es correcta lo dejeamos pasar al dashboard y tomamos una sesion
			    	$_SESSION['id_usuario'] = $data['id_usuario'];
			      	$_SESSION['nombre_usuario'] = $data['nombres']." ".$data['apellidos'];
					if(!empty($_POST["remember"])){
						setcookie ("member_login",$alias,time()+ (10 * 365 * 24 * 60 * 60));  
						setcookie ("member_password",$clave,time()+ (10 * 365 * 24 * 60 * 60));
					}
					else{
						if(isset($_COOKIE["member_login"])){
							setcookie ("member_login",""); 
						}
						if(isset($_COOKIE["member_password"])){
							setcookie ("member_password",""); 
						}
					}
			      	header("location: index.php");
				}
				else // si la clave es incorecta nos aparece este mensaje
				{
					throw new Exception("La clave ingresada es incorrecta");
				}
		    }
		    else
		    {
		    	throw new Exception("El alias ingresado no existe"); // si el alias no existe no se compararan 
				// las claves, pero nos mostrara este mensaje
		    }
	  	}
	  	else
	  	{
	    	throw new Exception("Debe ingresar un alias y una clave"); // Esto aparece si dejamos campos vacios
	  	}
    }
    catch (Exception $error) // esto captura errores desconocidos
    {
        Page::showMessage(2, $error->getMessage(), null); // aparecera un mensaje personalizado
    }
}
?>
<!-- Este el formulario del inicio de sesion -->
<form method='post' autocomplete='on'>
	<div class='row'>
		<div class='input-field col s12 m6 offset-m3'>
			<i class='material-icons prefix'>person_pin</i>
			<input autocomplete="off"  id='alias' type='text' name='alias' class='validate' value="<?php if(isset($_COOKIE["member_login"])) { echo $_COOKIE["member_login"]; } ?>" required/>
	    	<label for='alias'>Usuario</label>
		</div>
		<div class='input-field col s12 m6 offset-m3'>
			<i class='material-icons prefix'>security</i>
			<input autocomplete="off"  id='clave' type='password' name='clave' class="validate" value="<?php if(isset($_COOKIE["member_password"])) { echo $_COOKIE["member_password"]; } ?>" required/>
			<label for='clave'>Contraseña</label>
		</div>
		<div class='input-field col s12 m6 offset-m4'>
			<input type="checkbox" id="check" name="remember" <?php if(isset($_COOKIE["member_login"])) { ?> checked <?php } ?>>
			<label for="check">Recordar usuario y contraseña</label>
		</div>
	</div>
	<div class="center">
	<a href="contra.php" >¿Olvidaste tu contraseña?</a>
	</div>
	<br>
	<div class='row center-align'>
		<button type='submit' class='btn waves-effect red'>Iniciar sesión</button>
	</div>
</form>

<?php
// llamamos el pie de pagina
Page::footer();
?>