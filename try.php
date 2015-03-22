<?php
session_start();

// Reset to 1
if(isset($_POST['reset'])){unset($_SESSION['number']);}

// Set or increment session number only if button is clicked.
if(empty($_SESSION['number'])){
    $_SESSION['number']=1;
}elseif(isset($_POST['next'])){
    $_SESSION['number']++;
}

echo '
<form action="try.php" method="POST">
   <input class="big_b" type="submit" name="next" value="Next" /> 
   <input type="submit" name="reset" value="Reset" /> 
</form>';

echo $_SESSION['number'];
?>