<?php
function kategoria_tresci($przypisanie) {
    $sql = "SELECT * FROM linki WHERE id = '".$przypisanie."'";
    $result = mysql_query($sql) or die(mysql_error());
    $row = mysql_fetch_object($result);
    $str = $row->tytul_pl;
    $sql = "SELECT * FROM linki WHERE id = '".$row->przypisanie."'";
    $result = mysql_query($sql) or die(mysql_error());
    if(mysql_num_rows($result) > 0){
        $row = mysql_fetch_object($result);
        $str0 = $row->tytul_pl;
        return $str0 . ' -> ' . $str;
    }
    return $str;
}
?>