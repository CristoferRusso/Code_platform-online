<?php
require 'functions.php';

?>


<!doctype html>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.101.0">
    <title>MySecretDiary</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
        crossorigin="anonymous"></script>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/cover/">
    <link rel="stylesheet" href="style.css">
   

  </head>
  <body class="d-flex h-100 text-center">
    
<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
  <header class="mb-auto">
    <div style='font-family: parisienne; color:white; font-size:30px; '>
      <nav class="nav nav-masthead justify-content-center float-md-end">
        <a class="nav-link fw-bold  active" aria-current="page" href="index.php" >Home</a>


        <!-- Se l'utente non è loggato mostra la pagina di registrazione e di login login-->
        <?php if(!isUserLoggedIn()) { ?>
        <a id='nav'class="nav-link fw-bold " href="signedup.php" >Sign up</a>
        <a id='nav'class="nav-link fw-bold " href="login.php" >Login</a>
        <?php } else 
        
        { 
          // Se l'utente è loggato mostrerà il link per il logout
          ?>
          <a id='nav'class="nav-link fw-bold " href="logout.php" >Logout</a>
       <?php }?>


      </nav>
    </div>
  </header>