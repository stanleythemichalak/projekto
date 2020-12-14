<?php 
print_r($_POST);
require("../config.php");
$updateRecordsArray = $_POST['recordsArray'];
	$listingCounter = 1;
	foreach ($updateRecordsArray as $recordIDValue) {
		$query = "UPDATE sizes SET kolejnosc = " . $listingCounter . " WHERE id = " . $recordIDValue ;
		mysql_query($query) or die(mysql_error());;
		$listingCounter = $listingCounter + 1;	
	}
?>