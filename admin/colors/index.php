<?php
if (!isset($_SESSION['administrator'])) header('Location:../index.php');
?>
<h3 class='tit'>Zarządzanie kolorami</h3>
<script type="text/javascript">
  $(document).ready(function () {
    var sortDiv = '#sortable';
    $(sortDiv).sortable({
      revert: '200', opacity: 0.6, cursor: 'move', update: function () {
        var order = $(this).sortable("serialize");
        $.post("colors/updateDB.php", order, function (theResponse) {
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
      $sql = "UPDATE colors SET name = '" . mysql_real_escape_string($_POST['name']) . "', html = '" . mysql_real_escape_string($_POST['html']) . "' WHERE  id = '" . mysql_real_escape_string($_POST['id_ex']) . "'";
      $result = mysql_query($sql) or die(mysql_error());
    } else {
      $sql = "SELECT * FROM colors";
      $result = mysql_query($sql) or die(mysql_error());
      $kolejnosc = mysql_num_rows($result) + 1;
      $sql = "INSERT INTO colors(name, html, kolejnosc) VALUES('" . mysql_real_escape_string($_POST['name']) . "','" . mysql_real_escape_string($_POST['html']) . "',$kolejnosc)";
      $result = mysql_query($sql) or die(mysql_error());
    }
  } elseif ($_GET['action'] == 'usun') {
    $sql = "DELETE FROM colors WHERE id = '" . $_GET['id'] . "'";
    $result = mysql_query($sql) or die(mysql_error());
    $kolejnosc = 1;
    $sql = "SELECT * FROM colors ORDER BY kolejnosc ASC";
    $result = mysql_query($sql) or die(mysql_error());
    while ($row = mysql_fetch_object($result)) {
      $sqlS = "UPDATE colors SET kolejnosc = '" . $kolejnosc . "' WHERE id = '" . $row->id . "'";
      $resultS = mysql_query($sqlS) or die(mysql_error());
      $kolejnosc++;
    }
  }
  header('Location:index.php?module=colors&show=all');
}
echo "<ul id='sortable'>";
$sql = "SELECT * FROM colors ORDER BY kolejnosc ASC";
$result = mysql_query($sql) or die(mysql_error());
while ($row = mysql_fetch_object($result)) {
  echo "<li class='ui-state-default' id='recordsArray_$row->id'>$row->name - $row->html <div style='background-color: $row->html; width:20px; height:20px;     float: left;
    margin: 0 10px 0 -5px;'></div> <a href='index.php?module=colors&action=usun&id=$row->id'><img src='design/ico-delete.gif' alt='usuń' style='margin-bottom:-3px;'></a><a href='index.php?module=colors&edytuj=1&id=$row->id'><img src='design/ico-info.gif' alt='edytuj' style='margin-bottom:-4px;'></a></li>";
}
echo "</ul>";

if (isset($_GET['edytuj'])) {
  $sql = "SELECT * FROM colors WHERE id = '" . $_GET['id'] . "'";
  $result = mysql_query($sql) or die(mysql_error());
  if (mysql_num_rows($result) > 0) {
    $row = mysql_fetch_object($result);
    $name = $row->name;
    $html = $row->html;
    $id_ex = $row->id;
  } else {
    $name = '';
    $html = '';
    $id_ex = '';
    echo '<p class="msg error">Taki wpis nie istnieje!</p>';
  }
} else {
  $name = '';
  $html = '';
  $id_ex = '';
}
if (isset($_GET['edytuj'])) $button = 'Zapisz zmiany';
else $button = 'Dodaj kolor';
?>
<div id="theForm">
  <div class="output">
  </div>
</div>
<form action="index.php?module=colors&action=add" class="FileUploader" method="post">
  <fieldset>
    <legend>
    </legend>
    <table class="nostyle">
      <tr>
        <input type="hidden" name="id_ex" value="<?php echo $id_ex; ?>">
        <td class="va-top">Nazwa koloru:</td>
        <td>
          <input type="text" name="name" value='<?php echo $name; ?>' style="width:498px;"
                 class="input-text"/></td>

      </tr>
      <tr>
        <td class="va-top">Wizualizacja koloru:</td>
        <td>
          <input type="color" name="html" value='<?php echo $html; ?>' style="width:498px;"
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



