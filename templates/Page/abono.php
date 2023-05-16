<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.10.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Http\Exception\NotFoundException;


$this->disableAutoLayout();

$checkConnection = function (string $name) {
  $error = null;
  $connected = false;
  try {
      $connection = ConnectionManager::get($name);
      $connected = $connection->connect();
  } catch (Exception $connectionError) {
      $error = $connectionError->getMessage();
      if (method_exists($connectionError, 'getAttributes')) {
          $attributes = $connectionError->getAttributes();
          if (isset($attributes['message'])) {
              $error .= '<br />' . $attributes['message'];
          }
      }
  }

  if (!$connected) {
      $this->Flash->error(__d('debug_kit', 'Could not connect to {0} database: {1}', $name, $error ?: ''));
  }

  return $connected;
};

$connected = $checkConnection('default');

// Ejecuta una consulta de ejemplo a la base de datos
if ($connected) {
  $connection = ConnectionManager::get('default');
  $results = $connection->query('SELECT b.id as buy_id, b.date, c.id as customer_id, c.name, c.last_name, c.phone, c.credit_limit, c.credit_used, amount as payment_amount FROM buys b '
    . 'JOIN customers c ON c.id = b.customer_id '
    . 'LEFT JOIN customers_buys cb ON cb.buy_id = b.id '
    . 'LEFT JOIN payments p ON p.customer_id = c.id AND p.date = b.date '
    . 'ORDER BY b.id DESC')->fetchAll('assoc');

  
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
  <!-- Cargar las dependencias de Bootstrap -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.3/umd/popper.min.js"></script>
  <script src="https://unpkg.com/feather-icons"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
  <!-- Cargar la biblioteca de iconos Feather -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0pq" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
  <!-- Estilos personalizados -->
  <link rel="stylesheet" type="text/css" href="/css/inicio.css">
  
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">
    <img src='/img/truper.png' alt="Logo"/>
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ff6d00" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Registrar cliente</a>
          <a class="dropdown-item" href="#">Modificar información</a>
          <a class="dropdown-item" href="#">Buscar</a>
          <a class="dropdown-item" href="#">Registrar compra</a>
          <a class="dropdown-item" href="#">Abono</a>
          <a class="dropdown-item" href="#">Historial de abonos</a>
        </div>
      </li>
    </ul>
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="#">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ff6d00" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
            <polyline points="9 22 9 12 15 12 15 22"></polyline>
          </svg>
        </a>
      </li>
    </ul>
  </div>
</nav>
<div class="container mt-4">
  <h2>Informacion del Abono</h2>
  <table class="table table-striped">
  <thead>
    <tr>
      <th>ID Compra</th>
      <th>Fecha</th>
      <th>ID Cliente</th>
      <th>Nombre</th>
      <th>Apellido</th>
      <th>Teléfono</th>
      <th>Límite de crédito</th>
      <th>Crédito utilizado</th>
      <th>Monto de pago</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($results as $row): ?>
      <tr>
        <td><?= $row['buy_id'] ?></td>
        <td><?= $row['date'] ?></td>
        <td><?= $row['customer_id'] ?></td>
        <td><?= $row['name'] ?></td>
        <td><?= $row['last_name'] ?></td>
        <td><?= $row['phone'] ?></td>
        <td><?= $row['credit_limit'] ?></td>
        <td><?= $row['credit_used'] ?></td>
        <td><?= $row['payment_amount'] ?></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
</div>
<div class="lo">
  <img src="/img/logo.jpg" alt="Logo" height="100px">
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper-base.min.js" integrity="sha384-j2CZNz+1q0Zyfzr8RdP2shGc2lCvxRf6CQs8gJsWw3D8NCPXvK/2yJW5fJZbYgf2" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-ITM2XKoXk9M2tn+VBWdJNhvNvNv9kY6zjTH2T0EGJnAmrQodXk/MDI0wZd9z1mXt" crossorigin="anonymous"></script>
</body>
</html>