<?php

 function incontermsWybrany($typ){
  $str = '';
  $sql = "SELECT * FROM inconterms ORDER BY kolejnosc";
  $result = mysql_query($sql) or die(mysql_error());
  $row = mysql_fetch_object($result); 
  $str .= "<option value='$row->id'>$row->tytul_en/ $row->tytul_pl</option>";
  return $str;
 }
 function inconterms($typ){
  $str = '';
  $sql = "SELECT * FROM inconterms ORDER BY kolejnosc";
  $result = mysql_query($sql) or die(mysql_error());
  if(mysql_num_rows($result)>0){
  $str .= "<select name='inconterms' style='width:498px;' class='input-text'/>";
  if($typ != -1) $str .= incontermsWybrany($typ);
  while($row = mysql_fetch_object($result)) $str .= "<option value='$row->id'>$row->tytul_en/ $row->tytul_pl</option>";
  $str .= "</select>";
  return $str;
  }
 }
?>