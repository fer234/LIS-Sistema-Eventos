<?php
// destruimos la sesion y mandamos al usuario al login del dashboard
session_start();
session_destroy();
header("location: ../main/login.php");
?>