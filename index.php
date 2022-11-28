<?php
session_start();
require 'connection.php';
require 'header.php';

?>

    <h1 style='font-family: parisienne; font-size: 60px; color:white;margin: auto;text-align: center;'>My Secret Diary</h1>
  

<!--Se la variabile di sessione non è vuota vuol dire che la registrazione ha avuto successo-->
<?php
if(!empty($_SESSION['message'])) {
?>
<div class="alert alert-success" style=" width: 500px; margin: auto; text-align: center; font-family: parisienne;"><?=$_SESSION['message']?><h2 style=" color:green; font-size: 25px;"><?= getUserEmail() ?></h2></div>

<?php
//$_SESSION['message'] = '';
}

 if(isUserLoggedIn()) { ?>
<form action="diary.php" method="POST" id="diaryForm">
    <div class="form-group">
    <textarea class='md-textarea form-control' name="diary" id="diary" cols="30" rows="10" style='background-color: AntiqueWhite; height: 700px; border-radius: 10px;font-family: parisienne; width: 900px; margin: auto;' ><?= getUserDiary() ?></textarea>
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
   

   