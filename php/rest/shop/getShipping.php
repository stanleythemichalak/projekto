<?php
require_once('../../../admin/config.php');
$postdata = file_get_contents("php://input");

$sql = "SELECT * FROM shipping ORDER BY kolejnosc DESC";
$stmt = $dbh->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll( PDO::FETCH_ASSOC );

$json = json_encode( $result );
echo $json;
?>