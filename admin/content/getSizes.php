<?php
session_start();
require('../config.php');

print_r($_GET['selected']);

$query = "SELECT * FROM sizes ORDER BY kolejnosc ASC";
$result = mysql_query($query) or die(mysql_error());
while ($row = mysql_fetch_object($result)) {
    if($_GET['selected'] > 0 && $_GET['selected'] == $row->id){
        $selected = 'selected';
    }else {
        $selected = '';
    }
    echo "<option value='$row->id' $selected>$row->size</option>";
}
?>