<?php

session_start();
require 'connection.php';


//Con questa funzione si impedisce all'utente di accedere a questa pagina(barra di navigazione browser) senza prima aver fatto il login
//if(empty($_POST)); {
  // header('Location: index.php');
  // die();
//}

$errors = '';
if(empty($_POST['email'])) {

    $errors .= 'Email is required <br>';
    
    //Funzione che controlla che il valore inserito sia una email valida 
} else if( !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {

    $errors .= 'Invalid email <br>';

}

if (empty($_POST['password'])) {

    $errors .='Password is required<br>' ;

}
if (strlen($_POST['password']) <6) {

    $errors .='The password must be at least 6 characters long' ;
}






//REGISTRAZIONE UTENTE//
$sql = "SELECT email FROM users WHERE email =?";
//La funzione prepare prepara la query nella variabile $stm
$stm = $link->prepare($sql);
//In questo modo stiamo dicendo che il parametro che andremo a mettere nella query(?) è di tipo stringa e che il valore che voglia far passare è email
$stm->bind_param('s',($_POST['email']));
//Esegue la query
$res = $stm->execute();
//Va a verificare che ci sono dati nella variabile $res e mostra la quantità di righe ritornate e inserisce il risultato nella variabile $result
$result = $stm->get_result();
//Verifica che i dati presenti in $result siano già presenti nel server e se ci sono restituisce un errore
if($res && $result->num_rows) {
    //Se ritorna qualcosa vuol dire che la email già esiste
    $errors .= 'Email alredy exist';
}
$stm->close();
//Se non ci sono errori ritorna nella pagina signedup.php
if(!empty($errors)) {
    $_SESSION['errors'] = $errors;
    header('Location: signedup.php');
   die();
    
} 


//REGISTRAZIONE PASSWORD//

$sql = "INSERT INTO users (email,password) VALUES(?,?)";
$stm = $link->prepare($sql);

//Codifica la password inserita dall'utente
$passHash = password_hash($_POST['password'], PASSWORD_DEFAULT);
//Due stringhe(ss)
$stm->bind_param('ss', $_POST['email'], $passHash);

$res = $stm->execute();

if($res && $stm->affected_rows) {
   
    $_SESSION['messageRegistration'] = 'User registered correctly <br> You can now access your Diary on the home page ' ;
    $_SESSION['user_email'] = $_POST['email'];
    $_SESSION['message'] = 'You are logged in with';
} 
    //VERIFICA UTENTE LOGGATO//
    //Verifica che l'utente è loggato controllando se l'email è stata inserita in sessione
    $_SESSION['user_mail'] =  $_POST['email'];
    header('Location: index.php');
    //Se l'utente ha scelto remeber me partirà un cookie che gli permetterà di rimanere loggato anche dopo la chiusura del browser(7 giorni)
    if($_POST['remember']) {
        setcookie('user_mail',$_POST['email'],time() + 24*3600*7 );
    } else {
    header('Location: signedup.php');
    }






