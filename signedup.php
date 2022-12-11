<?php
session_start();
error_reporting(0);
require 'connection.php';
require 'header.php';


?>

<div id='formstyle'>
  <nav class="navbar navbar-expand-md  gb-dark justify-content-center  ">
    <form class='form' style=" margin:5%; width: 400px;   font-size:20px;" action='signup.php' method='POST' id='color'>
      <div class="mb-auto">
        <!--Sezione errori registrazione-->
        <?php
        if (!empty($_SESSION['errors'])) {  ?>

          <div class="alert alert-danger" style=" width: 100%; padding:30px; margin-top:30%"> <?= $_SESSION['errors'] ?></div>

        <?php
          //Se la pagina viene ricaricata il parametro errors si svuota per evitare che ricompaia nel ricaricare la pagina
          $_SESSION['errors'] = '';
        } else if (isUserLoggedIn()) { ?>
          <div class="alert alert-success" style=" width: 100%; padding:30px;"> <?= $_SESSION['messageRegistration'] ?></div>
        <?php
          $_SESSION['errors'] = '';
        }
        ?>

        <img src="images/bionic-eye.png" style='height: 100px;'>
        <h1 class='cover-heading'>Registered</h1>
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control" id="email" name='email' aria-describedby="emailHelp" placeholder='example@gmail.com' style="background-color: rgba(255, 255, 255, 0.6);">
        <div id="color" class="form-text">We'll never share your email with anyone else.</div>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name='password' placeholder='Your password' style="background-color: rgba(255, 255, 255, 0.6)">
      </div>
      <div class="form-group form-check">
        <input value="1" type="checkbox" class="form-check-input" id="exampleCheck1" name='remember'>
        <label class="form-check-label" for="exampleCheck1" id='remember'>Remember me</label>
      </div>
      <button type="submit" class="btn btn-primary">Registered</button>
    </form>
</div>