<?php
require_once('../../admin/config.php');
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);

if(isset($request->sort)){
    if($request->sort === 'large'){
        $order = " ORDER BY cena ASC";
    }elseif($request->sort === 'small'){
        $order = " ORDER BY cena DESC";
    }elseif($request->sort === 'old'){
        $order = " ORDER BY id ASC";
    }elseif($request->sort === 'date'){
        $order = " ORDER BY data DESC";
    }else{
        $order = " ORDER BY id DESC";
    }
} else{
    $order = " ORDER BY id DESC";
}

if(isset($request->promotion)){
    $sql = "SELECT * FROM aktualnosci WHERE promocja > 0 AND cena > 0".$order; // dodaj update daty zeby najnowsze były na początku
    $tempArr[] = $request->promotion;
} elseif(isset($request->main)){
    $sql = "SELECT * FROM linki WHERE przypisanie = ? ORDER BY kolejnosc";
    $tempArr[] = $request->id;
    $stmt = $dbh->prepare($sql);
    $stmt->execute($tempArr);
    $result = $stmt->fetchAll( PDO::FETCH_ASSOC );

    foreach ($result as $index => $entry){
        $tempCategoryArr[] = $entry['id'];
    }
    $sql = "SELECT * FROM aktualnosci WHERE poziom IN (".implode(',',$tempCategoryArr).") ".$order;
    $tempArr[] = $request->id;
} else{
    $sql = "SELECT * FROM aktualnosci WHERE poziom = ?".$order;
    $tempArr[] = $request->id;
}

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