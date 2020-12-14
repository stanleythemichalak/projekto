<?php
require_once('../../../admin/config.php');
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);

$sql = "SELECT * FROM aktualnosci WHERE cena > 0 ORDER BY id DESC LIMIT 0,4";
$tempArr[] = $request->id;
/*$tempArr[] = $request->startLimit;
$tempArr[] = $request->stopLimit;*/
$stmt = $dbh->prepare($sql);
$stmt->execute($tempArr);
$result = $stmt->fetchAll( PDO::FETCH_ASSOC );

foreach ($result as $index => $entry){
    $tempArrFiles = array();
    $sqlFiles = "SELECT * FROM pliki WHERE prefix = ? ORDER BY kolejnosc";
    $tempArrFiles[] = $entry['prefix'];
    $stmt = $dbh->prepare($sqlFiles);
    $stmt->execute($tempArrFiles);
    $resultFiles = $stmt->fetchAll( PDO::FETCH_ASSOC );
    $result[$index]['files'] = $resultFiles;
}

$json = json_encode( $result );
echo $json;
?>