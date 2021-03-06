<?php
require("../lib/page.php");
Page::header("El clima de hoy");
?>
<!-- Se manda a llamar las librerias para que funcionen los gráficos -->
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="../../js/highcharts.js"></script>
<script src="../../js/modules/exporting.js"></script>
<br>
<!--Mostramos el clima-->
<div class="row">
<div class="col s4">
<a target="_blank" href="https://hotelmix.es/weather/san-salvador-5390"><img src="https://w.bookcdn.com/weather/picture/32_5390_1_4_17bc9c_250_13a085_ffffff_ffffff_1_2071c9_ffffff_0_6.png?scode=124&domid=582&anc_id=95085"  alt="booked.net"/></a>
</div>
<div class="col s4">
<a target="_blank" href="https://hotelmix.es/weather/la-libertad-45466"><img src="https://w.bookcdn.com/weather/picture/32_45466_1_4_2bcc71_250_24ae60_ffffff_ffffff_1_2071c9_ffffff_0_6.png?scode=124&domid=582&anc_id=95085"  alt="booked.net"/></a>
</div>
<div class="col s4">
<a target="_blank" href="https://hotelmix.es/weather/santa-tecla-115280"><img src="https://w.bookcdn.com/weather/picture/32_115280_1_4_3658db_250_2a48ba_ffffff_ffffff_1_2071c9_ffffff_0_6.png?scode=124&domid=582&anc_id=95085"  alt="booked.net"/></a>
</div>
</div>
<br>
<br>
<!--Graficos-->
<div class="col s12 m12 l6" id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
</div>
<?php
// Consulta para ver todas las reservas que se han hecho
$query = "SELECT fecha, COUNT(id) FROM re GROUP BY fecha";
$pa = null;
$data = Database::getRows($query, $pa);
?>
<script type="text/javascript">
// Grafico lineal
Highcharts.chart('container', {
chart: {
type: 'line'
},
title: {
text: 'Reservas totales'
},
subtitle: {
text: 'De todos los usuarios'
},
xAxis: {
categories: [
<?php
foreach($data as $row){
print("'".$row[0]."',");
}
?>
]
},
yAxis: {
title: {
text: ' Escala'
}
},
plotOptions: {
line: {
dataLabels: {
enabled: true
},
enableMouseTracking: false
}
},
series: [{
name: 'Fechas',
data: [
<?php
foreach($data as $row){
print("".$row[1].",");
}
?>
]
}]
});
</script>
<br>
<!--Mapa de google-->
<div class="container">
<div class="row">
<h3 class="black-text textosindex center-align">Mi ubicación</h3>
<iframe class="row col s12 m12 l12" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1938.0013245162136!2d-89.21476834193147!3d13.718289197592261!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f63307b7cc71169%3A0x8de8f758b03dfcc0!2sResidencial%20San%20Luis%2C%20San%20Salvador!5e0!3m2!1ses-419!2ssv!4v1616551612099!5m2!1ses-419!2ssv" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe></div>
</div>
<?php
Page::footer();
?>