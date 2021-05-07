<?php 
class Page
{
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