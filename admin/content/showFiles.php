<?php
session_start();
require('../config.php');
?>
    <script type="text/javascript">
        $(document).ready(function () {
            $(document).on('click', '.photoDescSave', function (e) {
                e.preventDefault();
                var formNum = $(this).attr("data-form-num");
                $.ajax({
                    type: 'post',
                    url: 'content/savePhotoDesc.php',
                    data: $("form#photoForm_" + formNum).serialize()
                })
                $('.photoDesc_' + formNum).dialog('close');
            });

        /*    $('a.rotate-photo').click(function (e) {
                e.preventDefault();
                var prefix = $(this).attr("photo-prefix");
                var parent = $(this).parent();
                var files = $(this).parent().parent().parent().parent().attr('id');

                console.log($(this));
                $.ajax({
                    type: 'get',
                    url: 'content/rotate.php?prefix=' + prefix,
                    success: function () {
                        parent.slideUp(300, function () {
                            parent.remove();
                            $.get('content/showFiles.php', function (data) {
                                $('#' + files).html(data);
                            });
                        });
                    }
                })
            });
*/
            $('a.delete').click(function (e) {
                e.preventDefault();
                var parent = $(this).parent();
                var files = $(this).parent().parent().parent().parent().attr('id');
                $.ajax({
                    type: 'get',
                    url: 'content/deletePhoto.php',
                    data: 'delete=' + parent.attr('id').replace('record-', ''),
                    beforeSend: function () {
                        parent.animate(300);
                    },
                    success: function () {
                        parent.slideUp(300, function () {
                            parent.remove();
                            $.get('content/showFiles.php', function (data) {
                                $('#' + files).html(data);
                            });
                        });
                    }
                });
            });
            var sortDiv = '#sortable';
            $(sortDiv).sortable({
                revert: '200', opacity: 0.6, cursor: 'move', update: function () {
                    var order = $(this).sortable("serialize") + '&action=updateRecordsListings';
                    $.post("content/updateDB.php?prefix=<?php echo $_SESSION['temp']; ?>", order, function (theResponse) {
                        $("#contentRight").html(theResponse);
                    });
                }
            });
        });

        $(document).ready(function () {
            $('.photoDesc').dialog({autoOpen: false});
            $('.photoDescOpen').click(function () {
                var dialogNumber = $(this).attr("data-num");
                $('.photoDesc_' + dialogNumber).dialog('open');
                //console.log('open', $(this));
            });
        })
    </script>
    <style>
        .sortable > div {
            float: left;
        }
    </style>
<?php
echo '<div id="sortable" class="sortable" >';
$query = "SELECT * FROM pliki WHERE prefix = '" . $_SESSION['temp'] . "' ORDER BY kolejnosc ASC";
$result = mysql_query($query) or die(mysql_error());
while ($row = mysql_fetch_object($result)) {
    echo '<div id="recordsArray_' . $row->id . '" style="width:120px; height:140px; padding: 0.5em;">
				    <span class="record" id="record-' . $row->tytul . '" style="background-color:white;">
				    <a href="?delete=' . $row->tytul . '" class="delete"><img src="design/ico-delete.gif"></a>
				    <a href="#" class="photoDescOpen" data-num="' . $row->id . '"><img src="design/ico-info.gif"></a>
				    <a href="./content/rotate.php?prefix='.$row->id.'" style="float: left" photo-prefix="' . $row->id . '"><span class="ui-icon ui-icon-arrowrefresh-1-e"></span></a>';
    $extension = explode(".", $row->tytul);
    $extension = array_reverse($extension);
    if ($extension[0] == "mp4") {
        echo '<video autoplay width="100">
						<source src=content/uploads/' . $row->prefix . '/' . $row->tytul . ' type=video/mp4>
					     </video>';
    } else {
        echo '<img width="100" class="img-rotate" src="content/uploads/' . $_SESSION['temp'] . '/' . $row->tytul . '"></span>';
    }
    echo '</div>';
}
echo '</div><div style="clear:both"></div>';

?>

<?php
$query = "SELECT * FROM pliki WHERE prefix = '" . $_SESSION['temp'] . "' ORDER BY kolejnosc ASC";
$result = mysql_query($query) or die(mysql_error());
while ($row = mysql_fetch_object($result)) {
    echo "
				    <div class='photoDesc photoDesc_$row->id'  title='Dodaj podpis do zdjęcia' style='display:none;'>
				      <p>
					<form id='photoForm_$row->id'>
					  <input type='hidden' name='photoId' value='$row->id'>
					  Opis dodatkowy (pl):
					  <input type='text' name='photoDescPl' style='width: 270px; resize: none; margin-bottom: 15px;' value='$row->foto_opis_pl'>
					   Opis dodatkowy (en):
					   <input type='text' name='photoDescEn' style='width: 270px; resize: none; margin-bottom: 15px;' value='$row->foto_opis_en'>
					   Opis dodatkowy (ru):
					   <input type='text' name='photoDescRu' style='width: 270px; resize: none; margin-bottom: 15px;' value='$row->foto_opis_ru'>
					   Opis dodatkowy (rum):
					   <input type='text' name='photoDescRum' style='width: 270px; resize: none; margin-bottom: 15px;' value='$row->foto_opis_rum'>
					  <input type='submit' class='photoDescSave' data-form-num='$row->id' value='zapisz'>
					</form>
				      </p>
				    </div>
				  ";
}
?>