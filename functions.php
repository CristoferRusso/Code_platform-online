<?php

function isUserLoggedIn() {
    //Verifica che email sia presente nella session o nei cookie e se non c'è ritorna una stringa vuota, in questa maniera sappiamo se l'utente è loggato o no 
    return $_SESSION['user_email'] ?? $_COOKIE['user_email'] ?? '';
}

//Funzione che permette a l'utente di uscire dalla sessione
function logout() {
    session_destroy();
    //In questa maniera il cookie che era impostato a 7 giorni si cancella
    setcookie('user_mail','',time() - 24*3600*7 );
    return $_SESSION['user_email'] ?? $_COOKIE['user_email'] ?? '';
}

function getUserEmail() {

    return $_SESSION['user_email'] ?? $_COOKIE['user_email'] ?? '';
}
  //Recupera il contenuto del diario dell'utente
function getUserDiary() {

$getUser = getUserEmail();   
$diary = '';
$sql = 'SELECT diary FROM users WHERE email =?';
$stm = $GLOBALS['link']->prepare($sql);
$stm->bind_param('s',$getUser);
$stm->bind_result($diary);
$stm->execute();
$stm->fetch();
return $diary;






}




