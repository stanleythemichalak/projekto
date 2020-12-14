<?php
session_start();
require('../config.php');
$query = "SELECT * FROM colors ORDER BY kolejnosc ASC";
$result = mysql_query($query) or die(mysql_error());
while ($row = mysql_fetch_object($result)) {
    echo "<option value='$row->id'>$row->name</option>";
}
?>