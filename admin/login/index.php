<?php
if(!isset($_SESSION['administrator'])) header('Location:../index.php');
if(@$_GET['action']=='update')
{
if(strlen($_POST['haslo'])>5)
{
$sql = "UPDATE administratorzy SET
        login = '" . mysql_escape_string($_POST['nazwa']) . "',
        pass = '" . md5($_POST['haslo']) . "',
        mail = '" . $_POST['mail'] . "'
        WHERE id = '1'"; 
        $result = mysql_query($sql) or die(mysql_error());
        header('Location:index.php?module=login&success=1');
}
else
{
header('Location:index.php?module=login&success=0&type=login_error');
}
}
$sql = "SELECT * from administratorzy WHERE id='1'";
$result = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_object($result);
        ?>        
<form action='index.php?module=login&action=update' method='post'>  
  <h3 class="tit">Jesteś teraz w trybie edycji danych dostępowych do systemu</h3>               
  <p class="msg info">Pamiętaj aby użyć przynajmniej jednej dużej litery, jednej cyfry oraz żeby hasło składało się z conajmniej 6 znaków  
  </p>			   
  <fieldset>				     
    <legend>    
    </legend>				     
    <table class="nostyle"> 
          <tr>
        <td class="va-top">Wprowadź mail użytkownika:</td>             <td>                
          <input type='text' name='mail' value="<?php echo $row->mail; ?>" style='width:498px;' class="input-text"></td>             
      </tr>             
      <tr>
        <td class="va-top">Wprowadź nazwę użytkownika:</td>             <td>                
          <input type='text' name='nazwa' value="<?php echo $row->login; ?>" style='width:498px;' class="input-text"></td>             
      </tr>
      <tr>              
        <td class="va-top">Wprowadź hasło użytkownika:</td>                         <td>                
          <input type='text' name='haslo' style='width:498px;' class="input-text"></td>            
      </tr>              
      <tr>						         
        <td colspan="2" class="t-right">          
          <input type="submit" class="input-submit" value="Zapisz" /></td>					       
      </tr>      
    </table>			   
  </fieldset>            
</form>