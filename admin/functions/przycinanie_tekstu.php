<?php
function przytnijTekst($tekst, $iloscZnakow, $zakonczenie = '...') {
    if(strlen($tekst) > $iloscZnakow) {
        $iloscZnakow -= strlen($zakonczenie);
        $tekst = substr($tekst, 0, strpos($tekst,' ',$iloscZnakow));
        $tekst .= $zakonczenie;
    }
 return $tekst;
}
?>

