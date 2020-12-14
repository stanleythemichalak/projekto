<?php
require_once('../../../admin/config.php');
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);

$sql = "SELECT * FROM linki WHERE przypisanie = 0 AND id != 1 AND id != 27 ORDER BY kolejnosc DESC";
//$tempArr[] = $request->id;
$stmt = $dbh->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll( PDO::FETCH_ASSOC );

foreach ($result as $index => $entry){
    $tempArrFiles = array();
    $sqlFiles = "SELECT * FROM linki WHERE przypisanie = ? ORDER BY kolejnosc";
    $tempArrFiles[] = $entry['id'];
    $stmt = $dbh->prepare($sqlFiles);
    $stmt->execute($tempArrFiles);
    $resultFiles = $stmt->fetchAll( PDO::FETCH_ASSOC );
    $result[$index]['sub'] = $resultFiles;
}

$json = json_encode( $result );
echo $json;
?>