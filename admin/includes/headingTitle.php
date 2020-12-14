<?php
if(!isset($_SESSION['administrator'])) echo "<h3 class='tit'>Musisz się zalogować aby mieć dostęp do systemu</h3>";
else {
if(!isset($_GET['module'])) echo "<h3 class='tit'>Strona główna systemu administracyjnego</h3>
<p class='msg info'>
W razie problemów z systemem proszę o kontakt mailowy: estronanet@gmail.com lub telefoniczny 605 34 34 40 (8 - 17)
</p>
";
}
?>
