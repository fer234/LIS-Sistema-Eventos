<?php
include("../master/estilos.php");
include("../master/navbar.php");
?>
<html>
<head>
<meta charset="utf-8"/><!-- tipo de escritura para que acepte caracteres especiales -->
<title> Inicio | 2021 </title>
</head>
<body>

<!-- Contenido de la pagina -->

<div class="black white-text center">
<div class="Container">
<div class="section">
<h3>Bienvenidos a Grand Event</h3>
<p>bjklsbfvv sflovgsl nwn sov nñslnv ñqwan  qw bfqwñf l.wabf lqeb wh q wefghoiw hwhf qwlfb lw w gwkfhg wh w
</p>
</div>
</div>
</div>

<div class="slider">
    <ul class="slides">
    <li>
        <img src=img/eje1.jpg> 
        <div class="caption center-align">
        <h3>This is our big Tagline!</h3>
        <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
        </div>
    </li>
    <li>
        <img src=img/eje2.jpg> 
        <div class="caption left-align">
        <h3>Left Aligned Caption</h3>
        <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
        </div>
    </li>
    <li>
        <img src=img/eje3.jpg> 
        <div class="caption right-align">
        <h3>Right Aligned Caption</h3>
        <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
        </div>
    </li>
    <li>
        <img src="https://lorempixel.com/580/250/nature/4"> 
        <div class="caption center-align">
        <h3>This is our big Tagline!</h3>
        <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
        </div>
        </li>
    </ul>
</div>

<div class="row black">
</div>

<div class="row">
<div class="col s12 l6">
<h5 class="black-text textosindex center-align">Eventos Increibles</h5>
<hr>
<p class="black-text textosindex">Aqui se puede poner mucha informacion pero solo debe ser texto, se las dejo por si les sirve</p>
<a href="galeria.php" class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">add</i></a>
</div>
<div class="col s12 l6">
<!--<img class="responsive-img valign-wrapper" src="img/eje1.jpg">-->
<img class="responsive-img materialboxed" width="800" src="img/eje1.jpg">
</div>
</div>
<div class="row black">
<div class="col s12 l6">
<img class="responsive-img materialboxed" width="800" src="img/eje2.jpg">
</div>
<div class="col s12 l6">
<h5 class="white-text textosindex center-align">Reserva tu evento</h5>
<hr>
<p class="white-text textosindex">Proporcionar las condiciones comodas, agradables, seguras y tranquilas a todos(a) y aquellos(a) que buscan trabajar y desarrollar proyectos y capacitaciones para nuestro Pais, asi como disfrutar de sano esparcimiento y descanso en un ambiente de tranquilidad , solidaridad y Responsabilidad.</p>
<a class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">add</i></a>
</div>
</div>
<div class="row">
<div class="col s12 l6">
<h5 class="black-text textosindex center-align">Mira nuestras ofertas</h5>
<hr>
<p class="black-text textosindex">Ser uno de los Mejores organiadores de eventos en San Salvador.</p>
<a class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">add</i></a>
</div>
<div class="col s12 l6">
<img class="responsive-img materialboxed" width="800" src="img/eje3.jpg">
</div>
</div>

<div class="black white-text center">
<div class="Container">
<div class="section">
<h3>Bienvenidos a Grand Event</h3>
<p>bjklsbfvv sflovgsl nwn sov nñslnv ñqwan  qw bfqwñf l.wabf lqeb wh q wefghoiw hwhf qwlfb lw w gwkfhg wh w
</p>
</div>
</div>
</div>

<div class="parallax-container">
<div class="parallax">
<img src="img/eje2.jpg" alt="">
</div>
</div>

<div class="black white-text center">
<div class="Container">
<div class="section">
<h3> Grand Event</h3>
<p>bjklsbfvv sflovgsl nwn sov nñslnv ñqwan  qw bfqwñf l.wabf lqeb wh q wefghoiw hwhf qwlfb lw w gwkfhg wh w
</p>
</div>
</div>
</div>

<div class="parallax-container">
<div class="parallax">
<img src="img/eje1.jpg" alt="">
</div>
</div>

<!-- fin del contenido de la pagina -->
<?php
include("../master/footer.php");
?>
<?php
include("../master/scripts.php");
?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.slider');
    var instances = M.Slider.init(elems, options);
});
</script>

</body>
</html>