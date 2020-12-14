<?php
function httpLink($link){
  $ile = count(explode('http://',$link));
    if($ile == 1) $link = "http://".$link;
  return mysql_real_escape_string($link);
}
?>              