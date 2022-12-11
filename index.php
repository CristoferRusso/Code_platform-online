<?php
session_start();
require 'connection.php';
require 'header.php';

if(!isUserLoggedIn()) { 
?>
    <div class="mb-auto">
    <img src="images/hacking.png" style="height: 40%; margin-top: 100px;" >
    <form style="margin:auto; width: 70%; padding: auto; border-radius: 30px; text-shadow:
    0 0 7px purple; box-shadow: 0px 0px 60px purple; font-family: draw; ">
    <h1 style='color:white; text-align: center;'>Secret Diary</h1>
    <h6 style='color:white; text-align: center;'>Register or log in to have access to your free and personal diary</h6>
    </form>

<!--Se la variabile di sessione non è vuota vuol dire che la registrazione ha avuto successo-->
<?php
}
if(!empty($_SESSION['message'])) {
?>
<div class="alert alert-primary" style=" width: 100%; margin: auto; text-align: center; font-family: draw;"><?=$_SESSION['message']?><h2 style=" color:green; font-size: 100%;"><?= getUserEmail() ?></h2></div>

<?php
//$_SESSION['message'] = '';
}

 if(isUserLoggedIn()) { ?>
<form action="diary.php" method="POST" id="diaryForm">
    <div class="form-group">
    <textarea class='md-textarea form-control' name="diary" id="diary" cols="30" rows="10" style='background-color: rgba(14, 177, 14, 0.555); height: 500px; border-radius: 10px;font-family: text; color:white; width: 100%; margin: 0% 15% 15% 0%; padding-top:5% ' ><?= getUserDiary() ?></textarea>
  </textarea>
    </div>
  <!--Tasto di salvataggio (OPZIONALE) -->  
  <!--  <div class="form-group"> 
        <button class="btn" style=" color:white; font-size:40px;border-radius: 10px;font-family: parisienne;  margin: auto;">Save</button>
    </div>
</form> -->

 <?php } 

require 'footer.php';
?>
   