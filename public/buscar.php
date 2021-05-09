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
<div class="black white-text center">
<div class="Container">
<div class="section">
<h3>Busca tu reserva</h3>
</div>
</div>
</div>
<br>
<div class="container">
<div class="row">
<form action="" method="GET">
<div class='row'>
<div class='input-field col s12 m11'>
<i class='material-icons prefix'>person</i>
<input id='id' type='text' name='id' class='validate' required/>
<label for='id'>Ingresa tu codigo</label>
</div>
</div>
<div class='row center-align'>
<button type='submit' class='btn waves-effect blue'>Buscar mi reserva</button>
</div>
</form>
</div>
</div>
<br><br><br>
<!-- Aqui se puso un contenedor para ordenar los resultados de la busqueda -->
<div class="container">
<div class="row">
<legend>Resultado de la busqueda</legend>
<br><br>
<?php
if (isset($_GET['id']) && $_GET['id']!="") {
$id = $_GET['id'];
$url = "http://localhost/grandeventapi/public/reserva/".$id;

$client = curl_init($url);
curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
$response = curl_exec($client);

$result = json_decode($response);

echo "<table class='table'>";
echo "<thead>";
echo "<tr>";
echo "<th>Tu codigo</th>";
echo "<th>Nombres</th>";
echo "<th>Apellidos</th>";
echo "<th>DUI</th>";
echo "<th>Correo electronico</th>";
echo "<th>Tu evento</th>";
echo "<th>Telefono</th>";
echo "<th>Fecha de tu evento</th>";
echo "</tr>";
echo "</thead>";
echo "<tbody>";
echo "<tr>";
echo "<td>$result->id</td>";
echo "<td>$result->nombre</td>";
echo "<td>$result->apellido</td>";
echo "<td>$result->dui</td>";
echo "<td>$result->correo</td>";
echo "<td>$result->evento</td>";
echo "<td>$result->telefono</td>";
echo "<td>$result->fecha</td>";
echo "</tr>";
echo "</tbody>";
echo "</table>";
}
?>
</div>
</div>
<!-- Fin del contenido de la pagina -->
<?php
include("../master/footer.php");
?>
<?php
include("../master/scripts.php");
?>
</body>
</html>