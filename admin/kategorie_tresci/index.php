<?php
if(!isset($_SESSION['administrator'])) header('Location:../index.php');
function select($id, $poziom)
{     
 $next_poziom=$poziom+1;
 $str='';
 $sql='SELECT * FROM linki WHERE przypisanie="'.$id.'" ORDER BY kolejnosc ASC';
 $result = mysql_query($sql) or die(mysql_error());
  while($row=mysql_fetch_object($result))
  {
    $str.='<option class="poziom_'.$next_poziom.'" value="'.$row->id.'">- '.$row->tytul_en.'/ '.$row->tytul_pl.'</option>';
    $str.=select($row->id, $next_poziom);
  }
 return $str;
}  
echo ' <p class="msg info">Hasło zabezpiecza całą kategorie - wszystkie podstrony dodane do niej wymagały będą autoryzacji.</p>	';
if(@$_GET['edytuj'])
{
$sql = "SELECT * FROM linki WHERE id='".$_GET['edytuj']."'";
$result = mysql_query($sql) or die(mysql_error());
$row=mysql_fetch_object($result);
echo "
<form method='POST' action='index.php?module=kategorie_tresci&zatwierdz=".$_GET['edytuj']."'>
         <h3 class='tit'>Edytujesz kategorię: <u>$row->tytul_en/ $row->tytul_pl</u></h3>               		   
  <fieldset>				     
    <legend>    
    </legend>	
    <table class='nostyle'>		
      <tr>
        <td class='va-top'>Nazwa grupy linków (en):</td>
      <td><input type='text' value='$row->tytul_en' name='tytul_en' style='width:498px;' class='input-text'></td>
     </tr>
        <tr>
       <tr>
        <td class='va-top'>Nazwa grupy linków (pl):</td>
      <td><input type='text' value='$row->tytul_pl' name='tytul_pl' style='width:498px;' class='input-text'></td>
     </tr>
       <tr>
        <td class='va-top'>Podtytuł (en):</td>
      <td><input type='text' value='$row->podtytul_en' name='podtytul_en' style='width:498px;' class='input-text'></td>
     </tr>
        <tr>
       <tr>
        <td class='va-top'>Podtytuł (pl):</td>
      <td><input type='text' value='$row->podtytul_pl' name='podtytul_pl' style='width:498px;' class='input-text'></td>
     </tr>
        <tr> 
        <td class='va-top'>Link z http:// (en):</td>
      <td><input type='text' value='$row->link_en' name='link_en' style='width:498px;' class='input-text'></td>
     </tr>
      <tr> 
        <td class='va-top'>Link z http:// (pl):</td>
      <td><input type='text' value='$row->link_pl' name='link_pl' style='width:498px;' class='input-text'></td>
     </tr>
     <tr>
        <td class='va-top'>Hasło(opcjonalnie):</td>
      <td><input type='text' value='$row->haslo' name='haslo' style='width:498px;' class='input-text'></td>
     </tr>
 <tr>
        <td class='va-top'>Wybierz poziom:</td>
      <td><select name='przypisanie'> ";
 
echo "<option value='0'>Poziom Główny</option>";
echo select(0,0);
         
      echo"</select></td></tr>
           <tr>						         
        <td colspan='2' class='t-right'>          
          <input type='submit' class='input-submit' value='Zapisz' /></td>					       
      </tr>  
          </table>			   
  </fieldset> 
</form>";
}
else
{
?>

     <form method='POST' action='index.php?module=kategorie_tresci&action=add' enctype="multipart/form-data"> 
        <h3 class="tit">Jesteś teraz w trybie zarządzania kategoriami treści</h3>               		   
  <fieldset>				     
    <legend>    
    </legend>	
    <table class="nostyle">		
      <tr>
        <td class="va-top">Nazwa kategorii (en):</td>
      <td><input type='text' name='tytul_en' style='width:498px;' class="input-text"></td>
     </tr>
     <tr>
        <td class="va-top">Nazwa kategorii (pl):</td>
      <td><input type='text' name='tytul_pl' style='width:498px;' class="input-text"></td>
     </tr>
            <tr>
        <td class='va-top'>Podtytuł (en):</td>
      <td><input type='text' name='podtytul_en' style='width:498px;' class='input-text'></td>
     </tr>
        <tr>
       <tr>
        <td class='va-top'>Podtytuł (pl):</td>
      <td><input type='text' name='podtytul_pl' style='width:498px;' class='input-text'></td>
     </tr>
           <tr>
        <td class='va-top'>Link z http:// (en):</td>
      <td><input type='text' name='link_en' style='width:498px;' class='input-text'></td>
     </tr>
     <tr>
        <td class='va-top'>Link z http:// (pl):</td>
      <td><input type='text' name='link_pl' style='width:498px;' class='input-text'></td>
     </tr>
       <tr>
        <td class="va-top">haslo (opcjonalnie):</td>
      <td><input type='text' name='haslo' style='width:498px;' class="input-text"></td>
     </tr>
 <tr>
        <td class="va-top">Wybierz poziom:</td>
      <td><select name='przypisanie'>
<?php   
echo "<option value='0'>Poziom Główny</option>";
echo select(0,0);
          ?>
      </select></td></tr>
           <tr>						         
        <td colspan="2" class="t-right">          
          <input type="submit" class="input-submit" value="Dodaj" /></td>					       
      </tr>  
          </table>			   
  </fieldset>  
          </form>

<?php
 }
if(@$_GET['action']=='add')
{
 $sql="SELECT * FROM linki";
$result = mysql_query($sql) or die(mysql_error());
$ilosc = mysql_num_rows($result);
if ($_POST['przypisanie']=='0')
{
$poziom = 0;
}
else
{
$poziom=1;
}
if ($ilosc == 0)          
{ $ilosc = 1; }
else
{
 $ilosc++;
}  
$przypisanie = $_POST['przypisanie']+1;   
$sql = "INSERT INTO linki(tytul_en,tytul_pl,podtytul_en,podtytul_pl,tresc,metaopis,metakey,przypisanie,poziom,kolejnosc,haslo,link_en,link_pl) 
VALUES('".mysql_real_escape_string($_POST['tytul_en'])."','".mysql_real_escape_string($_POST['tytul_pl'])."',
'".mysql_real_escape_string($_POST['podtytul_en'])."','".mysql_real_escape_string($_POST['podtytul_pl'])."','".$_POST['metakey']."','".$_POST['metaopis']."','".$_POST['tresc']."','".$_POST['przypisanie']."','".$poziom."','".$ilosc."','".mysql_escape_string($_POST['haslo'])."','".$_POST['link_en']."','".$_POST['link_pl']."')";
$result = mysql_query($sql) or die(mysql_error());   
header('Location:index.php?module=kategorie_tresci&success=1');
}
if(isset($_GET['aktywuj']))
{
if($_GET['status']==1) $sql = "UPDATE linki SET aktywny=1 WHERE id='".$_GET['aktywuj']."'";
if($_GET['status']==0) $sql = "UPDATE linki SET aktywny=0 WHERE id='".$_GET['aktywuj']."'";
$result = mysql_query($sql) or die(mysql_error());
header('Location:index.php?module=kategorie_tresci&success=1');
}
if(isset($_GET['usun']))
{
$sql = "DELETE FROM linki WHERE id='".$_GET['usun']."'";
$result = mysql_query($sql) or die(mysql_error());
header('Location:index.php?module=kategorie_tresci&success=1');
} 
if(isset($_GET['zatwierdz']))
{
$sql = "UPDATE linki SET
tytul_en = '".mysql_real_escape_string($_POST['tytul_en'])."',
tytul_pl = '".mysql_real_escape_string($_POST['tytul_pl'])."',
podtytul_en = '".mysql_real_escape_string($_POST['podtytul_en'])."',
podtytul_pl = '".mysql_real_escape_string($_POST['podtytul_pl'])."',
przypisanie = '".$_POST['przypisanie']."',
haslo = '".mysql_escape_string($_POST['haslo'])."',
link_en = '".$_POST['link_en']."',
link_pl = '".$_POST['link_pl']."'
WHERE id='".$_GET['zatwierdz']."'";
$result = mysql_query($sql) or die(mysql_error());
header('Location:index.php?module=kategorie_tresci&success=1');
}
function menu($id, $poziom)
{     
 $next_poziom=$poziom+1;
 $str='';
 $sql='SELECT * FROM linki WHERE przypisanie="'.$id.'" ORDER BY kolejnosc ASC';
 $result = mysql_query($sql) or die(mysql_error());
 $ilosc = mysql_num_rows($result);
      $i = 0; 
  while($row=mysql_fetch_object($result))
  {    $i++; 

   if($ilosc>1 && $ilosc != $i && $i !=1)
   {
   $str.='<li class="poziom_'.$next_poziom.'">'.$row->tytul_en.'/ '.$row->tytul_pl.'
   <a href="kategorie_tresci/przesun.php?kierunek=up&y='.$row->kolejnosc.'&x='.$row->id.'"><img src="design/dol.gif" alt="Do dołu"></a>
   <a href="kategorie_tresci/przesun.php?kierunek=down&y='.$row->kolejnosc.'&x='.$row->id.'"><img src="design/gora.gif" alt="Do góry"></a>
    <a href="#" onClick="if(window.confirm(\'Czy na pewno usunąć ?\')){window.location=\'index.php?module=kategorie_tresci&success=1&usun='.$row->id.'\';}"><img src="design/ico-delete.gif" alt="usuń"></a>
   <a href="index.php?module=kategorie_tresci&edytuj='.$row->id.'"><img src="design/ico-info.gif" alt="edytuj"></a>';
   if($row->aktywny==1) $str.= '<a href="index.php?module=kategorie_tresci&aktywuj='.$row->id.'&status=0"><img src="design/ico-done.gif" alt="deaktywuj"></a>';
   if($row->aktywny==0) $str.= '<a href="index.php?module=kategorie_tresci&aktywuj='.$row->id.'&status=1"><img src="design/ico-warning.gif" alt="aktywuj"></a>';    
   $str.= '</li>';
   }elseif($ilosc==$i && $ilosc != 1)
   {
   $str.='<li class="poziom_'.$next_poziom.'">'.$row->tytul_en.'/ '.$row->tytul_pl.'              
   <a href="kategorie_tresci/przesun.php?kierunek=down&y='.$row->kolejnosc.'&x='.$row->id.'"><img src="design/gora.gif" alt="Do góry"></a>
  <a href="#" onClick="if(window.confirm(\'Czy na pewno usunąć ?\')){window.location=\'index.php?module=kategorie_tresci&success=1&usun='.$row->id.'\';}"><img src="design/ico-delete.gif" alt="usuń"></a>
   <a href="index.php?module=kategorie_tresci&edytuj='.$row->id.'"><img src="design/ico-info.gif" alt="edytuj"></a>';
   if($row->aktywny==1) $str.= '<a href="index.php?module=kategorie_tresci&aktywuj='.$row->id.'&status=0"><img src="design/ico-done.gif" alt="deaktywuj"></a>';
   if($row->aktywny==0) $str.= '<a href="index.php?module=kategorie_tresci&aktywuj='.$row->id.'&status=1"><img src="design/ico-warning.gif" alt="aktywuj"></a>';    
   $str.= '</li>';
   }elseif($i==1 && $ilosc !=1)
   {
   $str.='<li class="poziom_'.$next_poziom.'">'.$row->tytul_en.'/ '.$row->tytul_pl.'
    <a href="kategorie_tresci/przesun.php?kierunek=up&y='.$row->kolejnosc.'&x='.$row->id.'"><img src="design/dol.gif" alt="Do dołu"></a>
   <a href="#" onClick="if(window.confirm(\'Czy na pewno usunąć ?\')){window.location=\'index.php?module=kategorie_tresci&success=1&usun='.$row->id.'\';}"><img src="design/ico-delete.gif" alt="usuń"></a>
    <a href="index.php?module=kategorie_tresci&edytuj='.$row->id.'"><img src="design/ico-info.gif" alt="edytuj"></a>';
   if($row->aktywny==1) $str.= '<a href="index.php?module=kategorie_tresci&aktywuj='.$row->id.'&status=0"><img src="design/ico-done.gif" alt="deaktywuj"></a>';
   if($row->aktywny==0) $str.= '<a href="index.php?module=kategorie_tresci&aktywuj='.$row->id.'&status=1"><img src="design/ico-warning.gif" alt="aktywuj"></a>';    
   $str.= '</li>';
   }
   else
   {
$str.='<li class="poziom_'.$next_poziom.'">'.$row->tytul_en.'/ '.$row->tytul_pl.'
   <a href="#" onClick="if(window.confirm(\'Czy na pewno usunąć ?\')){window.location=\'index.php?module=kategorie_tresci&success=1&usun='.$row->id.'\';}"><img src="design/ico-delete.gif" alt="usuń"></a>
   <a href="index.php?module=kategorie_tresci&edytuj='.$row->id.'"><img src="design/ico-info.gif" alt="edytuj"></a>';
   if($row->aktywny==1) $str.= '<a href="index.php?module=kategorie_tresci&aktywuj='.$row->id.'&status=0"><img src="design/ico-done.gif" alt="deaktywuj"></a>';
   if($row->aktywny==0) $str.= '<a href="index.php?module=kategorie_tresci&aktywuj='.$row->id.'&status=1"><img src="design/ico-warning.gif" alt="aktywuj"></a>';    
   $str.= '</li>';
   }
$str.=menu($row->id, $next_poziom);
  }
 return $str;
}
 echo ' <fieldset>				     
    <legend>    
    </legend>	<table class="nostyle"><tr><td class="va-top">Dostępne kategorie:</td>'; 
echo'<td><ul>';
 echo menu(0,0);
echo'</ul></td></table></fieldset>';
        ?>  
             