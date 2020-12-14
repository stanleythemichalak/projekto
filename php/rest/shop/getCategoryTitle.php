<?php
require_once('../../../admin/config.php');
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
//print_r($request->id);

$sql = "SELECT * FROM linki WHERE id = ?";
$tempArr[] = $request->id;
$stmt = $dbh->prepare($sql);
$stmt->execute($tempArr);
$result = $stmt->fetchAll( PDO::FETCH_ASSOC );
$json = json_encode( $result );
echo $json;
?>