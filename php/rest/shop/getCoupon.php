<?php
require_once('../../../admin/config.php');
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);

$sql = "SELECT * FROM codes WHERE name = ?";
$tempArr[] = $request->coupon;
$stmt = $dbh->prepare($sql);
 $stmt->execute($tempArr);
$result = $stmt->fetchAll( PDO::FETCH_ASSOC );
$json = json_encode( $result );
echo $json;
?>