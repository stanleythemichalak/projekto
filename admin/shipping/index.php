<?php
if (!isset($_SESSION['administrator'])) header('Location:../index.php');
?>
<h3 class='tit'>Zarządzanie dostawcami</h3>
<script type="text/javascript">
    $(document).ready(function () {
        var sortDiv = '#sortable';
        $(sortDiv).sortable({
            revert: '200', opacity: 0.6, cursor: 'move', update: function () {
                var order = $(this).sortable("serialize");
                $.post("shipping/updateDB.php", order, function (theResponse) {
                    //	$("#contentRight").html(theResponse);
                });
            }
        });
    });
</script>
<style>
    .sortable > div {
        float: left;
    }

    #content ul li.ui-state-default {
        margin-bottom: 10px;
        padding-left: 5px;
        border: 1px solid #d3d3d3 /*{borderColorDefault}*/;
        background: #e6e6e6 /*{bgColorDefault}; url(../images/ui-bg_glass_75_e6e6e6_1x400.png)/*{bgImgUrlDefault}; 50%/*{bgDefaultXPos}*/ 50% /*{bgDefaultYPos}*/ repeat-x /*{bgDefaultRepeat}*/;
        color: #555555 /*{fcDefault}*/;
    }
</style>
<?php
if (isset($_GET['action'])) {
    if ($_GET['action'] == 'add') {
        if (is_numeric(mysql_real_escape_string($_POST['id_ex']))) {
            $sql = "UPDATE shipping SET name = '" . mysql_real_escape_string($_POST['name']) . "', price = '" . mysql_real_escape_string($_POST['price']) . "' WHERE  id = '" . mysql_real_escape_string($_POST['id_ex']) . "'";
            $result = mysql_query($sql) or die(mysql_error());
        } else {
            $sql = "SELECT * FROM shipping";
            $result = mysql_query($sql) or die(mysql_error());
            $kolejnosc = mysql_num_rows($result) + 1;
            $sql = "INSERT INTO shipping(name, price, kolejnosc) VALUES('" . mysql_real_escape_string($_POST['name']) . "','" . mysql_real_escape_string($_POST['price']) . "',$kolejnosc)";
            $result = mysql_query($sql) or die(mysql_error());
        }
    } elseif ($_GET['action'] == 'usun') {
        $sql = "DELETE FROM shipping WHERE id = '" . $_GET['id'] . "'";
        $result = mysql_query($sql) or die(mysql_error());
        $kolejnosc = 1;
        $sql = "SELECT * FROM shipping ORDER BY kolejnosc ASC";
        $result = mysql_query($sql) or die(mysql_error());
        while ($row = mysql_fetch_object($result)) {
            $sqlS = "UPDATE shipping SET kolejnosc = '" . $kolejnosc . "' WHERE id = '" . $row->id . "'";
            $resultS = mysql_query($sqlS) or die(mysql_error());
            $kolejnosc++;
        }
    }
    header('Location:index.php?module=shipping&show=all');
}
echo "<ul id='sortable'>";
$sql = "SELECT * FROM shipping ORDER BY kolejnosc ASC";
$result = mysql_query($sql) or die(mysql_error());
while ($row = mysql_fetch_object($result)) {
    echo "<li class='ui-state-default' id='recordsArray_$row->id'>$row->name - $row->price (PLN) <a href='index.php?module=shipping&action=usun&id=$row->id'><img src='design/ico-delete.gif' alt='usuń' style='margin-bottom:-3px;'></a><a href='index.php?module=shipping&edytuj=1&id=$row->id'><img src='design/ico-info.gif' alt='edytuj' style='margin-bottom:-4px;'></a></li>";
}
echo "</ul>";

if (isset($_GET['edytuj'])) {
    $sql = "SELECT * FROM shipping WHERE id = '" . $_GET['id'] . "'";
    $result = mysql_query($sql) or die(mysql_error());
    if (mysql_num_rows($result) > 0) {
        $row = mysql_fetch_object($result);
        $name = $row->name;
        $price = $row->price;
        $id_ex = $row->id;
    } else {
        $name = '';
        $price = '';
        $id_ex = '';
        echo '<p class="msg error">Taki wpis nie istnieje!</p>';
    }
} else {
    $name = '';
    $price = '';
    $id_ex = '';
}
if (isset($_GET['edytuj'])) $button = 'Zapisz zmiany';
else $button = 'Dodaj dostawce';
?>
<div id="theForm">
    <div class="output">
    </div>
</div>
<form action="index.php?module=shipping&action=add" class="FileUploader" method="post">
    <fieldset>
        <legend>
        </legend>
        <table class="nostyle">
            <tr>
                <input type="hidden" name="id_ex" value="<?php echo $id_ex; ?>">
                <td class="va-top">Nazwa dostawcy:</td>
                <td>
                    <input type="text" name="name" value='<?php echo $name; ?>' style="width:498px;"
                           class="input-text"/></td>

            </tr>
            <tr>
                <td class="va-top">Cena dostawy (PLN):</td>
                <td>
                    <input type="text" name="price" value='<?php echo $price; ?>' style="width:498px;"
                           class="input-text"/></td>
            </tr>

            <tr>
                <td class="t-right">
                    <input type="submit" class="red-button" class="uploadButton input-submit"
                           value="<?php echo $button; ?>"></td>
            </tr>
            <script>

            </script>
        </table>
</form>
</fieldset> 



