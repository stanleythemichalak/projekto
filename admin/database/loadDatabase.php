<script>
$(document).ready(function(){
      $('.strona').click(function(){
       $('#loadingDiv').show();
        var strona = $(this).attr('strona');      
        $.ajax({type: 'post',url: './database/loadDatabase.php',
        data: {strona:strona},success: function(html) {  
        $("#database").fadeOut(function(){   
        $(this).html(html).stop(true, true).show();
        $('#loadingDiv').fadeOut(); });      
        }
        });
         
        });
     });
</script>
<?php
require('../config.php');
echo'              		   				     
    <legend>    
    </legend>	';
if(isset($_POST['strona'])){
 if(isset($_POST['wyniki_na_strone'])){
 $wyniki_na_strone = $_POST['wyniki_na_strone'];
 }
 else{
 $wyniki_na_strone = 1000;
 }
  if($_POST['strona']>0){
    $strona = $_POST['strona'];
    $start = ($strona*$wyniki_na_strone)-$wyniki_na_strone;
  }
  else{ 
    $start=0; 
    $strona=1; 
  } 
}
echo "<p class='msg info'>";
$sql = "SELECT * FROM uzytkownicy";
$result = mysql_query($sql) or die(mysql_error());
$ile_stron = ceil(mysql_num_rows($result)/$wyniki_na_strone);
$ile_klientow = mysql_num_rows($result);
echo "Idź do strony: ";
for($i=0;$i<=$ile_stron;$i++) echo "<a style='cursor:pointer;' class='strona' strona='$i'>$i </a>";
echo"</p>";
echo "<p class='msg info'>Wyników na stronę: <u>$wyniki_na_strone</u> Użytkowników w bazie: <u>$ile_klientow</u></p>";
//echo "<p class='msg info'>Zmień ilość wyników na stronie: <input type='text' name='wyniki_na_strone'></p>";

$sql = "SELECT * FROM uzytkownicy LIMIT $start,$wyniki_na_strone";
$result = mysql_query($sql) or die(mysql_error());
function texttrim($opis)
{
$trimm = substr($opis,0,100);
$trimmed = strip_tags($trimm);
return $trimmed;
}
$i=1;
$class='';
echo'<table style="width:100%;"><tr><th>Imię</th><th>Nazwisko</th><th>Mail</th><th>Telefon</th><th>Akcja</th></tr>';
while ($row = mysql_fetch_object($result))
{
if($i%2==0)$class='class="bg"';
else $class='';
echo"<tr $class><td>$row->imie</td><td>$row->nazwisko</td><td>$row->mail</td><td>$row->telefon</td><td>
<a href='index.php?module=database&edytuj=$row->id'><img src='design/ico-info.gif' alt='edytuj'></a>
<a href='index.php?module=database&delete=$row->id'><img src='design/ico-delete.gif' alt='usun'></a></td></tr>";
$i++;
}
echo '</table>';
?>