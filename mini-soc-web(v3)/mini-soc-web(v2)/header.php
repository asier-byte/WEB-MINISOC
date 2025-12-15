<?php
/**
 * @title: Proyecto integrador Ev01 - Cabecera y barrra de navegación.
 * @description:  Script PHP para la gestión de la sesión de usuario.
 *   Dependiendo si el usuario esta registrado o no, aparecen unas
 *   opciones u otras en la barra de navegación.
 *
 * @version    0.1
 * @author ander_frago@cuatrovientos.org
 */
session_start([
    'cookie_lifetime' => 86400,
]);

// Realizando la llamada al script functions establezco la conexión con base de datos
require_once 'utils/functions.php';
$userstr = ' (Invitado)';
// Gestión de la sesión de usuario
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
    // last request was more than 30 minutes ago
    session_unset();     // unset $_SESSION variable for the run-time 
    session_destroy();   // destroy session data in storage
}
$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp

if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    $loggedin = TRUE;
    $userstr = " ($user)";
} else{
    $loggedin = FALSE;
   
}
?>

<html lang="es">
<head>
    <meta charset="utf-8"/>
    <title>Mini-SOC</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
     <!-- ===== FAVICON ===== -->
    <link rel="icon" type="image/x-icon" href="./assets/img/logo-minisoc.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="./assets/styles/styles.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
    <body>   
        <?php    
        if ($loggedin)
        {
            // En caso de tener una sesión registrada con antelación mostramos las opciones avanzadas de la aplicación
        ?>
<nav class="navbar navbar-expand-md navbar-dark fixed-top">
    <a class="navbar-brand" data-section="home" href="#">Mini-SOC</a>
    <button class="navbar-toggler" data-toggle="collapse" data-target="#navMain">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navMain">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a class="nav-link" data-section="home" href="#home">Inicio</a></li>
            <li class="nav-item"><a class="nav-link" data-section="empresa" href="#empresa">La empresa</a></li>
            <li class="nav-item"><a class="nav-link" data-section="servicios" href="#servicios">Servicios</a></li>
            <li class="nav-item"><a class="nav-link" data-section="equipo" href="#equipo">El equipo</a></li>
            <li class="nav-item"><a class="nav-link" data-section="clientes" href="#clientes">Clientes</a></li>
            <li class="nav-item"><a class="nav-link" data-section="contacto" href="#contacto">Contacto</a></li>
            <li class="nav-item"><a class="nav-link" data-section="logout" href="#logout">Logout</a></li>
        </ul>
    </div>
</nav>
        <?php
        }
        else
        {
            // En caso de ser usuario no registrado, (Invitado)  
        ?>
<nav class="navbar navbar-expand-md navbar-dark fixed-top">
    <a class="navbar-brand" data-section="home" href="#">Mini-SOC</a>
    <button class="navbar-toggler" data-toggle="collapse" data-target="#navMain">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navMain">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a class="nav-link" data-section="home" href="#home">Inicio</a></li>
            <li class="nav-item"><a class="nav-link" data-section="empresa" href="#empresa">La empresa</a></li>
            <li class="nav-item"><a class="nav-link" data-section="servicios" href="#servicios">Servicios</a></li>
            <li class="nav-item"><a class="nav-link" data-section="equipo" href="#equipo">El equipo</a></li>
            <li class="nav-item"><a class="nav-link" data-section="clientes" href="#clientes">Clientes</a></li>
            <li class="nav-item"><a class="nav-link" data-section="contacto" href="#contacto">Contacto</a></li>
            <li class="nav-item"><a class="nav-link" data-section="login" href="#login">Login</a></li>
        </ul>
    </div>
</nav>
        <?php
        }
        ?>
<!-- Bootstrap core JavaScript
================================================== -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" ></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>