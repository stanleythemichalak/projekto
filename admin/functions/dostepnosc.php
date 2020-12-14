<?php

 function dostepnoscWybrany($typ){
  $str = '';
  if($typ == 1) $str .= "<option value='1'>Dostępna</option>";
  if($typ == 0) $str .= "<option value='0'>Niedostępna</option>";
  return $str;
 }
 function dostepnosc($typ){
  $str = '';
  $str .= "<select name='dostepnosc' style='width:498px;' class='input-text'/>";
  if($typ != -1) $str .= dostepnoscWybrany($typ);
    $str .= "<option value='1'>Dostępna</option>
          <option value='0'>Niedostępna</option>
          ";
  $str .= "</select>";
  return $str;
 }
?>