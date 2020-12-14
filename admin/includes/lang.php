<?php
if(empty($_SESSION['lang_supermsv'])){
  $_SESSION['lang_supermsv'] = '_en';
}
  if(isset($_GET['lang'])){
    if($_GET['lang']==0) $_SESSION['lang_supermsv'] = '_en';
    if($_GET['lang']==1) $_SESSION['lang_supermsv'] = '_pl';
  }
?>