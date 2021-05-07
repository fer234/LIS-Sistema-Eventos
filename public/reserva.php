<?php
include("../master/estilos.php");
include("../master/navbar.php");
?>
<html>
<head>
<meta charset="utf-8"/><!-- tipo de escritura para que acepte caracteres especiales -->
<!-- Full calendar -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.6.0/main.css">
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.6.0/main.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.6.0/locales-all.js"></script>
<title> Reservas | 2021 </title>
<script>
/*Aqui le damos forma al calendario*/
document.addEventListener('DOMContentLoaded', function() {
let formulario = document.querySelector("form");
/*AQUI AGREGAMOS EL CALENDARIO PARA QUE APAREZCA*/
var calendarEl = document.getElementById('agenda');
var calendar = new FullCalendar.Calendar(calendarEl, {
initialView: 'dayGridMonth',
locale:"es",
displayEventTime:false,
headerToolbar:{
left:'prev,next today',
center:'title',
right:'dayGridMonth'
},
/*Con esto al darle clic a un dia en especifico, la fecha de ese dia se llenara en el campo de fecha*/
/*Para que el usuario no la tenga que escribir*/
events:"http://localhost/agenda/public/evento/mostrar",
dateClick:function(info){
formulario.reset();
formulario.start.value=info.dateStr;
formulario.end.value=info.dateStr;
$("#evento").modal("show");
},
/*Aqui decimos que la informacion da la base se cargara en el modal si hay algun registro*/
/*Eso sucedera al dar clic a un dia en especifico*/
eventClick:function(info){
var evento=info.event;
console.log(evento);
axios.post("http://localhost/agenda/public/evento/editar/"+info.event.id).
then(
(respuesta)=>{
formulario.id.value=respuesta.data.id;
formulario.title.value=respuesta.data.title;
formulario.descripcion.value=respuesta.data.descripcion;
formulario.start.value=respuesta.data.start;
formulario.end.value=respuesta.data.end;
$("#evento").modal("show");
}
).catch(
error=>{
if(error.response){
console.log(error.response.data);
}
}
)
}
});
/*Funcion para ingresar un registro*/
calendar.render();
document.getElementById("btnGuardar").addEventListener("click", function(){
enviardatos("http://localhost/agenda/public/evento/agregar");
});
/*Funcion para borrar un registro*/
document.getElementById("btnEliminar").addEventListener("click", function(){
enviardatos("http://localhost/agenda/public/evento/borrar/"+formulario.id.value);
});
/*Funcion para modificar un registro*/
document.getElementById("btnModificar").addEventListener("click", function(){
enviardatos("http://localhost/agenda/public/evento/actualizar/"+formulario.id.value);
});
/*Funcion que recibe una url y dependiendo de ella hara peticiones al servidor con ayuda de la API*/
function enviardatos(url){
const datos = new FormData(formulario);
console.log(datos);
console.log(formulario.title.value);
axios.post(url, datos).
then(
(respuesta)=>{
calendar.refetchEvents();
$("#evento").modal("hide");
}
).catch(
error=>{
if(error.response){
console.log(error.response.data);
}
}
)
}
});

</script>
</head>
<body>
<br><br>
<!-- Contenido de la pagina -->
<div class="container">
<div id="agenda"></div>
</div>
<br><br>
<!-- Fin del contenido de la pagina -->
<?php
include("../master/footer.php");
?>
<?php
include("../master/scripts.php");
?>
</body>
</html>