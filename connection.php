<?php

$link = mysqli_connect('localhost','root','06051994Numenor.','mydiary');
if(!mysqli_connect('localhost','root','06051994Numenor.','mydiary')) {
    echo 'ERROR: '.mysqli_connect_error();
} 
 //In alternativa si può creare un oggeto di tipo mysqli
 /* $conn = new mysqli('localhost', 'root', '06051994Numenor.','mydiary');
*/
