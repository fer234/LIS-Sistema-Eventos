<?php
class Validator
{
	// con esta funcion validamos un poco lo que recibimos de los formularios
	public static function validateForm($fields)
	{
		// recorremos el valor de los campos del formulario, uno a uno
		foreach ($fields as $index => $value) {
			// con trim quitamos los espacios en blanco al inicio y al final de nuestro value
			$value = trim($value);
			// el campo con el indice indicado sera igual a los valores a los que le quitamos los espacios en
			// blanco al inicio y al final
			$fields[$index] = $value;
		}
		// retornamos los campos y ya pueden ser ingresados a la base
		return $fields;
	}

	public static function validateImage($file)
	{
		$img_size = $file["size"];
     	if($img_size <= 2097152)
     	{
     		$img_type = $file["type"];
	     	if($img_type == "image/jpeg" || $img_type == "image/png" || $img_type == "image/gif")
	    	{
	    		$img_temporal = $file["tmp_name"];
	    		$img_info = getimagesize($img_temporal);
		    	$img_width = $img_info[0]; 
				$img_height = $img_info[1];
				if ($img_width == $img_height)
				{
					$image = file_get_contents($img_temporal);
					return base64_encode($image);
				}
				else
				{
					throw new Exception("La dimensión de la imagen debe ser cuadrada");
				}
	    	}
	    	else
	    	{
	    		throw new Exception("El formato de la imagen debe ser jpg, png o gif");
	    	}
     	}
     	else
     	{
     		throw new Exception("El tamaño de la imagen debe ser como máximo 2MB");
     	}
	}

}
?>