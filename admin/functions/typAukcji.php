<?php
 function typAukcjiWybrany($typ){
  $str = '';
  if($typ == 0) $str .= "<option value='0'>Oferta sprzedaży</option>";
  if($typ == 1) $str .= "<option value='1'>Oferta kupna</option>";
  return $str;
 }
 function typAukcji($typ){
  $str = '';
  $str .= "<select name='typAukcji' style='width:498px;' class='input-text'/>";
  if($typ != -1) $str .= typAukcjiWybrany($typ);
    $str .= "
          <option value='0'>Oferta sprzedaży</option>
          <option value='1'>Oferta kupna</option>
          ";
  $str .= "</select>";
  return $str;
 }
?>