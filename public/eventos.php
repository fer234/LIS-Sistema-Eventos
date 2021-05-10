<?php
include("../master/estilos.php");
include("../master/navbar.php");
?>
<html>
<head>
<meta charset="utf-8"/>
<title> Eventos | 2021 </title>
</head>
<body>
<!-- Contenido de la pagina -->
<div class="black white-text center">
<div class="Container">
<div class="section">
<h3>Eventos</h3>
</div>
</div>
</div>
<!-- seccion de bodas-->
<div class="section">
<h3 class="white blue-text textosindex center-align ">BODAS</h3>
<br>
<!--Galeria de imagenes de bodas-->
<!-- tarjeta 1-->
<div class="row">
<?php
require("../lib/database.php");
$sql = "SELECT * FROM evento, tipo_eventos WHERE evento.id_tipo = tipo_eventos.id_tipo AND estado = 1 AND nombre_tipo LIKE '%Boda%'";
$data = Database::getRows($sql, null);
if($data != null)
{
foreach ($data as $row) 
{
print("
<div class='card hoverable col s12 l4 grey darken-4'>
<div class='card-image waves-effect waves-block waves-light'>
<img class='responsive-img' src='data:image/*;base64,$row[imagen]'>
</div>
<div class='card-content'>
<span class='card-title activator white-text text-darken-4'>$row[nombre_evento]<i class='material-icons right'>more_vert</i></span>
</div>
<div class='card-reveal'>
<span class='card-title grey-text text-darken-4'>$row[nombre_evento]<i class='material-icons right'>close</i></span>
<p>$row[descripcion]</p>
<p>Precio (US$) $row[precio_evento]</p>
</div>
</div>
");
}
}
else
{
print("<div class='card-panel yellow'><i class='material-icons left'>warning</i>No hay registros disponibles en este momento.</div>");
}
?>
</div>
</div>
<hr>
<!-- seccion para 15 años-->
<div class="section">
<h3 class="white pink-text textosindex center-align">XV AÑOS</h3>
<br>
<div class="row">
<?php
$sql2 = "SELECT * FROM evento, tipo_eventos WHERE evento.id_tipo = tipo_eventos.id_tipo AND estado = 1 AND nombre_tipo LIKE '%XV%'";
$data2 = Database::getRows($sql2, null);
if($data2 != null)
{
foreach ($data2 as $row) 
{
print("
<div class='card hoverable col s12 l4 grey darken-4'>
<div class='card-image waves-effect waves-block waves-light'>
<img class='responsive-img' src='data:image/*;base64,$row[imagen]'>
</div>
<div class='card-content'>
<span class='card-title activator white-text text-darken-4'>$row[nombre_evento]<i class='material-icons right'>more_vert</i></span>
</div>
<div class='card-reveal'>
<span class='card-title grey-text text-darken-4'>$row[nombre_evento]<i class='material-icons right'>close</i></span>
<p>$row[descripcion]</p>
<p>Precio (US$) $row[precio_evento]</p>
</div>
</div>
");
}
}
else
{
print("<div class='card-panel yellow'><i class='material-icons left'>warning</i>No hay registros disponibles en este momento.</div>");
}
?>
</div>
</div>
<hr>
<!--Graduaciones-->
<div class="section">
<h3 class="white green-text textosindex center-align">GRADUACIÓN</h3>
<br>
<div class="row">
<?php
$sql3 = "SELECT * FROM evento, tipo_eventos WHERE evento.id_tipo = tipo_eventos.id_tipo AND estado = 1 AND nombre_tipo LIKE '%Graduaciones%'";
$data3 = Database::getRows($sql3, null);
if($data3 != null)
{
foreach ($data3 as $row) 
{
print("
<div class='card hoverable col s12 l4 grey darken-4'>
<div class='card-image waves-effect waves-block waves-light'>
<img 'responsive-img' src='data:image/*;base64,$row[imagen]'>
</div>
<div class='card-content'>
<span class='card-title activator white-text text-darken-4'>$row[nombre_evento]<i class='material-icons right'>more_vert</i></span>
</div>
<div class='card-reveal'>
<span class='card-title grey-text text-darken-4'>$row[nombre_evento]<i class='material-icons right'>close</i></span>
<p>$row[descripcion]</p>
<p>Precio (US$) $row[precio_evento]</p>
</div>
</div>
");
}
}
else
{
print("<div class='card-panel yellow'><i class='material-icons left'>warning</i>No hay registros disponibles en este momento.</div>");
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