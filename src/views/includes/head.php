<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL;?>public/assets/css/reset.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL;?>public/assets/css/styles.css" />

  <title>Panel</title>
</head>
<body>
  <nav class="nav navbar navbar-dark bg-dark">
    <div class="container-fluid">
      <div class="navbar-header">
        <a  href="<?php echo BASE_URL; ?>" class="navbar-brand">Galeria de Livros</a>
      </div>

      <ul class="nav justify-content-end">
        <?php if ( isset($_SESSION['cLogin']) && !empty($_SESSION['cLogin']) ): ?>
          <li class="nav-item"> <a class="nav-link color-white" href="<?php echo BASE_URL; ?>library">Minha Biblioteca</a> </li>
          <li class="nav-item"> <a class="nav-link color-white" href="<?php echo BASE_URL; ?>sessions/signout">sign out</a></li>
        <?php else: ?>
          <li class="nav-item"> <a class="nav-link color-white" href="<?php echo BASE_URL; ?>register">sign up</a> </li>
          <li class="nav-item"> <a class="nav-link color-white" href="<?php echo BASE_URL; ?>sessions">sign in</a></li>
        <?php endif; ?>
      </ul>
    </div>
  </nav>