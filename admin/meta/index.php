<?php
if (!isset($_SESSION['administrator'])) header('Location:../index.php');
if (@$_GET['action'] == 'update') {
    $sql = "UPDATE meta SET
        keywords_pl = '" . strip_tags(mysql_escape_string($_POST['keywords_pl'])) . "',
        description_pl = '" . strip_tags(mysql_escape_string($_POST['description_pl'])) . "',
        title_pl = '" . strip_tags(mysql_escape_string($_POST['title_pl'])) . "',

        keywords_en = '" . strip_tags(mysql_escape_string($_POST['keywords_en'])) . "',
        description_en = '" . strip_tags(mysql_escape_string($_POST['description_en'])) . "',
        title_en = '" . strip_tags(mysql_escape_string($_POST['title_en'])) . "',

        keywords_rum = '" . strip_tags(mysql_escape_string($_POST['keywords_rum'])) . "',
        description_rum = '" . strip_tags(mysql_escape_string($_POST['description_rum'])) . "',
        title_rum = '" . strip_tags(mysql_escape_string($_POST['title_rum'])) . "',

        keywords_ru = '" . strip_tags(mysql_escape_string($_POST['keywords_ru'])) . "',
        description_ru = '" . strip_tags(mysql_escape_string($_POST['description_ru'])) . "',
        title_ru = '" . strip_tags(mysql_escape_string($_POST['title_ru'])) . "'

        WHERE id=1";
    $result = mysql_query($sql) or die(mysql_error());
    header('Location:index.php?module=meta&success=1');
}
$sql = "SELECT * from meta WHERE id=1";
$result = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_object($result);
?>
<form action='index.php?module=meta&action=update' method='post'>
    <h3 class="tit">Jesteś teraz w trybie edycji meta tagów</h3>

    <fieldset>
        <legend>
        </legend>
        <table class="nostyle">
            <tr>
                <td class="va-top">Tytuł strony (pl):</td>
                <td>
                    <input type='text' name='title_pl' value="<?php echo $row->title_pl; ?>" style='width:498px;'
                           class="input-text"></td>
            </tr>
            <tr>
                <td class="va-top">Tytuł strony (en):</td>
                <td>
                    <input type='text' name='title_en' value="<?php echo $row->title_en; ?>" style='width:498px;'
                           class="input-text"></td>
            </tr>
            <tr>
                <td class="va-top">Tytuł strony (ru):</td>
                <td>
                    <input type='text' name='title_ru' value="<?php echo $row->title_ru; ?>" style='width:498px;'
                           class="input-text"></td>
            </tr>
            <tr>
                <td class="va-top">Tytuł strony (rum):</td>
                <td>
                    <input type='text' name='title_rum' value="<?php echo $row->title_rum; ?>" style='width:498px;'
                           class="input-text"></td>
            </tr>
            <tr>
                <td class="va-top">Opis dla przeglądarek (pl):</td>
                <td>
                    <textarea name='description_pl' cols="75" rows="7"
                              class="input-text"><?php echo $row->description_pl; ?></textarea></td>
            </tr>
            <tr>
                <td class="va-top">Opis dla przeglądarek (en):</td>
                <td>
                    <textarea name='description_en' cols="75" rows="7"
                              class="input-text"><?php echo $row->description_en; ?></textarea></td>
            </tr>
            <tr>
                <td class="va-top">Opis dla przeglądarek (rum):</td>
                <td>
                    <textarea name='description_rum' cols="75" rows="7"
                              class="input-text"><?php echo $row->description_rum; ?></textarea></td>
            </tr>
            <tr>
                <td class="va-top">Opis dla przeglądarek (ru):</td>
                <td>
                    <textarea name='description_ru' cols="75" rows="7"
                              class="input-text"><?php echo $row->description_ru; ?></textarea></td>
            </tr>
            <tr>
                <td class="va-top">Słowa kluczowe (pl):</td>
                <td>
                    <textarea name='keywords_pl' cols="75" rows="7"
                              class="input-text"><?php echo $row->keywords_pl; ?></textarea></td>
            </tr>
            <tr>
                <td class="va-top">Słowa kluczowe (en):</td>
                <td>
                    <textarea name='keywords_en' cols="75" rows="7"
                              class="input-text"><?php echo $row->keywords_en; ?></textarea></td>
            </tr>
            <tr>
                <td class="va-top">Słowa kluczowe (ru):</td>
                <td>
                    <textarea name='keywords_ru' cols="75" rows="7"
                              class="input-text"><?php echo $row->keywords_ru; ?></textarea></td>
            </tr>
            <tr>
                <td class="va-top">Słowa kluczowe (rum):</td>
                <td>
                    <textarea name='keywords_rum' cols="75" rows="7"
                              class="input-text"><?php echo $row->keywords_rum; ?></textarea></td>
            </tr>
            <tr>
                <td colspan="2" class="t-right">
                    <input type="submit" class="input-submit" value="Zapisz"/></td>
            </tr>
        </table>
    </fieldset>
</form>                