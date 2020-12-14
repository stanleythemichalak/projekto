<?php
 function rrmdir($dir) {
   if (is_dir($dir)) {
     $objects = scandir($dir);
     foreach ($objects as $object) {
       if ($object != "." && $object != "..") {
         if (filetype($dir."/".$object) == "dir") rrmdir($dir."/".$object); else unlink($dir."/".$object);
       }
     }
     reset($objects);
     rmdir($dir);
   }
 } 
rrmdir("content/uploads/".$_GET['usun']."");
$sql = "DELETE FROM aktualnosci WHERE prefix='".$_GET['usun']."'";
$result = mysql_query($sql) or die(mysql_error());
$sql = "DELETE FROM aktualnosci WHERE prefix='".$_GET['usun']."'";
$result = mysql_query($sql) or die(mysql_error());

header('Location:index.php?module=content&success=1&show=all');
?>