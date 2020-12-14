<?php
function obliczTyp($id)
{
if($id==0) $slot = 'Liczbowy';
if($id==1) $slot = 'Tekstowy';
if($id==2) $slot = 'Check Box';
return $slot;
}
?>