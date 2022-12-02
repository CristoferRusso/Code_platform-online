<?php
session_start();
require 'connection.php';
require 'header.php';

if(!isUserLoggedIn()) { 
?>
    <form style="margin-bottom: 70%;">
    <h1 style='font-family: parisienne; font-size: 60px; color:white; padding-top:15%; text-align: center;'>My Secret Diary</h1>
    <h1 style='font-family: parisienne; font-size: 20px; color:white; text-align: center;'>Register or log in to have access to your free and personal diary</h1>
</form>

<!--Se la variabile di sessione non è vuota vuol dire che la registrazione ha avuto successo-->
<?php
}
if(!empty($_SESSION['message'])) {
?>
<div class="alert alert-success" style=" width: 100%; margin: auto; text-align: center; font-family: parisienne;"><?=$_SESSION['message']?><h2 style=" color:green; font-size: 25px;"><?= getUserEmail() ?></h2></div>

<?php
//$_SESSION['message'] = '';
}

 if(isUserLoggedIn()) { ?>
<form action="diary.php" method="POST" id="diaryForm">
    <div class="form-group">
    <textarea class='md-textarea form-control' name="diary" id="diary" cols="30" rows="10" style='background-color: AntiqueWhite; height: 500px; border-radius: 10px;font-family: parisienne; width: 100%; margin: 0% 15% 15% 0%; padding-top:5% ' ><?= getUserDiary() ?></textarea>
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
   

   