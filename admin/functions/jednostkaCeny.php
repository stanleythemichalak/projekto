<?php

 function jednostkaCenyWybrana($typ){
  $str = '';
  if($typ == 1) $str .= "<option value='0'>Sztuka</option>";
  if($typ == 0) $str .= "<option value='1'>Komplet</option>";
  return $str;
 }
 function jednostkaCeny($typ){
  $str = '';
  $str .= "<select name='jednostkaCeny' style='width:498px;' class='input-text'/>";
  if($typ != -1) $str .= jednostkaCenyWybrana($typ);
    $str .= "<option value='0'>Sztuka</option>
          <option value='1'>Komplet</option>
          ";
  $str .= "</select>";
  return $str;
 }
?>