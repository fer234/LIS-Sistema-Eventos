<?php
require("../lib/page.php");
Page::header("Recuperacion de contraseña");
$sql = "SELECT * FROM usuarios";
$data = Database::getRows($sql, null);
if($data == null)
{
header("location: register.php");
}
//Se elanzan archivos necesarios
include "../../lib/PHPMailer-master/class.phpmailer.php";
include "../../lib/PHPMailer-master/class.smtp.php";
//valida si el post esta vacio y enlaza las variables con el campo
if(!empty($_POST))
{
$_POST = validator::validateForm($_POST);
$correo = $_POST['correo'];
try
{
$sql = "SELECT * FROM usuarios WHERE correo = ?";
$params = array($correo);
$data = Database::getRows($sql, $params);
if($data != null)
{
if($correo != "")
{ 
function generateRandomString($length = 10) {
$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
$charactersLength = strlen($characters);
$randomString = '';
for ($i = 0; $i < $length; $i++) {
$randomString .= $characters[rand(0, $charactersLength - 1)];
}
return $randomString;}

$codigo = generateRandomString();
$email_user = "grandeventmaillis@gmail.com";
$email_password = "grandeventmaillis123";
$the_subject = "Control de acceso";
$address_to = $correo;
$from_name = "Administrador Grand Event";
$phpmailer = new PHPMailer();
// ---------- datos de la cuenta de Gmail -------------------------------
$phpmailer->Username = $email_user;
$phpmailer->Password = $email_password; 
//-----------------------------------------------------------------------
// $phpmailer->SMTPDebug = 1;
$phpmailer->SMTPSecure = 'ssl';
$phpmailer->Host = "smtp.gmail.com"; // GMail
$phpmailer->Port = 465;
$phpmailer->IsSMTP(); // use SMTP
$phpmailer->SMTPAuth = true;
$phpmailer->setFrom($phpmailer->Username,$from_name);
$phpmailer->AddAddress($address_to); // recipients email
$phpmailer->Subject = $the_subject;	
$phpmailer->Body .="<h1 style='color:#3498db;'>Has olvidado tu contraseña!</h1>";
$phpmailer->Body .= "<p>Hemos creado una nueva contraseña para ti, utiliza el siguiente codigo como nueva contraseña para poder iniciar sesion, luego cambiala en tu perfil</p>";
$phpmailer->Body .= $codigo;
$phpmailer->Body .= "<p>Fecha y Hora: ".date("d-m-Y h:i:s")."</p>";
$phpmailer->IsHTML(true);
$phpmailer->Send();
//enviamos en codigo generado a la base de datos para poder usarlo con el usuario al desbloquear su cuenta
$clave = password_hash($codigo, PASSWORD_DEFAULT);
$sql = "UPDATE usuarios SET  clave = ? WHERE correo = ?";
$params = array($clave, $correo);
Database::executeRow($sql, $params);
//se le redirige a una pagina para notificar del bloqueo
Page::showMessage(1, "Se ha enviado una nueva contraseña a tu direccion de correo", "login.php");
} 
else 
{
throw new Exception("El campo de correo esta vacio");
}
} 
else 
{
throw new Exception("Este correo no esta vinculado a ninguna cuenta");
}  
}
catch (Exception $error)
{
Page::showMessage(2, $error->getMessage(), null);
}
}
?>
<!-- Formulario -->
<div class="container center-align">
<br>
<br>
<img class="loginimg"  >
<div class="row">
<form method="post" autocomplete="off" class="col s12">
<div class="row">
<div class="input-field col s6 left-align">
<i class="material-icons prefix">email</i>
<input autocomplete="off" type="email" id="correo" name="correo" required/>
<label for="correo" data-error="wrong" data-success="right">Ingresa tu Correo eléctronico</label>
</div>
<button type='submit' class='btn waves-effect green'>Enviar</button>
</div>
<div class="input-field col s6 left-align">
<a href='login.php' class='btn waves-effect red'>Regresar</a>
</div>
</form>
<br>
</div>
</div>
<?php
Page::footer();
?>
