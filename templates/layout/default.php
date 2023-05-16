<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'La Caridad';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">

    <?= $this->Html->css(['normalize.min', 'milligram.min', 'cake']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <style>
#lo {
  display: block;
  margin: 0 auto;
}

        #menu {
  background-color: #455A64;
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 10px 20px;
}

#menu .navbar-brand {
  font-size: 18px;
  font-weight: bold;
  color: white;
  text-decoration: none;
}

#menu .navbar-nav {
  display: flex;
  justify-content: flex-end;
}

#menu .nav-item {
  margin-right: 20px;
}

#menu .nav-link {
  font-size: 18px;
  font-weight: bold;
  color: white;
  text-decoration: none;
}

#menu .dropdown-menu {
  background-color: #fff;
  padding: 0;
  border: none;
  border-radius: 0;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
  min-width: 200px;
  overflow: hidden;
}

#menu .dropdown-item:hover {
  background-color: #ff6d00;
  color: #ffffff;
}
.navbar-brand {
position: absolute;
left: 50%;
transform: translateX(-50%);
}
.navbar-brand {
display: flex;
align-items: center;
}
button,
input[type="submit"],
input[type="button"],
input[type="reset"] {
  background-color: #FF6D00;
  color: #FF6D00;
}

    </style>
</head>
<body>
<nav id="menu">
  <img src='/img/truper.png' alt="Logo" id="lo"/>
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
        <a class="dropdown-item"  href="http://localhost:8765/customers/index">Clientes</a>
          <a class="dropdown-item" href="http://localhost:8765/buys/index">Compras</a>
          <a class="dropdown-item" href="http://localhost:8765/payments/index">Pagos</a>
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
</nav>

    <main class="main">
        <div class="container">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>
    <footer>
    </footer>
</body>
</html>
