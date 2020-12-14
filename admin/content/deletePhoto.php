<?php
session_start();
require('../config.php');
if(isset($_GET['delete'])) {
$sql = "DELETE FROM pliki WHERE prefix = '".$_SESSION['temp']."' AND tytul= '".$_GET['delete']."'";
$result = mysql_query($sql) or die(mysql_error());
unlink("uploads/".$_SESSION['temp']."/".$_GET['delete']."");
}
?>