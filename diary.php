<?php
session_start();
require 'connection.php';
require 'functions.php';



$sql = "UPDATE users SET diary=? WHERE email=?";
$stm = $link->prepare($sql);
$email = getUserEmail();
$stm->bind_param('ss', $_POST['diary'], $email );
$res = $stm->execute();
$_SESSION['message'] = '';
header('Location: index.php');

if ($res && $stm->affected_rows>0){
    $_SESSION['message'] = 'You are logged in';
}  else {$_SESSION['errors'] = 'Diary was not updated';}

if(empty($_POST['isAjax'])) {
    header('Location: index.php');
} else {echo $_SESSION['errors'] ?: 1;}


