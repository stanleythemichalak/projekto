<?php
session_start();

//print_r($_POST);

require('../config.php');
include('../functions/permalink.php');
include('../functions/zmiana_rozmiaru_zdjec.php');

if(count($_POST['material']) > 0) {
 for ($i = 0; $i < count($_POST['material']); $i += 1) {
  $fabrics[] = $_POST['material'][$i] . ',' . $_POST['wartosc'][$i];
 }
 $fabrics = implode('|', $fabrics);
} else {
 $fabrics = '';
}

if(count($_POST['material']) > 0) {
 for ($i = 0; $i < count($_POST['size']); $i += 1) {
  $parameters[] = $_POST['size'][$i] . ',' . $_POST['color'][$i] . ',' . $_POST['ilosc'][$i];
 }
 $parameters = implode('|', $parameters);
} else {
 $parameters = '';
}

$sql = "SELECT * FROM aktualnosci WHERE prefix = '".$_SESSION['temp']."'";
$result = mysql_query($sql) or die(mysql_error());
if(mysql_num_rows($result)>0){
 $sql = "UPDATE aktualnosci SET tytul_en = '".mysql_real_escape_string($_POST['tytul_en'])."',tytul_pl = '".mysql_real_escape_string($_POST['tytul_pl'])."',
 podtytul_en = '".mysql_real_escape_string($_POST['podtytul_en'])."',podtytul_pl = '".mysql_real_escape_string($_POST['podtytul_pl'])."',
 opis_en = '".mysql_real_escape_string($_POST['opis_en'])."',opis_pl = '".mysql_real_escape_string($_POST['opis_pl'])."',
 meta_tytul_en = '".mysql_real_escape_string($_POST['meta_tytul_en'])."',meta_tytul_pl = '".mysql_real_escape_string($_POST['meta_tytul_pl'])."',
 meta_slowa_en = '".mysql_real_escape_string($_POST['meta_slowa_en'])."',meta_slowa_pl = '".mysql_real_escape_string($_POST['meta_slowa_pl'])."',
 meta_opis_en = '".mysql_real_escape_string($_POST['meta_opis_en'])."',meta_opis_pl = '".mysql_real_escape_string($_POST['meta_opis_pl'])."',
 special = '".mysql_real_escape_string($_POST['special'])."', data = '".mysql_real_escape_string($_POST['data'])."',
 sklad = '".mysql_real_escape_string($fabrics)."',
 pranie = '".mysql_real_escape_string($_POST['pranie'])."',
 parametry = '".mysql_real_escape_string($parameters)."',
 cena = '".mysql_real_escape_string($_POST['cena'])."',
 promocja = '".mysql_real_escape_string($_POST['promocja'])."',
 poziom = '".$_POST['poziom']."',
 cennik = '".$_POST['cennik']."' WHERE prefix = '".$_SESSION['temp']."'";
 $result = mysql_query($sql) or die(mysql_error());
}
else{
 $sql = "INSERT INTO aktualnosci (tytul_en,tytul_pl,podtytul_en,podtytul_pl,opis_en,opis_pl,meta_tytul_en,meta_tytul_pl,
 meta_slowa_en,meta_slowa_pl,meta_opis_en,meta_opis_pl,prefix,poziom,data,special,sklad,pranie,parametry,cena,promocja,cennik)
 VALUES ('".mysql_real_escape_string($_POST['tytul_en'])."','".mysql_real_escape_string($_POST['tytul_pl'])."',
 '".mysql_real_escape_string($_POST['podtytul_en'])."','".mysql_real_escape_string($_POST['podtytul_pl'])."',
 '".mysql_real_escape_string($_POST['opis_en'])."','".mysql_real_escape_string($_POST['opis_pl'])."',
 '".mysql_real_escape_string($_POST['meta_tytul_en'])."','".mysql_real_escape_string($_POST['meta_tytul_pl'])."',
 '".mysql_real_escape_string($_POST['meta_slowa_en'])."','".mysql_real_escape_string($_POST['meta_slowa_pl'])."',
 '".mysql_real_escape_string($_POST['meta_opis_en'])."','".mysql_real_escape_string($_POST['meta_opis_pl'])."',
 '".$_SESSION['temp']."','".$_POST['poziom']."','".mysql_real_escape_string($_POST['data'])."','".mysql_real_escape_string($_POST['special'])."',
 '".mysql_real_escape_string($fabrics)."','".mysql_real_escape_string($_POST['pranie'])."','".mysql_real_escape_string($parameters)."',
 '".mysql_real_escape_string($_POST['cena'])."','".mysql_real_escape_string($_POST['promocja'])."','".$_POST['cennik']."')";
 $result = mysql_query($sql) or die(mysql_error());
}

$kolejnosc = 0;
$UploadDirectory = 'uploads/'; 

$addr = "uploads/". $_SESSION['temp'] ."/";
if(file_exists($addr)){
 $UploadDirectory = "uploads/". $_SESSION['temp'] ."/";
}
else{
 $dir = "uploads/".$_SESSION['temp'];
 mkdir($dir,0755,true);
 $UploadDirectory = "uploads/". $_SESSION['temp'] ."/";
}

if (!@file_exists($UploadDirectory)) {
 die("Make sure Upload directory exist!");
}

if($_POST) {	
 if(!isset($_POST['mName']) || strlen($_POST['mName'])<1){
  die();
 }
 
 if(!isset($_FILES['mFile'])){
  die();
 }

//print_r($_FILES['mFile']['tmp_name']);
 foreach($_FILES['mFile']['tmp_name'] as $key => $tmp_name){
  $FileName = strtolower($_FILES['mFile']['name'][$key]); //uploaded file name
  $FileTitle = toPermalink(mysql_real_escape_string($_POST['tytul_en'])); // file title
  $ImageExt = substr($FileName, strrpos($FileName, '.')); //file extension
  $FileType = $_FILES['mFile']['type'][$key]; //file type
  $FileSize = $_FILES['mFile']["size"][$key]; //file size
  $RandNumber = rand(0, 9999999999); //Random number to make each filename unique.
  $uploaded_date = date("Y-m-d H:i:s");
  $NewFileName = preg_replace(array('/\s/', '/\.[\.]+/', '/[^\w_\.\-]/'), array('_', '.', ''), strtolower($FileTitle));
  $NewFileName = $NewFileName.'_'.$RandNumber.$ImageExt;
    
  if(move_uploaded_file($_FILES['mFile']["tmp_name"][$key], $UploadDirectory . $NewFileName )) {
   if($FileType == 'jpeg' || $FileType == 'jpg' || $FileType == 'JPG' || $FileType == 'JPEG'){
//    zmiana_rozmiaru($UploadDirectory . $NewFileName,1280,1280);
   }
   $sql = "SELECT * FROM pliki WHERE prefix='".$_SESSION['temp']."'";
   $result = mysql_query($sql) or die(mysql_error());
   $kolejnosc = mysql_num_rows($result) + 1;
   $sql = "INSERT INTO pliki (tytul,prefix,kolejnosc) VALUES ('".$NewFileName."','".$_SESSION['temp']."',$kolejnosc)";
   $result = mysql_query($sql) or die(mysql_error());		
  }else{
   die('error uploading File!');
  }
 }
}

function upload_errors($err_code) {
	switch ($err_code) { 
	case UPLOAD_ERR_INI_SIZE: 
	    return 'The uploaded file exceeds the upload_max_filesize directive in php.ini'; 
	case UPLOAD_ERR_FORM_SIZE: 
	    return 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form'; 
	case UPLOAD_ERR_PARTIAL: 
	    return 'The uploaded file was only partially uploaded'; 
	case UPLOAD_ERR_NO_FILE: 
	    return 'No file was uploaded'; 
	case UPLOAD_ERR_NO_TMP_DIR: 
	    return 'Missing a temporary folder'; 
	case UPLOAD_ERR_CANT_WRITE: 
	    return 'Failed to write file to disk'; 
	case UPLOAD_ERR_EXTENSION: 
	    return 'File upload stopped by extension'; 
	default: 
	    return 'Unknown upload error'; 
    } 
} 
?>