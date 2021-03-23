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

}
?>