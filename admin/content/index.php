<style>

    #progress {
        position: relative;
        width: 400px;
        border: 1px solid #ddd;
        padding: 1px;
        border-radius: 3px;
    }

    #bar {
        background-color: #B4F5B4;
        width: 0%;
        height: 20px;
        border-radius: 3px;
    }

    #percent {
        position: absolute;
        display: inline-block;
        top: 3px;
        left: 48%;
    }


</style>
<?php
if (!isset($_SESSION['administrator'])) header('Location:../index.php');
if (isset($_GET['usun'])) include('content/deleteRealisation.php');
if (isset($_GET['usun'])) include('content/deleteRealisation.php');
if (isset($_GET['edytuj'])) $_SESSION['temp'] = $_GET['edytuj'];
else $_SESSION['temp'] = md5(rand(1000, 99999));
function select($id, $poziom)
{
    $next_poziom = $poziom + 1;
    $str = '';
    $sql = 'SELECT * FROM linki WHERE przypisanie="' . $id . '" ORDER BY kolejnosc ASC';
    $result = mysql_query($sql) or die(mysql_error());
    while ($row = mysql_fetch_object($result)) {
        $str .= '<option class="poziom_' . $next_poziom . '" value="' . $row->id . '">- ' . $row->tytul_en . '/ ' . $row->tytul_pl . '</option>';
        $str .= select($row->id, $next_poziom);
    }
    return $str;
}

function texttrim($opis)
{
    $trimm = substr($opis, 0, 100);
    $trimmed = strip_tags($trimm);
    return $trimmed;
}

if (isset($_GET['aktywuj'])) {
    if ($_GET['status'] == 1) $sql = "UPDATE aktualnosci SET aktywny=1,data='" . date('Y-m-d') . "' WHERE id='" . $_GET['aktywuj'] . "'";
    if ($_GET['status'] == 0) $sql = "UPDATE aktualnosci SET aktywny=0 WHERE id='" . $_GET['aktywuj'] . "'";
    $result = mysql_query($sql) or die(mysql_error());
    header('Location:index.php?module=content&show=all&success=1');
}
?>
<script>
    $(document).ready(function () {
        var productsCategoryId = 2, productConfigHolder = $('.product-configurator'), sizes = '', colors = '';

        console.log(productConfigHolder);

        $(document).on("mousemove", ".composition-range", function(){
            $(this).parent().next().text($(this).val());
        });

        $('#product-check').click(function () {
                productConfigHolder.toggle();
        });
        var size = 0;

        console.log($('.size'));

        /*if($('.size').attr('value') > 0){
            size = $('.size').attr('value');
        }

        if($('.color').attr('value') > 0){
            size = $('.size').attr('value');
        }*/
    var getParams = function(){
        $.ajax({
            type: 'get',
            url: 'content/getSizes.php',
            dataType: "html",
            success: function (data) {
                sizes = data;
                $('.size').append(data);
            }
        });

        $.ajax({
            type: 'get',
            url: 'content/getColors.php',
            dataType: "html",
            success: function (data) {
                colors = data;
                $('.color').append(data);
            }
        });
    }
        getParams(function(){
            console.log('callback');
        });
        var fabricHolder = '<div class="composition-entity"><div class="material"><input type="text" name="material[]"></div><div class="range"><input type="range" min="0" max="100" value="0" class="composition-range" name="wartosc[]"></div><div class="current-value">0</div><img class="delete-dynamic-item" src="design/ico-delete.gif"></div><div class="clear"></div>',
            parametersHolder = '<div class="composition-entity"><select class="size" name="size[]"></select><select class="color" name="color[]"></select><input type="number" class="number-sel" name="ilosc[]"><img class="delete-dynamic-item" src="design/ico-delete.gif"><div class="clear"></div>';
        $('.add-new-value').click(function(){
            $('.fabric-holder').append(fabricHolder);
        });


        for(var fabrics = 0; fabrics < $('.size').length; fabrics+= 1){
            var sizeSelect = $('.size')[fabrics],
                colorSelect = $(sizeSelect).next()[0],
                sizeToSelect = $(sizeSelect).attr('value'),
                colorToSelect = $(colorSelect).attr('value');
            console.log(sizeSelect.options,sizeSelect, colorSelect, sizeToSelect, colorToSelect);
            setTimeout(function(){
                $(sizeSelect).val(parseInt(sizeToSelect, 10));
                $(colorSelect).val(parseInt(colorToSelect, 10));

            },2000)

        }


        $(document).on('click', '.delete-dynamic-item', function(){
           $(this).parent().remove();
        });

        $('.add-new-composition').click(function(){
            $('.parameters-holder').append(parametersHolder);
            var that = $('.composition-entity').last();
            $(that).find('.color').append(colors);
            $(that).find('.size').append(sizes);
        });

        $("#datepicker").datepicker();
        CKEDITOR.replace("editor0");
        CKEDITOR.replace("editor1");
        $(document).on('click', '.red-button', function (e) {

            var opis_pl = CKEDITOR.instances["editor0"].getData();
            var opis_en = CKEDITOR.instances["editor1"].getData();
            e.preventDefault();
            $('.uploadButton').attr('disabled', '');
            $(".output").html('<p class="msg info">Trwa wysyłanie plików oraz zapisywanie zmian. Proszę czekać do zniknięcia tej wiadomości</p><div id="progress"><div id="bar"></div><div id="percent">0%</div ></div>');
            $('.FileUploader').ajaxSubmit({
                target: '.output',
                data: {opis_en: opis_en, opis_pl: opis_pl},
                beforeSend: function () {
                    $("#progress").show();
                    //clear everything
                    $("#bar").width('0%');
                    $("#message").html("");
                    $("#percent").html("0%");
                },
                uploadProgress: function (event, position, total, percentComplete) {
                    $("#bar").width(percentComplete + '%');
                    $("#percent").html(percentComplete + '%');

                },
                success: function () {
                    $("#bar").width('100%');
                    $("#percent").html('100%');
                    $.get('content/showFiles.php?typ_realizacji=<?php echo $_SESSION["temp"]; ?>', function (data) {
                        $('#files').html(data);
                    });
                },
                target: '.output'
            });
        });
        function afterSuccess() {
            $('.FileUploader').resetForm();
            $('.uploadButton').removeAttr('disabled');
        }
    });

</script>
<h3 class='tit'>Zarządzanie wpisami</h3>
<?php
if(isset($_GET['show']))
{
$i=1;
$class='';
$kategoria='';
echo'<table class="no-style" style="width:100%;">';
$sql = "SELECT * FROM aktualnosci ORDER BY poziom DESC";
$result = mysql_query($sql) or die(mysql_error());
while($row = mysql_fetch_object($result)){
if($kategoria!=$row->poziom)  echo" <tr><th>Tytuł</th><th>Kategoria</th><th>Skrót</th><th>Data</th><th>Akcja</th></tr>";
if($i%2==0)$class='class="bg"';
else $class='';
$trimmed = texttrim($row->opis_en.'/'.$row->opis_pl);
if($row->systemowa == 1){
echo"<tr $class><td>$row->tytul_pl</td><td>".kategoria_tresci($row->poziom)."</td><td>$trimmed</td><td>$row->data</td><td><a href='index.php?module=content&edytuj=$row->prefix'><img src='design/ico-info.gif' alt='edytuj'></a> ";
 

}else{
echo"<tr $class><td>$row->tytul_pl</td><td>".kategoria_tresci($row->poziom)."</td><td>$trimmed</td><td>$row->data</td><td><a href='index.php?module=content&edytuj=$row->prefix'><img src='design/ico-info.gif' alt='edytuj'></a> <a href='index.php?module=content&usun=$row->prefix'><img src='design/ico-delete.gif' alt='usuń'></a> ";
   if($row->aktywny==1) echo '<a href="index.php?module=content&aktywuj='.$row->id.'&status=0"><img src="design/ico-done.gif" alt="deaktywuj"></a>';
   if($row->aktywny==0) echo '<a href="index.php?module=content&aktywuj='.$row->id.'&status=1"><img src="design/ico-warning.gif" alt="aktywuj"></a>';  
}
echo"</td></tr>";
$i++;
$kategoria = $row->poziom;
}
echo '</table>';
}
else
{
 if(isset($_GET['edytuj'])){
$sql = "SELECT * FROM aktualnosci WHERE prefix = '".$_GET['edytuj']."'";
$result = mysql_query($sql) or die(mysql_error());
if(mysql_num_rows($result)>0){
$row = mysql_fetch_object($result);
echo "<script>$.get('content/showFiles.php?typ_realizacji=".$_SESSION['temp']."', function(data) {
            $('#files').html(data);
        });</script>";
    $tytul_en = $row->tytul_en;
    $podtytul_en = $row->podtytul_en;
    $meta_tytul_en = $row->meta_tytul_en;
    $meta_opis_en = $row->meta_opis_en;
    $meta_slowa_en = $row->meta_slowa_en;
    $opis_en=$row->opis_en;
    $tytul_pl = $row->tytul_pl;
    $podtytul_pl = $row->podtytul_pl;
    $meta_tytul_pl = $row->meta_tytul_pl;
    $meta_opis_pl = $row->meta_opis_pl;
    $meta_slowa_pl = $row->meta_slowa_pl;
    $opis_pl=$row->opis_pl;
    $special = $row->special;
    $poziom="<option value='$row->poziom'>".kategoria_tresci($row->poziom)."</poziom>";
    $data = $row->data;
    $cena = $row->cena;
    $promocja = $row->promocja;
    $pranie = $row->pranie;
    $sklad = $row->sklad;
    $parametry = $row->parametry;
    $cennik = $row->cennik;
    if($cena > 0) {
        echo "<script>$(document).ready(function(){
                $('.product-configurator').show();
        });</script>";
    }
}else{
    $tytul_en = '';
    $podtytul_en = '';
    $meta_tytul_en = '';
    $meta_opis_en = '';
    $meta_slowa_en = '';
    $opis_en='';
    $tytul_pl = '';
    $podtytul_pl = '';
    $meta_tytul_pl = '';
    $meta_opis_pl = '';
    $meta_slowa_pl = '';
    $opis_pl='';
    $poziom='';
    $special = '';
    $data = date("Y-m-d");
    $cena = '';
    $promocja = '';
    $pranie = '';
    $sklad = '';
    $parametry = '';
    $cennik = '';
    echo '<p class="msg error">Taki wpis nie istnieje!</p>';
    }
}
else {
    $tytul_en = '';
    $podtytul_en = '';
    $meta_tytul_en = '';
    $meta_opis_en = '';
    $meta_slowa_en = '';
    $opis_en='';
    $tytul_pl = '';
    $podtytul_pl = '';
    $meta_tytul_pl = '';
    $meta_opis_pl = '';
    $meta_slowa_pl = '';
    $opis_pl='';
    $poziom='';
    $special = '';
    $data = date("Y-m-d");
    $cena = '';
    $promocja = '';
    $pranie = '';
    $sklad = '';
    $parametry = '';
    $cennik = '';
}
if(isset($_GET['edytuj'])) $button = 'Zapisz zmiany';
else $button = 'Dodaj wpis';
?>   
<div id="theForm">
  <div class="output">
  </div>
 </div>          
<form action="content/uploader.php" class="FileUploader" enctype="multipart/form-data" method="post">
<input type='hidden' name='typ_realizacji' value='<?php echo $_SESSION['temp']; ?>'>
<input type="hidden" name="mName" id="mName" value='logo' style="width:498px;" class="input-text"/>
  <fieldset>
    <legend>
    </legend>
    <table class="nostyle">
      <tr>
        <td class="va-top">Tytuł wpisu (en): </td><td>
          <input type="text" name="tytul_en" id="mName" value='<?php echo $tytul_en; ?>' style="width:498px;" class="input-text"/></td>
      </tr>
            <tr>
        <td class="va-top">Tytuł wpisu: </td><td>
          <input type="text" name="tytul_pl" id="mName" value='<?php echo $tytul_pl; ?>' style="width:498px;" class="input-text"/></td>
      </tr>
            <tr>
        <td class="va-top">Podtytuł wpisu (en): </td><td>
          <input type="text" name="podtytul_en" id="mName" value='<?php echo $podtytul_en; ?>' style="width:498px;" class="input-text"/></td>
      </tr>
      <tr>
        <td class="va-top">Podtytuł wpisu: </td><td>
          <input type="text" name="podtytul_pl" id="mName" value='<?php echo $podtytul_pl; ?>' style="width:498px;" class="input-text"/></td>
      </tr>
      <tr>
        <td class="va-top">Data dodania: </td><td>
          <input type="text" name="data" id="datepicker" value='<?php echo $data; ?>' style="width:498px;" class="input-text"/></td>
      </tr>
      <tr>
        <td class="va-top">Pole specjalne: </td><td>
          <input type="text" name="special" value='<?php echo $special; ?>' style="width:498px;" class="input-text"/></td>
      </tr>
      <tr><td class="va-top">Kategoria:</td><td><select id="category-level" name="poziom" style="width:500px;"><?php echo $poziom; echo select(0,0); ?></select></td></tr>
      <!--<tr><td class="va-top">Tytuł w przeglądarce (en):</td><td><input type="text" value="<?php /*echo $meta_tytul_en; */?>" name="meta_tytul_en" style="width:498px;" class="input-text"></td></tr>-->
        <tr class="va-top hidden">
                <td class="va-top">Produkt: </td><td>
                  <input type="checkbox" id="product-check" <?php if($cena > 0) echo 'checked'?>/></td>
      </tr>
      <tr class="product-configurator">
        <td class="va-top">Cena: </td><td>
          <input type="text" name="cena" value='<?php echo $cena; ?>' style="width:498px;" class="input-text"/></td>
      </tr>
      <tr class="product-configurator">
        <td class="va-top">Promocja: </td><td>
          <input type="text" name="promocja" value='<?php echo $promocja; ?>' style="width:498px;" class="input-text"/></td>
      </tr>
      <tr class="product-configurator">
        <td class="va-top">Instrukcja prania (podpunkty oddziel enterem): </td><td>
          <textarea name="pranie" class="params-area"><?php echo $pranie; ?></textarea></td>
      </tr>
      <tr class="product-configurator">
        <td class="va-top">Skład:</td><td>
            <div class="add-new-value"><img src="./design/ico-plus.gif" alt="" /></div>
            <?php
                if($sklad != '') {
                    echo '<div class="fabric-holder-def">';
                    $skladArr = explode('|', $sklad);
                    for($i= 0; $i < count($skladArr); $i += 1){
                        $temp = explode(',', $skladArr[$i]);
                        echo '<div class="composition-entity"><div class="material"><input type="text" name="material[]" value="'.$temp[0].'"></div><div class="range"><input type="range" min="0" max="100" value="'.$temp[1].'" class="composition-range" name="wartosc[]"></div><div class="current-value">'.$temp[1].'</div><img class="delete-dynamic-item" src="design/ico-delete.gif"></div><div class="clear"></div>';
                    }
                    echo '</div>';
                }
            ?>
            <div class="fabric-holder"></div>
        </td>
      </tr>
      <tr class="product-configurator">
        <td class="va-top">Rozmiary, kolory i ilości:</td><td>
            <div class="add-new-composition"><img src="./design/ico-plus.gif" alt="" /></div>
            <?php
                if($parametry != 0) {
                    echo '<div class="fabric-holder-def">';
                    $parametryArr = explode('|', $parametry);
                    for($i= 0; $i < count($parametryArr); $i += 1){
                        $temp = explode(',', $parametryArr[$i]);
                        echo '<div class="composition-entity"><select class="size" name="size[]" value="'.$temp[0].'"></select><select class="color" name="color[]" value="'.$temp[1].'"></select><input type="number" class="number-sel" name="ilosc[]" value="'.$temp[2].'"><img class="delete-dynamic-item" src="design/ico-delete.gif"><div class="clear"></div>';
                    }
                    echo '</div>';
                }
            ?>
            <div class="parameters-holder"></div>
        </td>
      </tr>
      <tr class="product-configurator">
        <td class="va-top">Typ Cennika</td><td>
        <select name="cennik">
        <?php $sql = "SELECT * FROM aktualnosci WHERE poziom = 9";
            $result = mysql_query($sql) or die(mysql_error());
            while($row = mysql_fetch_object($result)){
            if($row->id == $cennik){
                $selected = 'selected';
            }else{
                $selected = '';
            }
                echo "<option value='".$row->id."' ".$selected.">".$row->tytul_pl."</option>";
            }
        ?>
</select>
      </td>
      </tr>


      <tr><td class="va-top">Tytuł w przeglądarce:</td><td><input type="text" value="<?php echo $meta_tytul_pl; ?>" name="meta_tytul_pl" style="width:498px;" class="input-text"></td></tr>

<!--<tr><td class="va-top">Słowa kluczowe (oddziel przecinkiem) (en):</td><td><input type="text" value="<?php /*echo $meta_slowa_en; */?>" name="meta_slowa_en" style="width:498px;" class="input-text"></td></tr>-->
<tr><td class="va-top">Słowa kluczowe (oddziel przecinkiem):</td><td><input type="text" value="<?php echo $meta_slowa_pl; ?>" name="meta_slowa_pl" style="width:498px;" class="input-text"></td></tr>
<!--<tr><td class="va-top">Opis dla przeglądarki (en):</td><td><input type="text" value="<?php /*echo $meta_opis_en; */?>" name="meta_opis_en" style="width:498px;" class="input-text"></td></tr>-->
<tr><td class="va-top">Opis dla przeglądarki:</td><td><input type="text" value="<?php echo $meta_opis_pl; ?>" name="meta_opis_pl" style="width:498px;" class="input-text"></td></tr>
<tr><td class="va-top">Opis (en): </td><td></td></tr>
<tr><td colspan=2><textarea id="editor1" name="opis_en"><?php echo $opis_en; ?></textarea></td></tr>
<tr><td class="va-top">Opis: </td><td></td></tr>
<tr><td colspan=2><textarea id="editor0" name="opis_pl"><?php echo $opis_pl; ?></textarea></td></tr>
    <tr>
        <td class="t-right">
          <input type="file" name="mFile[]" id="mFile" class="input-submit" multiple/></td>
        <td class="t-right">
          <input type="button" class="red-button" class="uploadButton input-submit" value="<?php echo $button;?>"></td>
      </tr>
<script>

</script>  
</table>      
</form>  </fieldset> 


<fieldset>
  <div id="files" class="files">
  </div>
</fieldset>
<?php
  }
?>


