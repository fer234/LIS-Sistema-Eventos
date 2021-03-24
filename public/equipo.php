<?php
// llamamos nuestros estilos y navbar
include("../master/estilos.php");
include("../master/navbar.php");
?>
<html>
<head>
<meta charset="utf-8"/>
<title> Nuestro Equipo | 2021 </title>
</head>
<body>
<!-- Contenido de la pagina -->
<div class="black white-text center">
<div class="Container">
<div class="section">
<h3>Nuestro Equipo</h3>
</div>
</div>
</div>
<!-- Primer parrafo para ver nuestra info -->
<div class="black-text textosindex center-align">
<h4>Grand Event</h4>
<h5>Experiencia en organización de eventos al servicio de nuestros clientes.</h5>
</div>
<div class="parrafo">  
<img class="responsive-img imgt" src="img/about/FotoJet.jpg">
<br><br><br>
<div class="row">
<div class="col s12 m6">
<div class="card withe">
<div class="card-content textosindex">
<h5 class="card-title purple-text center-align">¿Quienes Somos?</h5>
<p class="black-text textosindex">Somos una empresa con más de 5 años de experiencia, dedicada a brindarle el mejor servicio de organización, desde eventos sociales como bodas, fiestas de cumpleaños, graduaciones, hasta eventos ejecutivos como aniversarios de empresa.<br><br> 
Nuestro deseo es que cada evento realizado sea único e inolvidable, contando con hermosas instalaciones, buena decoración y excelente comida.</p>
</div>
</div>
</div>
</div>
</div><br><br>
<!-- Cartas con nuestra vision y mision -->
<div class="row">
<div class="col s12 l6">
<h5 class="black-text textosindex center-align">Misión</h5>
<hr>
<p class="black-text textosindex">Ser los mejores en lo que hacemos, además de brindarle la confianza y seguridad a nuestros clientes de poder organizar el evento de sus sueños con la mejor calidad, principios y valores.</p>
</div>
<div class="col s12 l6">
<img class="responsive-img materialboxed" width="800" src="img/about/a1.jpeg">
</div>
</div>
<div class="row black">
<div class="col s12 l6">
<img class="responsive-img materialboxed"  width="495" src="img/grandevent.png">
</div>
<div class="col s12 l6">
<h5 class="white-text textosindex center-align">Visión</h5>
<hr>
<p class="white-text textosindex">Ser la mejor opción en organización de eventos dirigida a personas que buscan una experiencia única, ayudandote en cada detalle para que las tus celebraciones tenga un toque unico e inolvidable.</p>
</div>
</div>
<!-- Metodologia de trabajo -->
<div class="columnas">
<h5>Proceso de desarrollo</h5>
<div class="proceso">
<img src="img/planificacion.jfif" class="icono">
<div class="caja"></div>
<p class="textcolumna">Planificación</p>
</div>
<div class="proceso">
<img src="img/organizacion.jpg" class="icono">
<div class="caja"></div>
<p class="textcolumna">Organización</p>
</div>
<div class="proceso">
<img src="img/control.jpg" class="icono">
<div class="caja"></div>
<p class="textcolumna">Control<br>de calidad</p>
</div>
<div class="proceso">
<img src="img/realizacion.jpg" class="icono">
<div class="caja"></div>
<p class="textcolumna">Ejecución</p>
</div>
</div>
<br>
<!-- Fin del contenido de la pagina -->
<?php
// llamamos el pie de pagina
include("../master/footer.php");
?>
<?php
// llamamos los js de materialize
include("../master/scripts.php");
?>
</body>
</body>
</html>