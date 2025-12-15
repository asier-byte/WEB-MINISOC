<?php
require_once 'header.php'; 
$error = $user = $pass = "";
// Al pulsar el boton del formulario se recarga la misma página, volviendo a ejecutar este script.
// En caso de que se haya  completado los valores del formulario se verifica la existencia de usuarios en la base de datos
// para los valores introducidos.
if (isset($_POST['email']))
{
  $user = $_POST['email'];
  $pass = $_POST['pass'];
  
  if ($user == "" || $pass == "")
      $error = "Debes completar todos los campos<br>";
  else
  {
      // TODO Esta la consulta de base de datos correspondiente para verificar si el usuario existe
      $result = queryMySQL("SELECT * FROM members WHERE user='$user' AND pass='$pass'");

    if ($result->num_rows == 0)
    {
      $error = "<span class='error'>Email/Contraseña invalida</span><br><br>";
    }
    else
    {
      // TODO Realiza la gestión de la sesión de usuario:
      // Almacena en la variables de sesión user el valore de $user
      $_SESSION["user"]= $user;

      // Control de vida de la sesión antes de que expire
      if (!isset($_SESSION['CREATED'])) {
        $_SESSION['CREATED'] = time();
      } else if (time() - $_SESSION['CREATED'] > 1800) {
        // session started more than 30 minutes ago
        session_regenerate_id(true);    // change session ID for the current session and invalidate old session ID
        $_SESSION['CREATED'] = time();  // update creation time
      }
        
      // En caso de un registro  exitoso 
      // La gestión de usuario en la página principal se hace a través de la variable de sesión
   //   header('Location: index.php');
    }
  }
}
// En caso de que no se haya completado el formulario,
// analizamos si hay variable de sesión almacenada.
else if (isset($_SESSION['user'])){
    // En caso de que exista variable de sesión redireccionamos a la página principal
   //  header('Location: index.php'); 
}
?>

<!-- ================== NAVBAR ================== -->
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

<!-- ================== MAIN CONTENT ================== -->
<main class="container-fluid p-0">

    <!-- ================== INICIO ================== -->
    <section class="view spa-section" id="view-home">
        <header class="hero text-center" style="background-color: #004080; position: relative;">
            <div class="overlay" style="background-color: rgba(0,0,0,0.5);"></div>
            <div class="container text-white hero-content">
                <h1 class="display-4 fw-bold">Mini SOC</h1>
                <p class="lead">Seguridad en tiempo real para redes educativas y pequeñas empresas</p>
            </div>
        </header>

        <section class="section-content py-5 text-center">
            <div class="container">
                <h2 class="mb-4">Bienvenido a Mini SOC Local</h2>
                <p class="mb-3">En Mini SOC Local, nuestra misión es acercar la seguridad informática profesional a entornos educativos y pequeñas organizaciones. Diseñamos soluciones fáciles de entender y de implementar, pensadas para quienes quieren proteger sus redes sin complicaciones.</p>
                <p class="mb-3">Nuestro enfoque combina monitorización continua, educación en seguridad y herramientas de código libre, garantizando que la protección no sea un misterio.</p>
                <p class="mb-3">Desde la instalación hasta la supervisión diaria, Mini SOC Local proporciona un entorno seguro y controlado, ayudando a que docentes, estudiantes y pequeñas empresas puedan concentrarse en su trabajo sin preocuparse por amenazas externas.</p>
                <p class="mb-4">Queremos que cada usuario comprenda la importancia de la seguridad informática y cómo prevenir riesgos de manera proactiva, fomentando un aprendizaje práctico y útil.</p>

                <div class="row row-cols-1 row-cols-md-4 g-4 mt-4">
                    <div class="col">
                        <div class="card h-100 text-center shadow-sm">
                            <img src="./assets/img/seguridad.png" class="card-img-top mx-auto mt-3" alt="Seguridad">
                            <div class="card-body">
                                <h5 class="card-title">Seguridad</h5>
                                <p class="card-text">Priorizamos la protección de tus sistemas y datos en todo momento.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100 text-center shadow-sm">
                            <img src="./assets/img/confianza.png" class="card-img-top mx-auto mt-3" alt="Confianza">
                            <div class="card-body">
                                <h5 class="card-title">Confianza</h5>
                                <p class="card-text">Un entorno confiable, fácil de usar y pensado para tus necesidades.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100 text-center shadow-sm">
                            <img src="./assets/img/educativo.png" class="card-img-top mx-auto mt-3" alt="Educativo">
                            <div class="card-body">
                                <h5 class="card-title">Educativo</h5>
                                <p class="card-text">Aprende sobre seguridad informática mientras proteges tu red.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100 text-center shadow-sm">
                            <img src="./assets/img/innovación.png" class="card-img-top mx-auto mt-3" alt="Innovación">
                            <div class="card-body">
                                <h5 class="card-title">Innovación</h5>
                                <p class="card-text">Aplicamos nuevas ideas y tecnologías abiertas para mantener tus sistemas protegidos.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-5">
                    <p class="lead">Explora nuestra web y descubre cómo Mini SOC puede ayudarte a proteger tu entorno educativo o empresarial.</p>
                    <a class="btn btn-primary btn-lg" data-section="empresa" href="#empresa">Conoce más sobre nosotros</a>
                </div>
            </div>
        </section>
    </section>

    <!-- ================== LA EMPRESA ================== -->
    <section class="view spa-section" id="view-empresa">
        <header class="hero text-center" style="background-color: #004080; position: relative;">
            <div class="overlay" style="background-color: rgba(0,0,0,0.5);"></div>
            <div class="container text-white hero-content py-5">
                <h1 class="display-4 fw-bold">Nuestra empresa</h1>
                <p class="lead">Un SOC adaptado a entornos reales y educativos</p>
            </div>
        </header>

        <section class="section-content py-5">
            <div class="container">
                <!-- Historia -->
                <div class="mb-5 d-flex justify-content-center">
                    <div class="card shadow-lg p-4" style="max-width: 900px; background-color: #f8f9fa; text-align: center;">
                        <h3>Historia</h3>
                        <p>Mini SOC nació con la idea de acercar la seguridad informática profesional a centros educativos y pequeñas empresas, combinando monitorización, educación y herramientas de código libre. Desde su fundación, ha crecido adaptándose a nuevas tecnologías y necesidades educativas.</p>
                    </div>
                </div>

                <!-- Misión, Visión, Valores -->
                <div class="row mb-5">
                    <div class="col-md-4 mb-3">
                        <div class="card h-100 shadow-sm text-center border-primary">
                            <div class="card-body">
                                <div class="mb-3"><i class="fas fa-bullseye fa-2x text-primary"></i></div>
                                <h5 class="card-title">Misión</h5>
                                <p class="card-text">Proporcionar monitorización y detección de amenazas en redes locales usando herramientas libres, de forma sencilla y educativa.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="card h-100 shadow-sm text-center border-success">
                            <div class="card-body">
                                <div class="mb-3"><i class="fas fa-eye fa-2x text-success"></i></div>
                                <h5 class="card-title">Visión</h5>
                                <p class="card-text">Acercar el funcionamiento de un SOC profesional a entornos educativos y pequeñas organizaciones, fomentando la cultura de la seguridad informática.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="card h-100 shadow-sm text-center border-warning">
                            <div class="card-body">
                                <div class="mb-3"><i class="fas fa-heart fa-2x text-warning"></i></div>
                                <h5 class="card-title">Valores</h5>
                                <ul class="list-unstyled">
                                    <li>Seguridad</li>
                                    <li>Transparencia</li>
                                    <li>Aprendizaje continuo</li>
                                    <li>Software libre</li>
                                    <li>Innovación</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Banner motivador -->
                <div class="py-4 mb-5 text-center" style="background-color: #e6f2ff; border-radius: 8px;">
                    <h4 class="mb-3">“Protegemos tus datos y enseñamos a proteger tu futuro digital”</h4>
                    <p>En Mini SOC creemos que la seguridad no solo se aplica a los sistemas, sino también al conocimiento y la educación de quienes los utilizan.</p>
                </div>

                <!-- Organigrama y Localización -->
                <div class="row">
                    <div class="col-md-6">
                        <h3>Organigrama</h3>
                        <img src="./assets/img/organigrama.png" class="img-fluid shadow-sm rounded mb-4" alt="Organigrama de la empresa">
                    </div>
                    <div class="col-md-6">
                        <h3>Localización</h3>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3038.0000000000005!2d-3.703790784593591!3d40.416775779364595!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd42288bb50b06bb%3A0xa28ebbbd5d3d15!2sMadrid!5e0!3m2!1ses!2ses!4v1633020000000!5m2!1ses!2ses" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>
        </section>
    </section>

    <!-- ================== SERVICIOS ================== -->
     
<section class="view spa-section" id="view-servicios">

    <header class="hero text-center py-5" style="background-color: #004080; position: relative;">
        <div class="container text-white">
            <h1 class="display-4 fw-bold">Suscripciones</h1>
            <p class="lead">Elige el plan que mejor se adapte a tus necesidades</p>
        </div>
    </header>
    <section class="section-content py-5">
        <div class="container">
            <div class="row g-4">
                <!-- Suscripción Básica -->
                <div class="col-md-4">
                    <div class="card h-100 text-center shadow-sm hover-scale">
                        <div class="card-body">
                            <h5 class="card-title">Básica</h5>
                            <p class="card-text">Monitorización básica de tu red, alertas de seguridad y soporte por email.</p>
                            <h6 class="card-subtitle mb-2 text-muted">€19/mes</h6>
                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalBasica">Más info</button>
                        </div>
                    </div>
                </div>

                <!-- Suscripción Profesional -->
                <div class="col-md-4">
                    <div class="card h-100 text-center shadow-sm hover-scale">
                        <div class="card-body">
                            <h5 class="card-title">Profesional</h5>
                            <p class="card-text">Incluye todo lo de la Básica, más análisis avanzado de logs y respuesta ante incidentes.</p>
                            <h6 class="card-subtitle mb-2 text-muted">€49/mes</h6>
                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalProfesional">Más info</button>
                        </div>
                    </div>
                </div>

                <!-- Suscripción Premium (Destacada) -->
                <div class="col-md-4">
                    <div class="card h-100 text-center shadow-lg border-primary hover-scale" style="border-width: 2px;">
                        <div class="card-body">
                            <h5 class="card-title">Premium <span class="badge badge-primary">Recomendada</span></h5>
                            <p class="card-text">Incluye todo lo de Profesional, más soporte 24/7, auditorías periódicas y consultoría personalizada.</p>
                            <h6 class="card-subtitle mb-2 text-muted">€99/mes</h6>
                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalPremium">Más info</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </section>

    <!-- ================== MODALES DETALLADOS ================== -->
    <!-- Modal Básica -->
    <div class="modal fade" id="modalBasica" tabindex="-1" role="dialog" aria-labelledby="modalBasicaLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalBasicaLabel">Suscripción Básica</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body text-start">
            <p>La suscripción Básica está diseñada para pequeños entornos que desean protección esencial sin complicaciones. Incluye:</p>
            <ul>
                <li><strong>Monitorización básica de red:</strong> supervisión de dispositivos y servicios críticos.</li>
                <li><strong>Alertas de seguridad:</strong> notificaciones por email ante eventos sospechosos.</li>
                <li><strong>Reportes mensuales resumidos:</strong> visión general del estado de tu red.</li>
                <li><strong>Acceso a soporte básico:</strong> consultas vía email para resolver dudas y problemas menores.</li>
                <li><strong>Actualizaciones periódicas:</strong> mantenimiento y actualizaciones de software incluidas.</li>
            </ul>
            <p>Ideal para escuelas pequeñas, laboratorios o empresas que recién comienzan a implementar medidas de seguridad.</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary">Suscribirse</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal Profesional -->
    <div class="modal fade" id="modalProfesional" tabindex="-1" role="dialog" aria-labelledby="modalProfesionalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalProfesionalLabel">Suscripción Profesional</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body text-start">
            <p>La suscripción Profesional está pensada para organizaciones que necesitan protección avanzada y soporte activo:</p>
            <ul>
                <li>Todo lo incluido en la suscripción Básica.</li>
                <li><strong>Análisis avanzado de logs:</strong> identificación de patrones de amenaza y comportamiento inusual.</li>
                <li><strong>Respuesta ante incidentes en tiempo real:</strong> mitigación rápida de ataques y problemas de seguridad.</li>
                <li><strong>Reportes semanales detallados:</strong> información completa sobre eventos, vulnerabilidades y mejoras sugeridas.</li>
                <li><strong>Soporte prioritario:</strong> atención rápida vía correo electrónico y chat para incidencias críticas.</li>
                <li><strong>Recomendaciones de seguridad personalizadas:</strong> ajustes según las necesidades de la red y dispositivos de la organización.</li>
            </ul>
            <p>Ideal para colegios grandes, laboratorios avanzados o pymes tecnológicas que necesitan mayor control y protección.</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary">Suscribirse</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal Premium -->
    <div class="modal fade" id="modalPremium" tabindex="-1" role="dialog" aria-labelledby="modalPremiumLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalPremiumLabel">Suscripción Premium</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body text-start">
            <p>La suscripción Premium ofrece la máxima protección y servicios avanzados para organizaciones que requieren supervisión continua y consultoría completa:</p>
            <ul>
                <li>Todo lo incluido en la suscripción Profesional.</li>
                <li><strong>Soporte 24/7:</strong> atención inmediata en cualquier momento del día o la noche.</li>
                <li><strong>Auditorías periódicas de seguridad:</strong> revisiones completas del estado de la red y recomendaciones de mejoras.</li>
                <li><strong>Consultoría personalizada:</strong> planificación estratégica de seguridad adaptada a tu organización.</li>
                <li><strong>Integración avanzada con herramientas de monitorización:</strong> dashboards personalizados y alertas automáticas.</li>
                <li><strong>Capacitación y formación del personal:</strong> enseñamos a tu equipo a reconocer y prevenir riesgos.</li>
                <li><strong>Planes de contingencia:</strong> estrategias frente a posibles incidentes de seguridad.</li>
            </ul>
            <p>Perfecto para instituciones educativas grandes, empresas con alta dependencia tecnológica o cualquier organización que busque un SOC completo y profesional.</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary">Suscribirse</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>
</section>

<!-- ================== EQUIPO ================== -->
<section class="view spa-section" id="view-equipo">
    <header class="hero text-center py-5" style="background-color: #004080; position: relative;">
        <div class="container text-white">
            <h1 class="display-4 fw-bold">El equipo</h1>
            <p class="lead">Profesionales de sistemas y ciberseguridad</p>
        </div>
    </header>

    <section class="section-content py-5">
        <div class="container">

            <!-- ===== INTRODUCCIÓN DEL EQUIPO (AÑADIDO) ===== -->
            <div class="text-center mb-5">
                <h3>Nuestro equipo humano</h3>
                <p class="mt-3">
                    El corazón de Mini SOC está formado por un equipo multidisciplinar de profesionales en sistemas,
                    redes y ciberseguridad. Cada miembro aporta experiencia real en entornos educativos y empresariales,
                    combinando conocimientos técnicos con una clara vocación por la formación y la mejora continua.
                </p>
                <p>
                    Trabajamos de forma coordinada para garantizar la protección, disponibilidad y buen funcionamiento
                    de las infraestructuras que gestionamos, ofreciendo no solo seguridad, sino también acompañamiento
                    y confianza a nuestros clientes.
                </p>
                <p class="font-italic text-muted">
                    Haz clic sobre cada perfil para conocer más sobre su experiencia y funciones dentro de Mini SOC.
                </p>
            </div>
            <!-- ===== FIN INTRODUCCIÓN ===== -->

            <!-- Cards del equipo (SIN MODIFICAR) -->
            <div class="row row-cols-1 row-cols-md-3 row-cols-lg-5 g-4 text-center">

                <!-- Card Asier -->
                <div class="col">
                    <div class="card h-100 shadow-sm hover-scale" data-toggle="modal" data-target="#modalAsier" style="cursor:pointer;">
                        <img src="./assets/img/asier.png" class="card-img-top rounded-circle mx-auto mt-3" style="width: 120px; height: 120px; object-fit: cover;" alt="Asier">
                        <div class="card-body">
                            <h5 class="card-title">Asier</h5>
                        </div>
                    </div>
                </div>

                <!-- Card Yago -->
                <div class="col">
                    <div class="card h-100 shadow-sm hover-scale" data-toggle="modal" data-target="#modalYago" style="cursor:pointer;">
                        <img src="./assets/img/yago.png" class="card-img-top rounded-circle mx-auto mt-3" style="width: 120px; height: 120px; object-fit: cover;" alt="Yago">
                        <div class="card-body">
                            <h5 class="card-title">Yago</h5>
                        </div>
                    </div>
                </div>

                <!-- Card Izotz -->
                <div class="col">
                    <div class="card h-100 shadow-sm hover-scale" data-toggle="modal" data-target="#modalIzotz" style="cursor:pointer;">
                        <img src="./assets/img/izotz.png" class="card-img-top rounded-circle mx-auto mt-3" style="width: 120px; height: 120px; object-fit: cover;" alt="Izotz">
                        <div class="card-body">
                            <h5 class="card-title">Izotz</h5>
                        </div>
                    </div>
                </div>

                <!-- Card Jon Ander -->
                <div class="col">
                    <div class="card h-100 shadow-sm hover-scale" data-toggle="modal" data-target="#modalJonander" style="cursor:pointer;">
                        <img src="./assets/img/jonander.png" class="card-img-top rounded-circle mx-auto mt-3" style="width: 120px; height: 120px; object-fit: cover;" alt="Jon Ander">
                        <div class="card-body">
                            <h5 class="card-title">Jon Ander</h5>
                        </div>
                    </div>
                </div>

                <!-- Card Oscar -->
                <div class="col">
                    <div class="card h-100 shadow-sm hover-scale" data-toggle="modal" data-target="#modalOscar" style="cursor:pointer;">
                        <img src="./assets/img/osccar.png" class="card-img-top rounded-circle mx-auto mt-3" style="width: 120px; height: 120px; object-fit: cover;" alt="Oscar">
                        <div class="card-body">
                            <h5 class="card-title">Oscar</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>


<!-- ================== MODALES DEL EQUIPO ================== -->

<!-- Modal Asier -->
<div class="modal fade" id="modalAsier" tabindex="-1" role="dialog" aria-labelledby="modalAsierLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalAsierLabel">Asier - Administrador de Sistemas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4 text-center">
            <img src="./assets/img/asier.png" class="img-fluid rounded-circle mb-3" alt="Asier">
          </div>
          <div class="col-md-8">
            <h5>Resumen profesional</h5>
            <p>Administrador de sistemas con más de 10 años de experiencia en entornos educativos y PYMES. Experto en redes, virtualización y optimización de infraestructuras.</p>
            <h5>Funciones principales</h5>
            <ul>
              <li>Gestión y mantenimiento de servidores y equipos de red</li>
              <li>Configuración y supervisión de entornos virtualizados</li>
              <li>Implementación de políticas de seguridad y backups</li>
              <li>Optimización de recursos y rendimiento de la infraestructura</li>
            </ul>
            <h5>Habilidades</h5>
            <p>Linux, Windows Server, VMware, Docker, Firewall Management, Monitorización de red</p>
            <h5>Contacto</h5>
            <p><strong>Email:</strong> <a href="mailto:asier@mini-soc.com">asier@mini-soc.com</a></p>
            <p><strong>Redes:</strong> 
              <a href="https://www.linkedin.com/in/asier" target="_blank">LinkedIn</a> | 
              <a href="https://twitter.com/asier" target="_blank">Twitter</a> | 
              <a href="https://github.com/asier" target="_blank">GitHub</a>
            </p>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Yago -->
<div class="modal fade" id="modalYago" tabindex="-1" role="dialog" aria-labelledby="modalYagoLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalYagoLabel">Yago - Especialista en Ciberseguridad</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4 text-center">
            <img src="./assets/img/yago.png" class="img-fluid rounded-circle mb-3" alt="Yago">
          </div>
          <div class="col-md-8">
            <h5>Resumen profesional</h5>
            <p>Especialista en ciberseguridad con amplia experiencia en detección y mitigación de amenazas. Experto en análisis de vulnerabilidades y pentesting en entornos educativos y PYMES.</p>
            <h5>Funciones principales</h5>
            <ul>
              <li>Auditorías de seguridad y evaluación de riesgos</li>
              <li>Detección de vulnerabilidades en sistemas y redes</li>
              <li>Desarrollo de políticas de ciberseguridad</li>
              <li>Respuesta rápida ante incidentes de seguridad</li>
            </ul>
            <h5>Habilidades</h5>
            <p>Ethical Hacking, Pentesting, SIEM, IDS/IPS, Firewall, Malware Analysis</p>
            <h5>Contacto</h5>
            <p><strong>Email:</strong> <a href="mailto:yago@mini-soc.com">yago@mini-soc.com</a></p>
            <p><strong>Redes:</strong> 
              <a href="https://www.linkedin.com/in/yago" target="_blank">LinkedIn</a> | 
              <a href="https://twitter.com/yago" target="_blank">Twitter</a> | 
              <a href="https://github.com/yago" target="_blank">GitHub</a>
            </p>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Izotz -->
<div class="modal fade" id="modalIzotz" tabindex="-1" role="dialog" aria-labelledby="modalIzotzLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalIzotzLabel">Izotz - Analista de Redes</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4 text-center">
            <img src="./assets/img/izotz.png" class="img-fluid rounded-circle mb-3" alt="Izotz">
          </div>
          <div class="col-md-8">
            <h5>Resumen profesional</h5>
            <p>Analista de redes encargado de la supervisión y mantenimiento de infraestructuras de red. Garantiza alta disponibilidad y rendimiento en entornos educativos y PYMES.</p>
            <h5>Funciones principales</h5>
            <ul>
              <li>Monitorización de redes y servidores</li>
              <li>Mantenimiento preventivo y correctivo de la infraestructura</li>
              <li>Optimización del rendimiento de red</li>
              <li>Implementación de medidas de seguridad de red</li>
            </ul>
            <h5>Habilidades</h5>
            <p>Cisco, Mikrotik, Firewall, Switches, Routing, Wireshark</p>
            <h5>Contacto</h5>
            <p><strong>Email:</strong> <a href="mailto:izotz@mini-soc.com">izotz@mini-soc.com</a></p>
            <p><strong>Redes:</strong> 
              <a href="https://www.linkedin.com/in/izotz" target="_blank">LinkedIn</a> | 
              <a href="https://twitter.com/izotz" target="_blank">Twitter</a> | 
              <a href="https://github.com/izotz" target="_blank">GitHub</a>
            </p>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Jonander -->
<div class="modal fade" id="modalJonander" tabindex="-1" role="dialog" aria-labelledby="modalJonanderLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalJonanderLabel">Jon Ander - Consultor de Seguridad</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4 text-center">
            <img src="./assets/img/jonander.png" class="img-fluid rounded-circle mb-3" alt="Jonander">
          </div>
          <div class="col-md-8">
            <h5>Resumen profesional</h5>
            <p>Consultor de seguridad encargado de diseñar estrategias y políticas de seguridad para PYMES y centros educativos.</p>
            <h5>Funciones principales</h5>
            <ul>
              <li>Planificación y desarrollo de políticas de seguridad</li>
              <li>Auditorías de infraestructura y seguridad</li>
              <li>Asesoramiento a equipos internos</li>
              <li>Formación en buenas prácticas de ciberseguridad</li>
            </ul>
            <h5>Habilidades</h5>
            <p>ISO 27001, Gestión de riesgos, Políticas de seguridad, Formación</p>
            <h5>Contacto</h5>
            <p><strong>Email:</strong> <a href="mailto:jonander@mini-soc.com">jonander@mini-soc.com</a></p>
            <p><strong>Redes:</strong> 
              <a href="https://www.linkedin.com/in/jonander" target="_blank">LinkedIn</a> | 
              <a href="https://twitter.com/jonander" target="_blank">Twitter</a> | 
              <a href="https://github.com/jonander" target="_blank">GitHub</a>
            </p>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Oscar -->
<div class="modal fade" id="modalOscar" tabindex="-1" role="dialog" aria-labelledby="modalOscarLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalOscarLabel">Oscar - Desarrollador y Soporte</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4 text-center">
            <img src="./assets/img/osccar.png" class="img-fluid rounded-circle mb-3" alt="Oscar">
          </div>
          <div class="col-md-8">
            <h5>Resumen profesional</h5>
            <p>Desarrollador y soporte técnico, responsable de integrar herramientas de monitorización y asistencia a clientes internos y externos.</p>
            <h5>Funciones principales</h5>
            <ul>
              <li>Desarrollo e integración de herramientas de monitorización</li>
              <li>Soporte técnico a usuarios internos y externos</li>
              <li>Gestión de incidencias y resolución de problemas</li>
              <li>Actualización de software y documentación técnica</li>
            </ul>
            <h5>Habilidades</h5>
            <p>Python, Bash, Linux, Monitorización, Soporte técnico, DevOps</p>
            <h5>Contacto</h5>
            <p><strong>Email:</strong> <a href="mailto:oscar@mini-soc.com">oscar@mini-soc.com</a></p>
            <p><strong>Redes:</strong> 
              <a href="https://www.linkedin.com/in/oscar" target="_blank">LinkedIn</a> | 
              <a href="https://twitter.com/oscar" target="_blank">Twitter</a> | 
              <a href="https://github.com/oscar" target="_blank">GitHub</a>
            </p>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>


<!-- ================== CLIENTES ================== -->
<section class="view spa-section" id="view-clientes">
    <header class="hero text-center py-5" style="background-color: #004080; position: relative;">
        <div class="container text-white">
            <h1 class="display-4 fw-bold">Nuestros clientes</h1>
            <p class="lead">Entornos educativos, PYMES y organizaciones que confían en Mini SOC</p>
        </div>
    </header>
    <section class="section-content py-5">
        <div class="container">
            
            <!-- Introducción -->
            <div class="text-center mb-5">
                <h3>Más de 120 organizaciones confían en Mini SOC</h3>
                <p>Desde centros educativos hasta empresas tecnológicas y PYMES, Mini SOC proporciona monitorización, ciberseguridad y soporte continuo. Nuestro objetivo es que cada cliente cuente con un entorno seguro y estable, sin necesidad de complicarse con la gestión de seguridad.</p>
            </div>

            <!-- Tipos de clientes -->
            <div class="row text-center mb-5">
                <div class="col-md-3 mb-3">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Escuelas y universidades</h5>
                            <p class="card-text">Protegemos redes educativas, asegurando privacidad de estudiantes y docentes, además de soporte para laboratorios de informática y aulas virtuales.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Laboratorios de tecnología</h5>
                            <p class="card-text">Monitorizamos entornos de pruebas y laboratorios para garantizar disponibilidad y proteger datos experimentales y de investigación.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">PYMES</h5>
                            <p class="card-text">Acompañamos pequeñas y medianas empresas con protección proactiva, auditorías de seguridad y formación de equipos internos.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Organizaciones públicas</h5>
                            <p class="card-text">Gestionamos infraestructura crítica y datos sensibles de organismos públicos, implementando políticas de ciberseguridad adaptadas a sus necesidades.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Servicios para clientes -->
            <div class="text-center mb-4">
                <h4>Qué hacemos por nuestros clientes</h4>
                <p>Mini SOC no solo protege, sino que también asesora, forma y mantiene en funcionamiento las redes y sistemas de nuestros clientes.</p>
            </div>

            <div class="row text-center mb-5">
                <div class="col-md-3 mb-3">
                    <i class="fas fa-shield-alt fa-3x mb-2 text-primary"></i>
                    <h5>Seguridad 24/7</h5>
                    <p>Monitorización continua y detección de amenazas en tiempo real para evitar incidentes graves.</p>
                </div>
                <div class="col-md-3 mb-3">
                    <i class="fas fa-tools fa-3x mb-2 text-success"></i>
                    <h5>Soporte técnico</h5>
                    <p>Asistencia a usuarios y equipos internos, resolución de incidencias y mantenimiento preventivo.</p>
                </div>
                <div class="col-md-3 mb-3">
                    <i class="fas fa-chalkboard-teacher fa-3x mb-2 text-warning"></i>
                    <h5>Formación y concienciación</h5>
                    <p>Capacitamos al personal sobre buenas prácticas, ciberseguridad y prevención de riesgos.</p>
                </div>
                <div class="col-md-3 mb-3">
                    <i class="fas fa-chart-line fa-3x mb-2 text-danger"></i>
                    <h5>Auditorías y consultoría</h5>
                    <p>Evaluación periódica de infraestructura, políticas de seguridad y recomendaciones personalizadas.</p>
                </div>
            </div>

            <!-- Clientes destacados -->
            <div class="text-center mb-4">
                <h4>Clientes destacados</h4>
                <p>Ofrecemos soluciones adaptadas a cada necesidad. Algunos de nuestros clientes más reconocidos son:</p>
            </div>

            <div class="row justify-content-center g-4 mb-5">
                <div class="col-md-2 col-6 text-center">
                    <img src="./assets/img/acciona.jpeg" class="img-fluid mb-2" alt="Acciona">
                    <p>Acciona</p>
                </div>
                <div class="col-md-2 col-6 text-center">
                    <img src="./assets/img/helphone.png" class="img-fluid mb-2" alt="Helphone">
                    <p>Helphone</p>
                </div>
                <div class="col-md-2 col-6 text-center">
                    <img src="./assets/img/iberdrola-web-2023.jpg" class="img-fluid mb-2" alt="Iberdrola">
                    <p>Iberdrola</p>
                </div>
                <div class="col-md-2 col-6 text-center">
                    <img src="./assets/img/universidadcomplutensemadrid.jpg" class="img-fluid mb-2" alt="Universidad Complutense de Madrid">
                    <p>UCM</p>
                </div>
            </div>

            <!-- Cierre -->
            <div class="mt-5 text-center">
                <p class="lead">En Mini SOC trabajamos para que cada cliente cuente con una infraestructura segura, soporte técnico confiable y asesoramiento experto. Nuestra misión es proteger datos y sistemas, mientras facilitamos la operación diaria sin preocupaciones.</p>
            </div>
            <!-- Certificaciones -->
<div class="text-center mb-4 mt-5">
    <h4>Certificaciones y estándares de seguridad</h4>
    <p>Nuestro equipo y nuestros procesos cumplen con certificaciones reconocidas internacionalmente, garantizando un alto nivel de profesionalidad, buenas prácticas y cumplimiento normativo.</p>
</div>

<div class="row justify-content-center text-center mb-5">
    <!-- CEH -->
    <div class="col-md-3 mb-3">
        <div class="card h-100 shadow-sm">
            <div class="card-body">
                <i class="fas fa-user-shield fa-3x mb-2 text-primary"></i>
                <h5 class="card-title">CEH</h5>
                <img src="./assets/img/CEH.png" 
                     class="img-fluid my-3" 
                     style="max-height: 80px;" 
                     alt="Certified Ethical Hacker">
                <p class="card-text">
                    Certified Ethical Hacker. Especialización en detección de vulnerabilidades y pruebas de intrusión.
                </p>
            </div>
        </div>
    </div>

    <!-- CISSP -->
    <div class="col-md-3 mb-3">
        <div class="card h-100 shadow-sm">
            <div class="card-body">
                <i class="fas fa-shield-alt fa-3x mb-2 text-success"></i>
                <h5 class="card-title">CISSP</h5>
                <img src="./assets/img/CISSP-Certifications.jpg" 
                     class="img-fluid my-3" 
                     style="max-height: 80px;" 
                     alt="CISSP">
                <p class="card-text">
                    Certified Information Systems Security Professional. Gestión avanzada de la seguridad de la información.
                </p>
            </div>
        </div>
    </div>

    <!-- SOC 2 -->
    <div class="col-md-3 mb-3">
        <div class="card h-100 shadow-sm">
            <div class="card-body">
                <i class="fas fa-chart-line fa-3x mb-2 text-warning"></i>
                <h5 class="card-title">SOC 2</h5>
                <img src="./assets/img/SOC-2-Type-2.png" 
                     class="img-fluid my-3" 
                     style="max-height: 80px;" 
                     alt="SOC 2 Compliance">
                <p class="card-text">
                    Cumplimiento de controles de seguridad, disponibilidad y confidencialidad en servicios gestionados.
                </p>
            </div>
        </div>
    </div>

    <!-- ISO 27001 -->
    <div class="col-md-3 mb-3">
        <div class="card h-100 shadow-sm">
            <div class="card-body">
                <i class="fas fa-certificate fa-3x mb-2 text-danger"></i>
                <h5 class="card-title">ISO 27001</h5>
                <img src="./assets/img/isoiec27001.png" 
                     class="img-fluid my-3" 
                     style="max-height: 80px;" 
                     alt="ISO 27001">
                <p class="card-text">
                    Sistema de Gestión de Seguridad de la Información alineado con estándares internacionales.
                </p>
            </div>
        </div>
    </div>
</div>

        </div>
    </section>
</section>



    <!-- ================== CONTACTO ================== -->
<section class="view spa-section" id="view-contacto">
    <header class="hero text-center" style="background-color: #004080; position: relative;">
        <div class="overlay" style="background-color: rgba(0,0,0,0.5);"></div>
        <div class="container text-white py-5">
            <h1 class="display-4 fw-bold">Contacto</h1>
            <p class="lead">¿Tienes una idea o necesitas más información?</p>
        </div>
    </header>

    <section class="section-content py-5">
        <div class="container">

            <div class="row">

                <!-- FORMULARIO DE CONTACTO -->
                <div class="col-md-6 mb-4">
                    <div class="card shadow-lg border-primary h-100">
                        <div class="card-header bg-primary text-white">
                            <h4 class="mb-0"><i class="fas fa-envelope"></i> Formulario de contacto</h4>
                        </div>
                        <div class="card-body">
                            <p>Déjanos tus comentarios o consultas y nos pondremos en contacto contigo.</p>
                            <form>
                                <div class="mb-3">
                                    <label>Nombre</label>
                                    <input class="form-control" id="nombre" required>
                                </div>
                                <div class="mb-3">
                                    <label>Email</label>
                                    <input class="form-control" id="email" type="email" required>
                                </div>
                                <div class="mb-3">
                                    <label>Mensaje</label>
                                    <textarea class="form-control" id="mensaje" rows="4" required></textarea>
                                </div>
                                <button class="btn btn-primary btn-block">Enviar</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- FORMULARIO TRABAJA CON NOSOTROS -->
                <div class="col-md-6 mb-4">
                    <div class="card shadow-lg border-success h-100">
                        <div class="card-header bg-success text-white">
                            <h4 class="mb-0"><i class="fas fa-user-tie"></i> Trabaja con nosotros</h4>
                        </div>
                        <div class="card-body">
                            <p>Si quieres unirte a nuestro equipo, completa el formulario y adjunta tu CV en formato PDF.</p>
                            <form enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label>Nombre completo</label>
                                    <input class="form-control" name="nombre" required>
                                </div>
                                <div class="mb-3">
                                    <label>Email</label>
                                    <input class="form-control" name="email" type="email" required>
                                </div>
                                <div class="mb-3">
                                    <label>Teléfono</label>
                                    <input class="form-control" name="telefono" type="tel" required>
                                </div>
                                <div class="mb-3">
                                    <label>Mensaje adicional</label>
                                    <textarea class="form-control" name="mensaje" rows="3"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label>Adjunta tu CV (PDF)</label>
                                    <input class="form-control" type="file" name="cv" accept="application/pdf" required>
                                </div>
                                <button class="btn btn-success btn-block">Enviar solicitud</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div> <!-- row -->

        </div> <!-- container -->
    </section>
</section>



    <!-- ================== LOGIN ================== -->
    <section class="view spa-section" id="view-login">
       <header class="hero text-center" style="background-color: #004080; position: relative;">
            <div class="overlay" style="background-color: rgba(0,0,0,0.5);"></div>
                <h1 class="display-4 fw-bold">Acceso</h1>
                <p class="lead">Área privada</p>
            </div>
        </header>
<div class="container">
  <form class="form-horizontal" role="form" method="POST" action="login.php">
          <div class="row">
              <div class="col-md-3"></div>
              <div class="col-md-6">
                  <h2>Introduzca detalles del acceso</h2>
                  <hr>
              </div>
          </div>
          <div class="row">
              <div class="col-md-3"></div>
              <div class="col-md-6">
                  <div class="form-group has-danger">
                      <label class="sr-only" for="email">Email:</label>
                      <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                          <div class="input-group-addon" style="width: 2.6rem"></div>
                          <!--
                         TODO Corrige el BUG
                          -->
                          <input type="text" name="email" class="form-control" id="email"
                                 placeholder="yoxti@ejemplo.com" required autofocus>
                      </div>
                  </div>
              </div>
              <div class="col-md-3">
                  <div class="form-control-feedback">
                      <span class="text-danger align-middle">
                          <i class="fa fa-close"></i> <?php  //TODO Muestra el mensaje de error  ?>
                      </span>
                  </div>
              </div>
          </div>
          <div class="row">
              <div class="col-md-3"></div>
              <div class="col-md-6">
                  <div class="form-group">
                      <label class="sr-only" for="pass">Contraseña:</label>
                      <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                          <div class="input-group-addon" style="width: 2.6rem"></div>
                          <input type="password" name="pass" class="form-control" id="password"
                                 placeholder="Contraseña" required>
                      </div>
                  </div>
              </div>
              <div class="col-md-3">
                  <div class="form-control-feedback">
                      <span class="text-danger align-middle">
                     <?php // TODO Muestra el mensaje de error ?>
                      </span>
                  </div>
              </div>
          </div>
          <div class="row" style="padding-top: 1rem">
              <div class="col-md-3"></div>
              <div class="col-md-6">
                  <button type="submit" class="btn btn-success"><i class="fa fa-sign-in"></i> Acceder</button>
              </div>
          </div>
      </form>
  </div>
    </section>

</main>

<!-- ================== FOOTER ================== -->
<footer class="footer">
  <div class="container">
    <div class="row">
        <div class="col-md-4 mb-4">
            <h5 class="text-uppercase mb-3">Mini SOC</h5>
            <p>Centro de Seguridad Operativa adaptado a entornos educativos y pequeñas empresas. Monitorización en tiempo real y respuesta ante incidentes.</p>
            <p><i class="fas fa-envelope me-2"></i>info@mini-soc.com</p>
            <p><i class="fas fa-phone me-2"></i>+34 600 123 456</p>
            <p><i class="fas fa-map-marker-alt me-2"></i>Calle de la Seguridad 12, Madrid, España</p>
        </div>

        <div class="col-md-4 mb-4">
            <h5 class="text-uppercase mb-3">Enlaces</h5>
            <ul class="list-unstyled">
                <li><a href="#home" class="text-white text-decoration-none">Inicio</a></li>
                <li><a href="#empresa" class="text-white text-decoration-none">La empresa</a></li>
                <li><a href="#servicios" class="text-white text-decoration-none">Servicios</a></li>
                <li><a href="#contacto" class="text-white text-decoration-none">Contacto</a></li>
                <li><a href="#login" class="text-white text-decoration-none">Login</a></li>
            </ul>
        </div>

        <div class="col-md-4 mb-4">
            <h5 class="text-uppercase mb-3">Redes sociales</h5>
            <p>Síguenos para estar al día:</p>
            <a href="#" class="social-btn facebook"><span class="icon-circle"><i class="fab fa-facebook-f"></i></span> Facebook</a>
            <a href="#" class="social-btn twitter"><span class="icon-circle"><i class="fab fa-twitter"></i></span> Twitter</a>
            <a href="#" class="social-btn linkedin"><span class="icon-circle"><i class="fab fa-linkedin-in"></i></span> LinkedIn</a>
            <a href="#" class="social-btn instagram"><span class="icon-circle"><i class="fab fa-instagram"></i></span> Instagram</a>
        </div>
    </div>
    <hr class="bg-secondary">
    <div class="text-center mt-3">
        <small>© 2025 Mini SOC. Todos los derechos reservados.</small>
    </div>
  </div>
</footer>

<!-- ================== SCRIPTS ================== -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
<script src="./assets/js/app.js"></script>

</body>
</html>
