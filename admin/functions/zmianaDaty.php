<?php
function zmiana_daty($data)
{
$str = '';
//$data = explode('-',$data);
switch($data)
{
 case '1':
 $str .= "Stycze�";
 break;
 case '2':
 $str .= "Luty";
 break;
 case '3':
 $str .= "Marzec";
 break;
 case '4':
 $str .="Kwiecie�";
 break;
  case '5':
 $str .="Maj";
 break;
  case '6':
 $str .="Czerwiec";
 break;
  case '7':
 $str .="Lipiec";
 break;
  case '8':
 $str .="Sierpie�";
 break;
  case '9':
 $str .="Wrzesie�";
 break;
  case '10':
 $str .="Pa�dziernik";
 break;
  case '11':
 $str .="Listopad";
 break;
  case '12':
 $str .="Grudzie�";
 break;
}
//$str =$str." ".$data[2];
return $str;
}
?>