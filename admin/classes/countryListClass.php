<?php
class countryList{
  $str = '';
  public function getList(){
    $sql = "SELECT * FROM kraje WHERE poziom=1 ORDER BY tytul_en ASC";
    $result = mysql_query($sql) or die(mysql_error());
    while($row = mysql_fetch_object($result)){
      $str .= "<option value='$row->id'>".$row->tytul_en."</option>";
    }
    return $str;
  }
}
?>