<?php
session_start();

require 'connection.php';
require 'header.php';

if(!isUserLoggedIn()) { 
?>
    <div class="mb-auto">
    <img src="images/hacking.png" style="height: 40%; margin-top: 100px;" >
    <form style="margin:auto; width: 70%; padding: auto; border-radius: 30px; text-shadow:
    0 0 7px purple;font-family: draw; ">
    <h1 style='color:white; text-align: center;'>Code Platform</h1>
    <h6 style='color:white; text-align: center;'>Register or log in to have access to your free and personal notebooks and your test platform</h6>
    </form>

<!--Se la variabile di sessione non è vuota vuol dire che la registrazione ha avuto successo-->
<?php
}
if(!empty($_SESSION['message'])) {
?>
<div class="alert alert-primary" style="  margin-top: 100px; text-align: center; font-family: draw;"><?=$_SESSION['message']?><h2 style=" color:green; font-size: 100%;"><?= getUserEmail() ?></h2></div>

<?php
//$_SESSION['message'] = '';
}

 if(isUserLoggedIn()) { ?>
<form action="diary.php" method="POST" id="diaryForm">
    <div class="form-group">
          <!--Tasto di salvataggio (OPZIONALE) -->  
    <button class="btn" style=" color:white; font-size:40px;border-radius: 10px;font-family: draw;">Save</button>
    <textarea class='md-textarea form-control' name="diary" id="diary" cols="30" rows="10" style='background-color: rgba(14, 177, 14, 0.555); height: 900px; border-radius: 10px;font-family: text; color:white; width: 100%; margin: 1% 10% 20% 0%; padding-top:5% ' ><?= getUserDiary() ?></textarea>
    </div>
</form> 

 <?php } 
if (!isUserLoggedIn()) {
require 'footer.php';
}
?>
   