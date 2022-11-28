<?php
session_start();
require 'functions.php';


//Se via $_POST non viene passato il logout l'utente viene reindirizzato alla pagina index
if(empty($_POST) || empty($_POST['logout'])) {
header('Location: index.php');

}

//Chiama la funzione logout(functions.php) che essegue il logout e reindirizza a login.php
logout();
header('Location: login.php');

