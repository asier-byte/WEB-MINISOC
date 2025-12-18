<?php
require_once 'header.php';

if (!isset($_SESSION['user'])) {
  header('Location: login.php');
  exit;
}

// Lee services/.env como KEY=VALUE (muy simple)
$env = [];
$envFile = __DIR__ . '/services/.env';
if (file_exists($envFile)) {
  foreach (file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) as $line) {
    $line = trim($line);
    if ($line === '' || $line[0] === '#') continue;
    if (strpos($line, '=') === false) continue;
    list($k, $v) = explode('=', $line, 2);
    $env[trim($k)] = trim($v, " \t\n\r\0\x0B\"'");
  }
}

// Puertos (si no están en el .env usa estos)
$nextcloudPort  = isset($env['NEXTCLOUD_PORT'])  ? $env['NEXTCLOUD_PORT']  : '8081';
$peppermintPort = isset($env['PEPPERMINT_PORT']) ? $env['PEPPERMINT_PORT'] : '8082';
$letschatPort   = isset($env['LETSCHAT_PORT'])   ? $env['LETSCHAT_PORT']   : '8083';
$moodlePort     = isset($env['MOODLE_PORT'])     ? $env['MOODLE_PORT']     : '8084';

$nextcloud  = "http://localhost:$nextcloudPort";
$peppermint = "http://localhost:$peppermintPort";
$letschat   = "http://localhost:$letschatPort";
$moodle     = "http://localhost:$moodlePort";
?>

<div class="container" style="margin-top:120px;">
  <h2>Acceso a los servicios internos de la empresa:</h2>

  <div class="list-group" style="max-width:520px;">
    <a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center"
       href="<?= $nextcloud ?>" target="_blank">
      Almacenamiento en la nube
      <span class="badge badge-secondary p-2">NextCloud</span>
    </a>

    <a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center"
       href="<?= $peppermint ?>" target="_blank">
      Sistema de incidencias
      <span class="badge badge-primary p-2">Peppermint</span>
    </a>

    <a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center"
       href="<?= $letschat ?>" target="_blank">
      Plataforma de mensajería
      <span class="badge badge-secondary p-2">Lets Chat</span>
    </a>

    <a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center"
       href="<?= $moodle ?>" target="_blank">
      Plataforma educativa
      <span class="badge badge-secondary p-2">Moodle</span>
    </a>
  </div>

  <div class="mt-4">
    <p><strong>Levantar servicios:</strong></p>
    <pre><code>cd services
docker compose --env-file .env up -d</code></pre>
  </div>
</div>
