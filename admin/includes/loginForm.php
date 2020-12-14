<?php
  echo"<fieldset><legend>Logowanie.</legend><form action='index.php?login=1' method='post'><table class='nostyle'>";
	echo "<tr>
        <td class='va-top'>Login (mail): </td><td><input type='text' name='nazwa' style='width:498px;' class='input-text'></td></tr>";
	echo "<tr>
        <td class='va-top'>Hasło: </td><td><input type='password' name='haslo' style='width:498px;' class='input-text'></td></tr>";
	echo " <tr>						
        <td colspan='2' class='t-right'>
          <input type='submit' class='input-submit' value='Zaloguj' /></td>					
      </tr>   ";
	echo "</table></form></fieldset>";
?>