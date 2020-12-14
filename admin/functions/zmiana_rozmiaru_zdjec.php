<?php
function zmiana_rozmiaru($orginalny_obrazek,$docelowa_szerokosc,$docelowa_wysokosc,$miniatura){
   
    // Pobranie orginalnych parametrów i kalkulacja skali
    list($szerokosc, $wysokosc) = getimagesize($orginalny_obrazek);
    $xskala=$szerokosc/$docelowa_szerokosc;
    $yskala=$wysokosc/$docelowa_wysokosc;
   
    // Kalkulacja nowego rozmiaru
    if ($yskala>$xskala){
        $nowa_szerokosc = round($szerokosc * (1/$yskala));
        $nowa_wysokosc = round($wysokosc * (1/$yskala));
    }
    else {
        $nowa_szerokosc = round($szerokosc * (1/$xskala));
        $nowa_wysokosc = round($wysokosc * (1/$xskala));
    }

    // Zmiana rozmiaru orginalnego obrazu
    $obraz_zmiana_wielkosci = imagecreatetruecolor($nowa_szerokosc, $nowa_wysokosc);
    $obrazek_tymczasowy     = imagecreatefromjpeg ($orginalny_obrazek);
    imagecopyresampled($obraz_zmiana_wielkosci, $obrazek_tymczasowy, 0, 0, 0, 0, $nowa_szerokosc, $nowa_wysokosc, $szerokosc, $wysokosc);
    if($miniatura == 1) {
    $miniatura_pref='_270'; 
    $data = explode('.',$orginalny_obrazek);
    $name = implode(array_slice($data, 0, -1));
    $ext = array_reverse($data);
    $orginalny_obrazek = $name.'_270.'.$ext[0];
    $obraz = imagejpeg($obraz_zmiana_wielkosci, $orginalny_obrazek);
    }
    else $obraz = imagejpeg($obraz_zmiana_wielkosci, $orginalny_obrazek);
    
    return $orginalny_obrazek;
}
?>