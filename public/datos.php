<?php
include("../master/estilos.php");
include("../master/navbar.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos | Reserva</title>
</head>
<body>
<!-- Contenido de la pagina -->
<?php
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$correo = $_POST["correo"];
$telefono = $_POST["tel"];
$dui = $_POST["dui"];
$fecha = $_POST["fecha"];
$evento = $_POST["evento"];
$cantidad = $_POST["cantidad"];
?>
<div class="container">
<div class="row">
<h3 class="textosindex center-align">Resumen de la reserva</h3>
<table>
        <thead>
          <tr>
              <th scope="col">Nombre</th>
              <th scope="col">DUI</th>
              <th scope="col">Telefono</th>
              <th scope="col">Correo</th>
          </tr>
          <tr>
              <th scope="col"><?php echo $nombre?>, <?php echo $apellido?></th>
              <th scope="col"><?php echo $dui?></th>
              <th scope="col"><?php echo $telefono ?></th>
              <th scope="col"><?php echo $correo ?></th>
          </tr>
          <tr>
              <th scope="col">Evento</th>
              <th scope="col">Fecha</th>
              <th scope="col">Personas</th>
              <th scope="col">Revision</th>
          </tr>
        </thead>
        <tbody>
        <tr>
          <th scope="row"><?php echo $evento?></th>
            <td><?php echo $fecha?></td>
            <td><?php echo $cantidad?></td>
            <td>Pendiente de revision</td>
          </tr>
        </tbody>
      </table>
      <div class='row col s12 m12 l12 center-align'>
    <a href='index.php' class='btn waves-effect red'><i class='material-icons'>save</i></a>
  </div>
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