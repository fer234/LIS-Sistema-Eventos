<?php
include("../master/estilos.php");
include("../master/navbar.php");
?>
<html>
<head>
<meta charset="utf-8"/><!-- tipo de escritura para que acepte caracteres especiales -->
<title> Galeria | 2021 </title>
<!--Import Google Icon Font-->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
 <!-- Compiled and minified CSS -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>
<body>
<!-- Contenido de la pagina -->
<h3 class="center-align">Galeria</h3>
<!-- seccion de bodas-->
<div class="section">
<h3 class="textosindex center-align">Tipos de Decoración y Salónes:</h3>
<hr>
<h3   class=" textosindex center-align ">BODAS</h3>
<div class="row">
<!--agregando imagen circular de los novios utilizando la clase circle-resposive-img-->
<div class="col s8 offset-s2 l2 offset-l5 z-depth-5">
              <img src="img/galeria_img/eje13.jpg" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->      
</div>
  </div>
<div class="row">
<!--agregando un tarjeta en forma de panel con una introduccion utilizando la clase card-panel-->
  <div class="col s10 offset-s1 l4 offset-l4 z-depth-5 blue">
      <div class="card-panel black">
        <p class="white-text textosindex ">Sabemos que este es un momento único en tú vida por eso siempre como organización de eventos estamos para servirte y darte nuestros mejores servicios.
        </p>
      </div>
    </div>
</div>
<br>
<hr>
<br>
<!--Galeria de imagenes de bodas-->
<!-- tarjeta 1-->
<div class="row">
<div class="col s12 l4 ">
<!-- card sirve para crear la tarjeta y hoverable crea un efecto de sombreado al pone el cursor en la imagen-->
<div class="card hoverable  blue-grey lighten-3">
<!--card-image es para agregar la imagen-->
<div class="card-image ">
<!-- la clase activator sirve para conectar el card-reveal y mostrar la informacion desplegadola hacia arriba al tocar la imagen-->
<img  class="responsive-img" src="img/galeria_img/eje7.jpg" alt="imagen"  class="activator" >
<!-- aqui se crea el boton add y con activator se activa tambien para desplegar mas informacion-->
<a class="btn-floating pulse activator halfway-fab  red btn-large">
<!-- la clase material-icons es para agregar iconos por defecto de materialize-->
<i class="material-icons">add</i>
</a>
</div>
<!-- la clase card-content es donde se encontrara el contenido de nuestra tarjeta-->
<div class="card-content ">
<!-- la clase card-title es para agregar el titulo resaltandolo de mayore manera en la tarjeta y con activator activandolo tambien para mostrar mas informacion-->
<span class="card-title activator black-text text-darken-4">Área de Jardines<i class="material-icons right">more_vert</i></span>
<p>Esta area con ambiente de naturaleza y elegancia dedicado a celebraciones de area abierta...  </p>
<p><u><a href="eventos.php">Mas informacion</a></u></p>
</div>
<!--La clase card-reveal es quien revela la informacion escondida por medio del acivador-->
<div class="card-reveal blue-grey lighten-3">
      <span class="card-title White-text " >Área de Jardines<i class="material-icons right">close</i></span>
      <h6><b>Descripción:</b></h6>
      <p> Esta area con ambiente de naturaleza y elegancia dedicado a celebraciones de area abierta con luces que hacen ver hermosos detalles en su decoración de noche, dedicado para eventos de novios.</p>
      <p class="white-text">Posibles montajes:</p>
      <p>Cena: 150 invitados</p>
      <p>Auditorio: 200 invitados</p>
     <br>
<p>Para mayor información de click en el siguiente enlace:</p>
      <u><a href="eventos.php">Mas informacion</a></u>
</div>
</div>
</div>
<!--NOTA IMPORTANTE: Los mismos pasos se repiten al ir creando cada una de las tarjetas (Card).-->

<!-- tarjeta 2-->
<div class="col s12 l4 ">
<div class="card hoverable  blue-grey lighten-3">
<div class="card-image ">
<img class="responsive-img" src="img/galeria_img/eje8.jpg" alt="imagen"class="activator">
<a class="btn-floating pulse activator halfway-fab  red btn-large">
<i class="material-icons">add</i>
</a>
</div>
<div class="card-content ">
<span class="card-title activator black-text text-darken-4">Salón Elegant <i class="material-icons right">more_vert</i></span>
<p>Este espacio es un salón muy moderno con mucho toque de elegancia... </p>
     <p><u><a href="eventos.php">Mas informacion</a></u></p>
</div>
<div class="card-reveal blue-grey lighten-3">
      <span class="card-title White-text " >Salón Elegant <i class="material-icons right">close</i></span>
      <h6><b>Descripción:</b></h6>
      <p> Este espacio es un salón muy moderno con mucho toque de elegancia especial y dedicado para fiestas de bodas modernas.</p>
      <p class="white-text">Posibles montajes:</p>
      <p>Cena: 250 invitados</p>
      <p>Auditorio: 300 invitados</p>
      <br>
<p>Para mayor información de click en el siguiente enlace:</p>
      <u><a href="eventos.php">Mas informacion</a></u>
</div>
</div>
</div>

<!-- tarjeta 3-->
<div class="col s12 l4 ">
<div class="card hoverable  blue-grey lighten-3">
<div class="card-image ">
<img class="responsive-img" src="img/galeria_img/eje9.jpg" alt="imagen"class="activator">
<a class="btn-floating pulse activator halfway-fab  red btn-large">
<i class="material-icons">add</i>
</a>
</div>
<div class="card-content ">
<span class="card-title activator black-text text-darken-4">Jardín Principal <i class="material-icons right">more_vert</i></span>
<p>Está area rodeada de nuestros bellos jardines con bellas flores, con amplio espacio...  </p>
      <p><u><a href="eventos.php">Mas informacion</a></u></p>
</div>
<div class="card-reveal blue-grey lighten-3">
      <span class="card-title White-text " >Jardín Principal<i class="material-icons right">close</i></span>
      <h6><b>Descripción:</b></h6>
      <p> Está area rodeada de nuestros bellos jardines con bellas flores, con amplio espacio para un mayor numero de invitados, con un ambiente agradable disfrutando de unos bellos paisajes especiales para sus fotografias y mucha diversión en familia.</p>
      <p class="white-text">Posibles montajes:</p>
      <p>Cena: 450 invitados</p>
      <p>Auditorio: 500 invitados</p>
      <br>
<p>Para mayor información de click en el siguiente enlace:</p>
      <u><a href="eventos.php">Mas informacion</a></u>
</div>
</div>
</div>
</div>
<hr>
<!-- seccion para 15 años-->
<div class="section">
<h3 class=" textosindex center-align">XV AÑOS</h3>
<div class="row">
<div class="col s8 offset-s2 l2 offset-l5 z-depth-5">
              <img src="img/galeria_img/eje15.jpg" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->      
</div>
  </div>
<div class="row">
  <div class="col s10 offset-s1  l4 offset-l4 z-depth-5 pink">
      <div class="card-panel black">
        <p class="white-text textosindex ">Sabemos que este es un momento único en tú vida por eso siempre como organización de eventos estamos para servirte y darte nuestros mejores servicios.
        </p>
      </div>
    </div>
    </div>
<br>
<hr>
<br>
<!--tarjeta 1-->
<div class="row">
<div class="col s12 l4 ">
<div class="card hoverable  red accent-1">
<div class="card-image ">
<img class="responsive-img" src="img/galeria_img/eje4.jpg" alt="imagen"class="activator">
<a class="btn-floating pulse activator halfway-fab  red btn-large">
<i class="material-icons">add</i>
</a>
</div>
<div class="card-content ">
<span class="card-title activator black-text text-darken-4">Área de Jardín<i class="material-icons right">more_vert</i></span>
<p>Una area de espacio abierto en el cual podrá disfrutar de la naturaleza con una decoración... 
      <p><u><a href="eventos.php">Mas informacion</a></u></p>
</div>
<div class="card-reveal red accent-1">
      <span class="card-title Pink-text " >Área de Jardín<i class="material-icons right">close</i></span>
      <h6><b>Descripción:</b></h6>
      <p> Una area de espacio abierto en el cual podrá disfrutar de la naturaleza con una decoración estilo jardín de princesas, disfrutando de un buen clima de su agrado y con amplio espacio. </p>
      <p class="white-text">Posibles montajes:</p>
      <p>Cena: 350 invitados</p>
      <p>Auditorio: 400 invitados</p>
      <br>
<p>Para mayor información de click en el siguiente enlace:</p>
      <u><a href="eventos.php">Mas informacion</a></u>
</div>
</div>
</div>
<!--tarjeta 2-->
<div class="col s12 l4 ">
<div class="card hoverable  red accent-1">
<div class="card-image ">
<img class="responsive-img" src="img/galeria_img/eje5.jpg" alt="imagen"class="activator">
<a class="btn-floating pulse activator halfway-fab  red btn-large">
<i class="material-icons">add</i>
</a>
</div>
<div class="card-content ">
<span class="card-title activator black-text text-darken-4">Salón Regency <i class="material-icons right">more_vert</i></span>
<p>Sofisticado y con el estilo perfecto. Tiene una pequeña pista de baile y tarima para... </p>
      <p><u><a href="eventos.php">Mas informacion</a></u></p>
</div>
<div class="card-reveal red accent-1">
      <span class="card-title Pink-text " >Salón Regency<i class="material-icons right">close</i></span>
      <h6><b>Descripción:</b></h6>
      <p> Sofisticado y con el estilo perfecto. Tiene una pequeña pista de baile y tarima para música o show.</p>
      <p class="white-text">Posibles montajes:</p>
      <p>Cena: 150 invitados</p>
      <p>Auditorio: 200 invitados</p>
      <br>
<p>Para mayor información de click en el siguiente enlace:</p>
      <u><a href="eventos.php">Mas informacion</a></u>
</div>
</div>
</div>

<!--tarjeta 3-->
<div class="row">
<div class="col s12 l4 ">
<div class="card hoverable  red accent-1">
<div class="card-image ">
<img class="responsive-img" src="img/galeria_img/eje6.jpg" alt="imagen"class="activator">
<a class="btn-floating pulse activator halfway-fab  red btn-large">
<i class="material-icons">add</i>
</a>
</div>
<div class="card-content ">
<span class="card-title activator black-text text-darken-4">Salón Majestic<i class="material-icons right">more_vert</i></span>
<p>Describe la elegancia y la comodidad que se puede desear en un evento tan importante...  </p>
      <p><u><a href="eventos.php">Mas informacion</a></u></p>
</div>
<div class="card-reveal red accent-1">
      <span class="card-title Pink-text " >Salón Majestic<i class="material-icons right">close</i></span>
      <h6 ><b>Descripción:</b></h6>
      <p> Describe la elegancia y la comodidad que se puede desear en un evento tan importante, hermoso diseño, con una amplia pista de baile, una decoración inigualable. Cuenta con una escalera de presentación y un privado para estancia de los novios mientras llegan los invitados.</p>
      <p class="white-text">Posibles montajes:</p>
      <p>Cena: 450 invitados</p>
      <p>Auditorio: 550 invitados</p>
<br>
<p>Para mayor información de click en el siguiente enlace:</p>
      <u><a href="eventos.php">Mas informacion</a></u>
</div>
</div>
</div>
</div>
</div>
</div>
<hr>
<!--Graduaciones-->
<div class="section">
<h3 class=" textosindex center-align">GRADUACIÓN</h3>
<div class="row">
<div class="col s8 offset-s2 l2 offset-l5 z-depth-5">
              <img src="img/galeria_img/eje14.jpg" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->      
</div>
  </div>
<div class="row">
  <div class="col s10 offset-s1  l4 offset-l4 z-depth-5 yellow">
      <div class="card-panel black">
        <p class="white-text textosindex ">Sabemos que este es un momento único en tú vida por eso siempre como organización de eventos estamos para servirte y darte nuestros mejores servicios.
        </p>
      </div>
    </div>
    </div>
<br>
<hr>
<br>

<!--tarjeta1 -->
<div class="row">
<div class="col s12 l4 ">
<div class="card hoverable  grey darken-4">
<div class="card-image ">
<img class="responsive-img" src="img/galeria_img/eje10.jpg" alt="imagen"class="activator">
<a class="btn-floating pulse activator halfway-fab  red btn-large">
<i class="material-icons">add</i>
</a>
</div>
<div class="card-content white-text ">
<span class="card-title activator white-text text-darken-4">Salón Embassy<i class="material-icons right">more_vert</i></span>
<p > Amplio y elegante, cuenta con bella iluminación y una gran pista de baile... </p>
      <p><u><a href="eventos.php">Mas informacion</a></u></p>

</div>
<div class="card-reveal grey darken-4 white-text">
      <span class="card-title yellow-text " >Salón Embassy<i class="material-icons right">close</i></span>
      <h6 class="blue-text"><b>Descripción:</b></h6>
      <p>Amplio y elegante, cuenta con bella iluminación y una gran pista de baile.</p>
      <p class="orange-text">Posibles montajes:</p>
      <p>Cena: 350 invitados</p>
      <p>Auditorio: 450 invitados</p>
      <br>
<p>Para mayor información de click en el siguiente enlace:</p>
      <u><a href="eventos.php">Mas informacion</a></u>
</div>
</div>
</div>

<!--tarjeta2 -->
<div class="col s12 l4 ">
<div class="card hoverable  grey darken-4">
<div class="card-image ">
<img class="responsive-img" src="img/galeria_img/eje11.jpg" alt="imagen"class="activator">
<a class="btn-floating pulse activator halfway-fab  red btn-large">
<i class="material-icons">add</i>
</a>
</div>
<div class="card-content white-text ">
<span class="card-title activator white-text text-darken-4">Salón Luxor<i class="material-icons right">more_vert</i></span>
<p > Característico diseño rectangular con agradable adaptación, cuenta con pista de baile...  </p>
      <p><u><a href="eventos.php">Mas informacion</a></u></p>
</div>
<div class="card-reveal grey darken-4 white-text">
      <span class="card-title yellow-text " >Salón Luxor<i class="material-icons right">close</i></span>

      <h6 class="blue-text"><b>Descripción:</b></h6>
      <p> Característico diseño rectangular con agradable adaptación, cuenta con pista de baile.</p>
      <p class="orange-text">Posibles montajes:</p>
      <p>Cena: 250 invitados</p>
      <p>Auditorio: 300 invitados</p>
      <br>
<p>Para mayor información de click en el siguiente enlace:</p>
      <u><a href="eventos.php">Mas informacion</a></u>
</div>
</div>
</div>

<!--tarjeta3 -->
<div class="col s12 l4 ">
<div class="card hoverable  grey darken-4">
<div class="card-image ">
<img class="responsive-img" src="img/galeria_img/eje12.jpg" alt="imagen"class="activator">
<a class="btn-floating pulse activator halfway-fab  red btn-large">
<i class="material-icons">add</i>
</a>
</div>
<div class="card-content white-text ">
<span class="card-title activator white-text text-darken-4">Salón Royal<i class="material-icons right">more_vert</i></span>
<p > Cálido y con un diseño especial para aquellos eventos privados...  </p>
      <p><u><a href="eventos.php">Mas informacion</a></u></p>
</div>
<div class="card-reveal grey darken-4 white-text">
      <span class="card-title yellow-text " >Salón Royal<i class="material-icons right">close</i></span>
      <h6 class="blue-text"><b>Descripción:</b></h6>
      <p> Cálido y con un diseño especial para aquellos eventos privados adecuado para eventos de un grado pequeño de invitados.</p>
      <p class="orange-text">Posibles montajes:</p>
      <p>Cena: 60 invitados</p>
      <p>Auditorio: 50 invitados</p>
      <br>
<p>Para mayor información de click en el siguiente enlace:</p>
      <u><a href="eventos.php">Mas informacion</a></u>
</div>
</div>
</div>
</div>
<hr>
</div>
</div>

<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

<!-- Fin del contenido de la pagina -->
<?php
include("../master/footer.php");
?>
<?php
include("../master/scripts.php");
?>

</body>
</html>