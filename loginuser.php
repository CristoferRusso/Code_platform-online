<?php
require 'connection.php';
require 'functions.php';
session_start();

$email= $_POST['email'];
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


$sql = "SELECT email,password FROM users WHERE email =?";
//La funzione prepare prepara la query nella variabile $stm
$stm = $link->prepare($sql);
//In questo modo stiamo dicendo che il parametro che andremo a mettere nella query(?) è di tipo stringa e che il valore che voglia far passare è email
$stm->bind_param('s',($_POST['email']));
//La variabile $res contiene lìesecuzione della query
$res = $stm->execute();
//Va a verificare che ci sono dati nella variabile $res e mostra la quantità di righe ritornate e inserisce il risultato nella variabile $result
$result = $stm->get_result();


//Verifica che i dati presenti in $result siano già presenti nel server e se ci sono restituisce un errore
if($res && $result->num_rows) {
    //Restituisce una stringa con email e password(hash)
    $row =$result->fetch_assoc();

    //Va a verificare che la password inserita($_POST) sia uguale a quella registrata ($row), se è giusta restituisce il messaggio di login e lo riporta in index.php altrimenti lo riporta nella login.php
    if (password_verify($_POST['password'],$row['password'])){
        $_SESSION['message'] = 'You are logged in ' ;
        //Verifica che l'utente è loggato
        $_SESSION['user_email'] = $email;
        //Se l'utente ha scelto remeber me partirà un cookie che gli permetterà di rimanere loggato anche dopo la chiusura del browser(7 giorni)
        if($_POST['remember']) {
            setcookie('user_mail',$_POST['email'],time() + 24*3600*7 );
        }
        header('Location: index.php');


    } else {
        
        $_SESSION['errors'] = 'Wrong email or password';
        header('Location: login.php');
        die();
    }
  
} else {
    $errors .= 'This email does not exist';
}

//Se ci sono errori ritorna nella pagina signedup.php
if(!empty($errors)) {

    $_SESSION['errors'] = $errors;
    header('Location: login.php');
   die();
    
} 

