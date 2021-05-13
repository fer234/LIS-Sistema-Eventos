<?php
include("../master/estilos.php");
include("../master/navbar.php");
?>
<html>
<head>
<meta charset="utf-8"/><!-- tipo de escritura para que acepte caracteres especiales -->
<title> Reservas | 2021 </title>
</head>
<body>
<!-- Contenido de la pagina -->
<!-- Contenido de la pagina -->
<div class="black white-text center">
<div class="Container">
<div class="section">
<h3>Reservación</h3>
</div>
</div>
</div>
<div class="black-text textosindex center-align">
<h4>Ingresa todos tus datos</h4>
</div>
<!-- Este el formulario donde se ingresan los datos -->
<!-- Si ya hay registros entonces los imprimimos en el campo que corresponde -->
<div class="container">
<div class="row">
<form method='post' action="" autocomplete='off'>
<div class='row'>
<div class='input-field col s12 m6'>
<i class='material-icons prefix'>person</i>
<input id='nombres' type='text' name='nombre' class='validate'required/>
<label for='nombres'>Nombres</label>
</div>
<div class='input-field col s12 m6'>
<i class='material-icons prefix'>person</i>
<input id='apellidos' type='text' name='apellido' class='validate' required/>
<label for='apellidos'>Apellidos</label>
</div>
</div>
<div class='row'>
<div class='input-field col s12 m6'>
<i class='material-icons prefix'>beenhere</i>
<input id='dui' type='text' name='dui' class='validate' required/>
<label for='dui'>Documento de identidad</label>
</div>
<div class='input-field col s12 m6'>
<i class='material-icons prefix'>email</i>
<input id='correo' type='email' name='correo' class='validate' required/>
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
<input id='telefono' type='number' name='telefono' class='validate' required/>
<label for='telefono'>Telefono</label>
</div>
<div class='input-field col s12 m6'>
<i class='material-icons prefix'>date_range</i>
<input id='fecha' type='date' name='fecha' class='validate' required/>
<label for='fecha'>Fecha</label>
</div>
</div>
<div class='row center-align'>
<a href='index.php' class='btn waves-effect red'>Cancelar</a>
<button type='submit' class='btn waves-effect blue'>Reservar</button>
</div>
</form>
</div>
</div>
<?php
require("lib/page.php");
if(isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['dui']) && isset($_POST['correo']) && isset($_POST['evento']) && isset($_POST['telefono']) && isset($_POST['fecha'])){
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$dui = $_POST['dui'];
$correo = $_POST['correo'];
$evento = $_POST['evento'];
$telefono = $_POST['telefono'];
$fecha = $_POST['fecha'];
$fields = array('nombre' => $nombre, 'apellido' => $apellido, 'dui' => $dui, 'correo' => $correo, 'evento' => $evento, 'telefono' => $telefono, 'fecha' => $fecha);
$payload = json_encode($fields);
// Preparando un nuevo recurso cURL
$ch = curl_init('http://localhost/grandeventapi/public/reserva');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLINFO_HEADER_OUT, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
// Establecemos un encabezado HTTP para la solicitud POST
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Content-Type: application/json',
'Content-Length: ' . strlen($payload))
);
// Enviamos la solicitud post
$result = curl_exec($ch);
Page::showMessage(1, "Tu reserva a sido enviada", "index.php");
// Cerranos la session cURL
curl_close($ch);
}
?>
<!-- Fin del contenido de la pagina -->
<?php
include("../master/footer.php");
?>
<?php
include("../master/scripts.php");
?>
</body>
</html>