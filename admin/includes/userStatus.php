<?php
if(!isset($_SESSION['administrator'])){
echo '<p class="f-right"><a href="index.php?success=0&type=auth_warning" id="logout">Zaloguj się</a></strong></p>';
}else{
echo '<p class="f-right">Uzytkownik: <strong><a href="#">Administrator</a></strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong><a href="index.php?logout=1" id="logout">Wyloguj się</a></strong></p>';
}
?>
