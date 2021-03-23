<?php
// necesitamos la base de datos
// y las validaciones
require("../../lib/database.php");
require("../../lib/validator.php");
class Page
{
	public static function header($title)
	{
		// iniciamos una nueva session 
		session_start();
		// tomamos la hora y fecha de El Salvador para usarla posteriormente
		ini_set("date.timezone","America/El_Salvador");
		// vamos a imprimir todas las hojas de estilo de nuestro framework Materialize
		print("
			<!DOCTYPE html>
			<html lang='es'>
			<head>
				<meta charset='utf-8'>
				<title>Dashboard - $title</title>
				<link type='text/css' rel='stylesheet' href='../../css/materialize.min.css'/>
				<link type='text/css' rel='stylesheet' href='../../css/sweetalert2.min.css'/>
				<link type='text/css' rel='stylesheet' href='../../css/icons.css'/>
				<link type='text/css' rel='stylesheet' href='../css/dashboard.css'/>
				<script type='text/javascript' src='../../js/sweetalert2.min.js'></script>
				<meta name='viewport' content='width=device-width, initial-scale=1.0'/>
			</head>
			<body>
		");
		// si el usuario inicio sesion corectamente tomamos el nombre del usuario
		// tambien tendremos el navbar mas completo, con todos los CRUDS que manejaremos
		if(isset($_SESSION['nombre_usuario']))
		{
			// aqui imprimimos el menu de administradores
			print("
				<header class='navbar-fixed'>
					<nav class='black'>
						<div class='nav-wrapper'>
							<a href='../main/' class='brand-logo'><i class='material-icons left hide-on-med-and-down'>dashboard</i></a>
							<a href='#' data-activates='mobile' class='button-collapse'><i class='material-icons'>menu</i></a>
							<ul class='right hide-on-med-and-down'>
								<li><a href='../reservation/'><i class='material-icons left'>dvr</i>Reservaciones</a></li>
								<li><a href='../event/'><i class='material-icons left'>event</i>Eventos</a></li>
								<li><a href='../type/'><i class='material-icons left'>event_note</i>Tipos de eventos</a></li>
								<li><a href='../users/'><i class='material-icons left'>group</i>Usuarios</a></li>
								<li><a class='dropdown-button' href='#' data-activates='dropdown'><i class='material-icons left'>verified_user</i>".$_SESSION['nombre_usuario']."</a></li>
							</ul>
							<ul id='dropdown' class='dropdown-content'>
								<li><a href='../main/profile.php'><i class='material-icons left'>edit</i>Editar perfil</a></li>
								<li><a href='../main/logout.php'><i class='material-icons left'>clear</i>Salir</a></li>
							</ul>
						</div>
					</nav>
				</header>
				<ul class='side-nav' id='mobile'>
					<li><a href='../reservation/'><i class='material-icons left'>dvr</i>Reservaciones</a></li>
					<li><a href='../event/'><i class='material-icons left'>event</i>Eventos</a></li>
					<li><a href='../type/'><i class='material-icons left'>event_note</i>Tipos de eventos</a></li>
					<li><a href='../users/'><i class='material-icons'>group</i>Usuarios</a></li>
					<li><a class='dropdown-button' href='#' data-activates='dropdown-mobile'><i class='material-icons'>verified_user</i>".$_SESSION['nombre_usuario']."</a></li>
				</ul>
				<ul id='dropdown-mobile' class='dropdown-content'>
					<li><a href='../main/profile.php'>Editar perfil</a></li>
					<li><a href='../main/logout.php'>Salir</a></li>
				</ul>
				<main class='container'>
					<h3 class='center-align'>".$title."</h3>
			");
		}
		else
		{
			// si el usuario no tuvo exito al iniciar sesion o simplemente no lo hizo
			// le aparecera este navbar sencillo, con ninguna opcion de administrador
			print("
				<header class='navbar-fixed'>
					<nav class='black'>
						<div class='nav-wrapper'>
							<a href='../main/' class='brand-logo'><i class='material-icons'>dashboard</i></a>
						</div>
					</nav>
				</header>
				<main class='container'>
			");
			// ESTO ES MUY IMPORTANTE
			//  $_SERVER es un array que almacena la mucha informacion del sistema
			// En este caso las rutas, por eso utilizamos PHP_SELF ya que nos dice que ruta esta siendo 
			// ejectada por el servidor web
			$filename = basename($_SERVER['PHP_SELF']);
			// Como nos encontramos en el else significa que no hemos iniciado sesion, por lo tanto
			// no tenemos permiso de entrar a ninguna ruta del sitio publico que no sea el login o el register
			if($filename != "login.php" && $filename != "register.php")
			{
				// si se intenta ingresar de esta manera, nos aparecera este mensaje de error y nos mantendra 
				// en el login, jamas entraremos a otro lugar que no sea el login o el register
				self::showMessage(3, "¡Debe iniciar sesión!", "../main/login.php");
				// el footer siempre nos aparecera, estemos o no logueados
				self::footer();
				exit;
			}
			else
			{
				// si no se intenta entrar de esa manera simplemente estaremos en el login
				print("<h3 class='center-align'>".$title."</h3>");
			}
		}
	}

	public static function footer()
	{
		// funcion donde tenemos nuestro footer, podemos llamarlo de cualquier lado
		// invocando la clase Page::footer, asi no escribimos tanto codigo
		print("
			</main>
			<footer class='page-footer black'>
				<div class='container'>
					<div class='row'>
						<div class='col s12 m6'>
							<h5 class='white-text'>Gread Event</h5>
							<a class='white-text' href='www.outlook.com'><i class='material-icons left'>email</i>Ayuda</a>
						</div>
						<div class='col s12 m6'>
							<h5 class='white-text'>Enlaces</h5>
							<a class='white-text' href='../../public/' target='_blank'><i class='material-icons left'>store</i>Sitio público</a>
						</div>
					</div>
				</div>
				<div class='footer-copyright'>
					<div class='container'>
						<span>©".date(' Y ')."Gread Event, todos los derechos reservados.</span>
						<span class='white-text right'>Diseñado con <a class='red-text text-accent-1' href='http://materializecss.com/' target='_blank'><b>Materialize</b></a></span>
					</div>
				</div>
			</footer>
			<script type='text/javascript' src='../../js/jquery-2.1.1.min.js'></script>
			<script type='text/javascript' src='../../js/materialize.min.js'></script>
			<script type='text/javascript' src='../js/dashboard.js'></script>
			</body>
			</html>
		");
	}

	// Con esta funcion, podemos cargar los comboBox con informacion de la base de datos
	public static function setCombo($label, $name, $value, $query)
	{
		// $data tendra la infromacion de la base de datos, por eso llamamos a la clase Database
		// y obtenemos sus registros
		$data = Database::getRows($query, null);
		// definimos la estructura de los combobox, ya que aqui en HTML se llaman select
		// el nombre se recibe como paramtro al igual que el valor, todo de la base de datos
		print("<select name='$name' required>");
		// verificamos que la info que solicitamos exista
		if($data != null)
		{
			// el valor del combo no tendra ningun valor seleccionado
			if($value == null)
			{
				// por lo tanto le ponemos este mensaje para que se vea bien
				print("<option value='' disabled selected>Seleccione una opción</option>");
			}
			// recorremos nuestros datos uno por uno
			foreach($data as $row)
			{
				// aqui configuramos el combo para que el usuario pueda elegir que quiera
				if(isset($_POST[$name]) == $row[0] || $value == $row[0])
				{
					print("<option value='$row[0]' selected>$row[1]</option>");
				}
				else
				{
					print("<option value='$row[0]'>$row[1]</option>");
				}
			}
		}
		else
		{
			// si la tabla esta vacia nos aparecera este mensaje
			print("<option value='' disabled selected>No hay registros</option>");
		}
		// colocamos el funal del combo y un label para indicar que se va a seleccionar
		print("
			</select>
			<label>$label</label>
		");
	}

	// Con esta funcion hacemos nuestros mensajes personalizados gracias a sweetalert
	// recibimos el tipo de error, un mensaje predeterminado y el lugar donde estamos (url)
	public static function showMessage($type, $message, $url)
	{
		// los errores en php tienden a tener muchos caracteres especiales
		// addslashes los quita y coloca nuestro texto entre /
		$text = addslashes($message);
		// tendremos varios tipos de alertas, de advertencia, de confirmacion, error, etc
		switch($type)
		{
			// usamos un case porque era la opcion mas ordenada y segura
			// le colocamos un titulo y un icono a la alerta
			case 1:
				$title = "Éxito";
				$icon = "success";
				break;
			case 2:
				$title = "Error";
				$icon = "error";
				break;
			case 3:
				$title = "Advertencia";
				$icon = "warning";
				break;
			case 4:
				$title = "Aviso";
				$icon = "info";
		}
		// si pasamos este if, es porque nos logueamos
		if($url != null)
		{
			// usamos javascript para armar nustra alerta, le colocamos el mensaje de que nos dio, el icono, un boton para cerrar la alerta
			// la alerta solo se quitara al dar clic en el boton aceptar
			print("<script>swal({title: '$title', text: '$text', type: '$icon', confirmButtonText: 'Aceptar', allowOutsideClick: false, allowEscapeKey: false}).then(function(){location.href = '$url'})</script>");
		}
		// si no pasamos el if es porque estamos en el login
		else
		{
			// usamos javascript para armar nustra alerta, le colocamos el mensaje de que nos dio, el icono, un boton para cerrar la alerta
			// la alerta solo se quitara al dar clic en el boton aceptar
			print("<script>swal({title: '$title', text: '$text', type: '$icon', confirmButtonText: 'Aceptar', allowOutsideClick: false, allowEscapeKey: false})</script>");
		}
	}
}
?>