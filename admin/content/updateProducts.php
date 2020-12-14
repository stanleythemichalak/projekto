<?php
require("../config.php");
$updateRecordsArray = $_POST['recordsArray'];

$listingCounter = 1;
foreach ($updateRecordsArray as $recordIDValue) {
    $query = "UPDATE aktualnosci SET kolejnosc = " . $listingCounter . " WHERE id = " . $recordIDValue;
    mysql_query($query) or die('Error, insert query failed');
    $listingCounter = $listingCounter + 1;
}
?>