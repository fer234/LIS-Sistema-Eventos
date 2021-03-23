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
<div class="container">
<!--Inicio del formulario-->
<form method="POST" action="datos.php"autocomplete="off">
    <div class='row'>
    <h3 class="textosindex center-align">Reservar Evento</h3>
    <div class="row">
      <div class="row">
        <div class="input-field col s6">
          <input id="first_name" name="nombre" type="text" class="validate">
          <label for="first_name">Nombres</label>
        </div>
        <div class="input-field col s6">
          <input id="last_name" name="apellido" type="text" class="validate">
          <label for="last_name">Apellidos</label>
        </div>
        <div class="input-field col s6">
          <input id="dui" name="dui" type="text" class="validate">
          <label for="dui">Documento Unico de Identidad</label>
        </div>
        <div class="input-field col s6">
          <input id="tel" name="tel" type="number" class="validate">
          <label for="tel">Telefono</label>
        </div>
        <div class="input-field col s6">
          <input id="email" name="correo" type="email" class="validate">
          <label for="email">Email</label>
        </div>
        <div class="input-field col s6">
          <input id="tel" name="cantidad" type="number" class="validate">
          <label for="tel">Numero de personas</label>
        </div>
      </div>
    <div class="input-field col s6">
        <select class="icons" id="evento" name="evento">
        <option value="eve" disabled selected>Tipo de evento</option>
        <option value="Ejecutiva Deluxe" data-icon="img/i1.jpg">Ejecutiva</option>
        <option value="Boda sencilla" data-icon="img/i2.jpg">Boda</option>
        <option value="Rosas de juventud" data-icon="img/i3.jpg">Quince años</option>
        </select>
        <label>Elige tu mejor opcion</label>
    </div>
        <div class="input-field col s6">
        <input type="text" name="fecha" class="datepicker">
        <label for='fechaf'>Fecha del evento</label>
        </div>
      </div>
  </div>
  <div class='row col s12 m12 l12 center-align'>
    <a href='index.php' class='btn waves-effect red'><i class='material-icons'>cancel</i></a>
    <button type='submit' class='btn waves-effect green'><i class='material-icons'>save</i></button>
  </div>
</div>   
</form>
<!-- Fin del contenido de la pagina -->
<?php
include("../master/footer.php");
?>
<?php
include("../master/scripts.php");
?>
</body>
</html>