<?php
require 'connection.php';
require 'functions.php';
session_start();


$sql = "DELETE FROM `users` WHERE `users`.`email` = ?";
$stm = $link->prepare($sql);
$email = getUserEmail();
$stm->bind_param('s', $email );
$res = $stm->execute();
$_SESSION['message'] = 'Account delete';
session_destroy();
header('Location: index.php');