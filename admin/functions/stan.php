<?php

 function stanWybrany($typ){
  $str = '';
  if($typ == 0) $str .= "<option value='0'>Wybierz stan</option>";
  if($typ == 1) $str .= "<option value='1'>Nowa/ New</option>";
  if($typ == 2) $str .= "<option value='2'>Używana/ used</option>";
  return $str;
 }
 function stan($typ){
  $str = '';
  $str .= "<select name='stan' style='width:498px;' class='stan input-text'/>";
  if($typ != -1) $str .= stanWybrany($typ);
    $str .= "<option value='0'>Wybierz stan</option>
    <option value='1'>Nowa/ New</option>
          <option value='2'>Używana/ Used</option>
          ";
  $str .= "</select>";
  return $str;
 }
?>