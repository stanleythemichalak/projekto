<?php

 function typLokalizacjiWybrany($typ){
if(@$_SESSION['lang_supermsv']=='_pl') $file='pl';   
if(@$_SESSION['lang_supermsv']=='_en') $file='en';
  include('../includes/lang/'.$file.'.php');
  $str = '';
  if($typ == 0) $str .= "<option value='0'>".$lang['rejon_all_regions']."</option>";
  if($typ == 1) $str .= "<option value='1'>".$lang['rejon_africa']."</option>";
  if($typ == 2) $str .= "<option value='2'>".$lang['rejon_america_central_and_south']."</option>";
  if($typ == 3) $str .= "<option value='3'>".$lang['rejon_america_north']."</option>";
  if($typ == 4) $str .= "<option value='4'>".$lang['rejon_asia_china-taiwan-hkg']."</option>";
  if($typ == 5) $str .= "<option value='5'>".$lang['rejon_asia_indian_sub_continent']."</option>";
  if($typ == 6) $str .= "<option value='6'>".$lang['rejon_asia_japan-korea']."</option>";
  if($typ == 7) $str .= "<option value='7'>".$lang['rejon_asia_south_east']."</option>";
  if($typ == 8) $str .= "<option value='8'>".$lang['rejon_europe_central_and_eastern']."</option>";
  if($typ == 9) $str .= "<option value='9'>".$lang['rejon_europe_western_and_northern']."</option>";
  if($typ == 10) $str .= "<option value='10'>".$lang['rejon_middle_east']."</option>";
  if($typ == 11) $str .= "<option value='11'>".$lang['rejon_oceania']."</option>";
  if($typ == 12) $str .= "<option value='12'>".$lang['rejon_russia_and_central_asia']."</option>";
  return $str;
 }
 function typLokalizacji($typ){
if(@$_SESSION['lang_supermsv']=='_pl') $file='pl';   
if(@$_SESSION['lang_supermsv']=='_en') $file='en';
 include('../includes/lang/'.$file.'.php');
  $str = '';
  $str .= "<select name='typLokalizacji' style='width:498px;' class='input-text'/>";
  if($typ != -1) $str .= typLokalizacjiWybrany($typ);
    $str .= "
          <option value='0'>".$lang['rejon_all_regions']."</option>
          <option value='1'>".$lang['rejon_africa']."</option>
          <option value='2'>".$lang['rejon_america_central_and_south']."</option>
          <option value='3'>".$lang['rejon_america_north']."</option>
          <option value='4'>".$lang['rejon_asia_china-taiwan-hkg']."</option>
          <option value='5'>".$lang['rejon_asia_indian_sub_continent']."</option>
          <option value='6'>".$lang['rejon_asia_japan-korea']."</option>
          <option value='7'>".$lang['rejon_asia_south_east']."</option>
          <option value='8'>".$lang['rejon_europe_central_and_eastern']."</option>
          <option value='9'>".$lang['rejon_europe_western_and_northern']."</option>
          <option value='10'>".$lang['rejon_middle_east']."</option>
          <option value='11'>".$lang['rejon_oceania']."</option>
          <option value='12'>".$lang['rejon_russia_and_central_asia']."</option>
          ";
  $str .= "</select>";
  return $str;
 }
?>