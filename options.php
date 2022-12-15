<?php
session_start();
require 'header.php';
require 'connection.php';
?>

<style>
  #cardOption{
    
    margin-top: 150px;
    margin-bottom: 500px;
    margin-left: 15%;
    width: 70%;
    background-color:  rgba(102, 90, 151, 0.7); ;
    font-family: text;
    color: rgb(32, 32, 186);
  }
  
  
  
</style>



<form action="delete.php" method="POST">
<div class="form-group">
<div class="card text-center justify-content-center " id="cardOption">
  <div class="card-header mb-3">
    Options
  </div>
  <div class="card-body">
    <h5 class="card-title">Want to delete your account?</h5>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
    <button class="btn btn-outline-danger" id="deletebtn">Delete account</button>
  </div>
  <div class="card-footer text-muted" style="color: blue;">
    <? echo date('m.d.y') ?>
  </div>
</div>
</div>
</form>

<?php require 'footer.php'; ?>

