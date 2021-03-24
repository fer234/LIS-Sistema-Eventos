<?php
// Mandamos a llamar los estilos y el navbar
include("../master/estilos.php");
include("../master/navbar.php");
?>
<html>
<head>
<meta charset="utf-8"/>
<title> Inicio | 2021 </title>
</head>
<body>
<!-- Texto de inicio,aparecera abajo del navbar -->
<div class="black white-text center">
<div class="Container">
<div class="section">
<h3>Bienvenidos a Grand Event</h3>
</div>
</div>
</div>
<!-- slider del index, para dar buena apariencia -->
<div class="slider">
<ul class="slides">
<li>
<img src=img/s7.jpg> 
</li>
<li>
<img src=img/s9.jpg> 
</li>
<li>
<img src=img/s8.jpg> 
</li>
</div>
<!-- fin del slider -->
<!-- inicio de los contenedores de texto e imagen -->
<div class="row black">
</div>
<div class="row">
<div class="col s12 l6">
<h5 class="black-text textosindex center-align">Eventos Inolvidables</h5>
<hr>
<p class="black-text textosindex">Garantizar que cada detalle sera perfecto para tu evento, ya que contamos con la experiencia y el mejor equipo de trabajo para hacer todo realidad, tus invitados no querran que la celebracion termine.</p>
</div>
<div class="col s12 l6">
<img class="responsive-img materialboxed" width="800" src="img/i1.jpg">
</div>
</div>
<div class="row black">
<div class="col s12 l6">
<img class="responsive-img materialboxed"  width="800" src="img/i2.jpg">
</div>
<div class="col s12 l6">
<h5 class="white-text textosindex center-align">Reserva tu evento</h5>
<hr>
<p class="white-text textosindex">Proporcionamos condiciones comodas, agradables, seguras y tranquilas a todos aquellos que buscan trabajar y desarrollar proyectos y capacitaciones para nuestro Pais, asi como disfrutar de sano esparcimiento y descanso en un ambiente de tranquilidad , solidaridad y Responsabilidad.</p>
</div>
</div>
<div class="row">
<div class="col s12 l6">
<h5 class="black-text textosindex center-align">Precios Increibles</h5>
<hr>
<p class="black-text textosindex">Nuestros precios son razonables, ya que ofrecemos una calidad y unos espacios que no vas a encontrar en ningun otro lugar, deja todo en nuestras manos y simplemente disfruta de tu evento.</p>
</div>
<div class="col s12 l6">
<img class="responsive-img materialboxed" width="800" src="img/i3.jpg">
</div>
</div>
<div class="black white-text center">
<div class="Container">
<div class="section">
<h3>Amplias instalaciones</h3>
<p>Contamos con el espacio suficiente para que todos se sientan libres de disfrutar a lo grande.
</p>
</div>
</div>
</div>
<!-- fin de los contenedores de texto e imagenes -->
<!-- inicio de dos parallax -->
<div class="parallax-container">
<div class="parallax">
<img src="img/eje1.jpg" alt="">
</div>
</div>
<div class="black white-text center">
<div class="Container">
<div class="section">
<h3>Celebraciones para toda la familia</h3>
<p>Nuestra ambientación te hace sentir como en casa.
</p>
</div>
</div>
</div>
<div class="parallax-container">
<div class="parallax">
<img src="img/i4.jpg" alt="">
</div>
</div>
<!-- fin de los parallax -->
<!-- fin del contenido de la pagina -->
<?php
// llamamos nuestro footer
include("../master/footer.php");
?>
<?php
// traemos los js de materialize
include("../master/scripts.php");
?>
</body>
</html>