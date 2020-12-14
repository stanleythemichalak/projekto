<?php
     if(isset($_GET['success'])){
     if($_GET['success']==1) 
     if(isset($_GET['type'])){
     if($_GET['type']=='logout_success') echo '<p class="msg done">Zostałeś wylogowany z systemu</p>';
     if($_GET['type']=='logid_success') echo '<p class="msg done">Zostałeś zalogowany do systemu</p>';
     }
     else{
     echo '<p class="msg done">Wykonano pomyślnie</p>';
     }
     if($_GET['success']==0){
     if($_GET['type']=='login_error') echo '<p class="msg error">Niepoprawne hasło - musi składać się z minimum 6 znaków</p>';     
     if($_GET['type']=='auth_warning') echo '<p class="msg warning">Wprowadź login oraz hasło</p>';
     if($_GET['type']=='auth_error') echo '<p class="msg warning">Niepoprawny login lub hasło</p>';
     }
     }
?>