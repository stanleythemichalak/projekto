<script>
$(document).ready(function(){
<?php if(isset($_GET['show'])) {?>
 $('#loadingDiv').show();
      $.ajax({type: 'post',url: './database/loadDatabase.php',
        data: {strona:0},success: function(html) {  
        $("#database").fadeOut(function(){   
        $(this).html(html).stop(true, true).fadeIn();
        $('#loadingDiv').fadeOut(); });      
        }
        });
   <?php } ?>
});
</script>

<?php
if(!isset($_SESSION['administrator'])) header('Location:../index.php');
echo '<h3 class="tit">Jesteś teraz w trybie zarządzania użytkownikami i administratorami</h3>';

if(isset($_GET['zapisz'])){
if(isset($_POST['superuser'])) $superuser = 1;
else $superuser = 0;
$sql = "UPDATE uzytkownicy SET 
imie = '".mysql_escape_string($_POST['imie'])."',
nazwisko = '".mysql_escape_string($_POST['nazwisko'])."',
mail = '".mysql_escape_string($_POST['mail'])."',
haslo = '".md5($_POST['haslo'])."',
komunikator = '".mysql_escape_string($_POST['komunikator'])."',
telefon = '".mysql_escape_string($_POST['telefon'])."',
administrator = '".$superuser."'
WHERE id = '".$_GET['zapisz']."'";
$result = mysql_query($sql) or die(mysql_error());
header('Location:index.php?module=database&success=1&show=all');
}
if(isset($_GET['add'])){
if(isset($_POST['superuser'])) $superuser = 1;
else $superuser = 0;
$sql = "INSERT INTO uzytkownicy (
data,imie,nazwisko,mail,firma,kraj,telefon,branza,aktywny,ip,www,opis,fax,
mobile,komunikator,mailing,id_firmy,miasto,kod,ulica,premium,haslo,administrator
) VALUES (
'".date('Y-m-d')."',
'".mysql_escape_string($_POST['imie'])."',
'".mysql_escape_string($_POST['nazwisko'])."',
'".mysql_escape_string($_POST['mail'])."',
'".mysql_escape_string($_POST['firma'])."',
'".mysql_escape_string($_POST['kraj'])."',
'".mysql_escape_string($_POST['telefon'])."',
'".mysql_escape_string($_POST['branza'])."',
'1',
'".mysql_escape_string($_POST['ip'])."',
'".mysql_escape_string($_POST['www'])."',
'".mysql_escape_string($_POST['opis'])."',
'".mysql_escape_string($_POST['fax'])."',
'".mysql_escape_string($_POST['mobile'])."',
'".mysql_escape_string($_POST['komunikator'])."',
'".mysql_escape_string($_POST['mailing'])."',
'".mysql_escape_string($_POST['id_firmy'])."',
'".mysql_escape_string($_POST['miasto'])."',
'".mysql_escape_string($_POST['kod'])."',
'".mysql_escape_string($_POST['ulica'])."',
'".mysql_escape_string($_POST['premium'])."',
'".md5($_POST['haslo'])."',
'".$superuser."'
)";
$result = mysql_query($sql) or die(mysql_error());
header('Location:index.php?module=database&success=1&show=all');
}
if(isset($_GET['aktywuj'])){
if($_GET['status']==1) $sql = "UPDATE uzytkownicy SET aktywny=1 WHERE id='".$_GET['aktywuj']."'";
if($_GET['status']==0) $sql = "UPDATE uzytkownicy SET aktywny=0 WHERE id='".$_GET['aktywuj']."'";
$result = mysql_query($sql) or die(mysql_error());
header('Location:index.php?module=database&success=1&show=all');
}
if(isset($_GET['delete'])){
$sql = "DELETE FROM uzytkownicy WHERE id='".$_GET['delete']."'";
$result = mysql_query($sql) or die(mysql_error());
header('Location:index.php?module=database&success=1&show=all');
}
if(isset($_GET['mail'])){ 
$sql_user = "SELECT * FROM uzytkownicy WHERE id = '".$_GET['mail']."'";
$result_user = mysql_query($sql_user) or die(mysql_error());
$row_user = mysql_fetch_object($result_user);
$sql_konto = "SELECT * FROM konta WHERE konto = '".$row_user->zrodlo."'";
$result_konto = mysql_query($sql_konto) or die(mysql_error());
$row_konto = mysql_fetch_object($result_konto);
//header('Location:index.php?module=database&success=1&show=all');
}
if(isset($_GET['edytuj']))
{
$sql = "SELECT * FROM uzytkownicy WHERE id='".$_GET['edytuj']."'";
$result = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_object($result);
if($row->administrator==1)$status = 'checked';
else $status = '';
echo'<fieldset><form action="index.php?module=database&zapisz='.$_GET['edytuj'].'" method="POST">            
<table class="nostyle" style="width:100%;">
<tr><td class="va-top">Imię:</td><td> <input type="text" value="'.$row->imie.'" name="imie" style="width:498px;" class="input-text"></td></tr>
<tr><td class="va-top">Nazwisko:</td><td> <input type="text" value="'.$row->nazwisko.'" name="nazwisko" style="width:498px;" class="input-text"></td></tr>
<tr><td class="va-top">Mail:</td><td> <input type="text" value="'.$row->mail.'" name="mail" style="width:498px;" class="input-text"></td></tr>
<tr><td class="va-top">Telefon:</td><td> <input type="text" value="'.$row->telefon.'" name="telefon" style="width:498px;" class="input-text"></td></tr>
<tr><td class="va-top">Komunikator:</td><td> <input type="text" value="'.$row->komunikator.'" name="komunikator" style="width:498px;" class="input-text"></td></tr>
<tr><td class="va-top">Hasło:</td><td> <input type="text" value="" name="haslo" style="width:498px;" class="input-text"></td></tr>
<tr><td class="va-top">Super użytkownik:</td><td> <input type="checkbox" name="superuser" '.$status.'></td></tr>
<tr><td colspan="2" class="t-left"><input type="submit" class="input-submit" value="Zapisz" /></td></tr> 
</table>       
</form>  </fieldset>    
';
}
elseif(isset($_GET['show']))
{
echo "<div id='loadingDiv' style='display:none;'><img src='design/ajax-loader.gif' ></div><div id='database'></div>";
}          
else{
?>
<script>
$(document).ready(function(){
CKEDITOR.replace( "editor" );
});
</script>
<?php
echo'<fieldset><form action="index.php?module=database&add=new" method="POST">            
<table class="nostyle" style="width:100%;">
<tr><td class="va-top">Imię:</td><td> <input type="text" name="imie" style="width:498px;" class="input-text"></td></tr>
<tr><td class="va-top">Nazwisko:</td><td> <input type="text"  name="nazwisko" style="width:498px;" class="input-text"></td></tr>
<tr><td class="va-top">Mail:</td><td> <input type="text" name="mail" style="width:498px;" class="input-text"></td></tr>
<tr><td class="va-top">Telefon:</td><td> <input type="text" name="telefon" style="width:498px;" class="input-text"></td></tr>
<tr><td class="va-top">Komunikator:</td><td> <input type="text" name="komunikator" style="width:498px;" class="input-text"></td></tr>
<tr><td class="va-top">Hasło:</td><td> <input type="text"  name="haslo" style="width:498px;" class="input-text"></td></tr>
<tr><td class="va-top">Administrator:</td><td> <input type="checkbox" name="superuser"></td></tr> 
<tr><td colspan="2" class="t-left"><input type="submit" class="input-submit" value="Zapisz" /></td></tr> 
</table>       
</form>  </fieldset>    
';
}

   