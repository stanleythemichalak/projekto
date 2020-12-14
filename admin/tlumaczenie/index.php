<?php
if(!isset($_SESSION['administrator'])) header('Location:../index.php');
if(@$_GET['lang']=='pl') $lang='pl';   
if(@$_GET['lang']=='en') $lang='en';   

$tekst = file_get_contents('../includes/lang/'.$lang.'.php');
$grupy = explode("//",$tekst);          
echo "<form action='index.php?module=translation&action=zatwierdz_tlumaczenie&lang=".$_GET['lang']."' method='POST'>";
for($i=1;$i<count($grupy);$i++)
{
$tytul = explode('$',$grupy[$i]);
echo"<fieldset><legend><input type='hidden' name='fieldset_portal_$tytul[0]' value='".$tytul[0]."'>".$tytul[0]."</legend>";
$grupa = explode("'",$grupy[$i]);  

for($j=1;$j<count($grupa);$j=$j+4)
{ 
echo "<div style='width:300px; float:left; text-align:right; margin-right:5px;'>".$grupa[$j].":</div><div style='float:left;'><input type='text' name='$grupa[$j]' value='".$grupa[$j+2]."'></div>";
}
echo "</fieldset>";
}
 
echo "<input type='submit' value='zapisz'></form>";
if(@$_GET['action']=='zatwierdz_tlumaczenie')
{
//$mailing = str_replace('../../../../../../../','http://www.msv.com.pl/',$mailing);
/*foreach ( $_POST as $key => $value )
{
  echo "$key : $value <br>";
//$mailing = str_replace("$lang['$key']=",'http://www.msv.com.pl/',$mailing);
} */
//echo var_dump($_POST);
$zmienne = array_keys($_POST);
$ile = count($zmienne);
$i=0;
$str ='';
$str .='<?php ';
for($i;$i<$ile;$i++)
{
$paragraf =substr($zmienne[$i],0,15);
if($paragraf=='fieldset_portal')
{
$str .= "//".$_POST[$zmienne[$i]]."";
}
else
{
$str .= '$lang[\''.$zmienne[$i].'\']=\''.$_POST[$zmienne[$i]].'\';'."\n";
}
}
//$str = ' ?'.'>';
copy("../includes/lang/$lang.php","../includes/lang/kopia_$lang.php");
file_put_contents("../includes/lang/$lang.php", '');
$dane = $str;
$file = "../includes/lang/$lang.php";
$fp = fopen($file, "a");
flock($fp, 2);
fwrite($fp, $dane);
flock($fp, 3);
fclose($fp); 
header("Location:index.php?module=translation&action=lang&lang=".$_GET['lang']."");

}
ob_end_flush();
?>
