<?php
ob_start();
session_start();
//print_r($_SESSION);
require('config.php');
include('functions/kategoria.php');
include('functions/kategoria_produktu.php');
include('functions/kategoria_tresci.php');
include('functions/httpLink.php');
include('includes/lang.php');
include('functions/typParametru.php');
include('functions/typAukcji.php');
include('functions/lokalizacja.php');
 
if(isset($_GET['login'])){
	if(!empty($_POST["nazwa"]) && !empty($_POST["haslo"])){
  $sql = "select * from uzytkownicy where mail = '".mysql_escape_string($_POST["nazwa"])."' AND haslo = '".md5($_POST["haslo"])."' AND administrator = 1";
  $result = mysql_query($sql) or die(mysql_error());
		if(mysql_num_rows($result)>0){
    $row = mysql_fetch_object($result);
            $_SESSION['administrator']=1;
						$_SESSION['administrator_id']=$row->id;
            $_SESSION['administrator_mail']=$row->mail;
            $_SESSION['administrator_session_id']=session_id(); 
            $_SESSION['lang_supermsv'] = '_en';
			header('Location:index.php?success=1&type=login_success');
			}
      else header('Location:index.php?success=0&type=auth_error');
		}
    else header('Location:index.php?success=0&type=auth_warning');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta http-equiv="content-language" content="pl" />
    <meta name="robots" content="noindex,nofollow" />
    <link rel="stylesheet" media="screen,projection" type="text/css" href="css/reset.css" /> <!-- RESET -->
    <link rel="stylesheet" media="screen,projection" type="text/css" href="css/main.css" /> <!-- MAIN STYLE SHEET -->
    <link rel="stylesheet" media="screen,projection" type="text/css" href="css/2col.css" title="2col" />
    <!-- DEFAULT: 2 COLUMNS -->
    <link rel="alternate stylesheet" media="screen,projection" type="text/css" href="css/1col.css" title="1col" />
    <!-- ALTERNATE: 1 COLUMN -->
    <!--[if lte IE 6]><link rel="stylesheet" media="screen,projection" type="text/css" href="css/main-ie6.css" /><![endif]-->
    <!-- MSIE6 -->
    <link rel="stylesheet" media="screen,projection" type="text/css" href="css/style.css" /> <!-- GRAPHIC THEME -->
    <link rel="stylesheet" media="screen,projection" type="text/css" href="css/mystyle.css" />
    <!-- WRITE YOUR CSS CODE HERE -->
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.css" /> <!-- WRITE YOUR CSS CODE HERE -->
    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>

    <script type="text/javascript" src="js/jquery.form.js"></script>
    <script type="text/javascript" src="js/jquery-ui-1.10.1.js"></script>

    <script src="ckeditor/ckeditor.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $(".tabs > ul").tabs();
    });
    </script>
    <title></title>
</head>

<body>

    <div id="main">

        <!-- Tray -->
        <div id="tray" class="box">

            <p class="f-left box">

                <!-- Switcher -->
                <span class="f-left" id="switcher">
                    <a href="../" rel="1col" class="styleswitch ico-col1" title="Display one column"><img
                            src="design/switcher-1col.gif" alt="1 Column" /></a>
                    <a href="../" rel="2col" class="styleswitch ico-col2" title="Display two columns"><img
                            src="design/switcher-2col.gif" alt="2 Columns" /></a>
                </span>

                Strona: <strong>Projekto</strong>

            </p>
            <?php include('includes/userStatus.php');?>
        </div> <!--  /tray -->

        <hr class="noscreen" />

        <!-- Menu -->
        <div id="menu" class="box">

            <ul class="box f-right">
                <li><a target="_blank" href="../"><span><strong>Przejdź do strony &raquo;</strong></span></a></li>
            </ul>
            <?php if(isset($_SESSION['administrator'])) include('includes/topMenu.php');?>
        </div> <!-- /header -->

        <hr class="noscreen" />

        <!-- Columns -->
        <div id="cols" class="box">

            <!-- Aside (Left Column) -->
            <?php if(isset($_SESSION['administrator'])) {?> <div id="aside" class="box">

                <div class="padding box">

                    <!-- Logo (Max. width = 200px) -->
                    <p id="logo"><img src='./design/logo.png'></p>
                </div> <!-- /padding -->
                <?php if(isset($_GET['module'])){
      if($_GET['module']=='content') echo '<div class="padding box"><p id="btn-create" class="box"><a href="index.php?module=content"><span>Dodaj nową treść</span></a></p></div>'; 
      if($_GET['module']=='database') echo '<div class="padding box"><p id="btn-create" class="box"><a href="index.php?module=database"><span>Dodaj użytkownika</span></a></p></div>';
	  if($_GET['module']=='products') echo '<div class="padding box"><p id="btn-create" class="box"><a href="index.php?module=products"><span>Dodaj produkt</span></a></p></div>'; 
      }?>
                <?php include('includes/leftMenu.php');?>
            </div> <!-- /aside -->
            <?php }?>
            <hr class="noscreen" />

            <!-- Content (Right Column) -->
            <div id="content" class="box">

                <h1></h1>

                <?php include('includes/headingTitle.php');?>
                <?php include('includes/messages.php');?>
                <?php include('includes/engine.php');?>
            </div> <!-- /content -->

        </div> <!-- /cols -->

        <hr class="noscreen" />

        <!-- Footer -->
        <div id="footer" class="box">

            <p class="f-left">&copy; <?php echo date('Y');?> <a href="#">Dominik Stawicki</a>, Wszelkie prawa
                zastrzeżone &reg;</p>


        </div> <!-- /footer -->

    </div> <!-- /main -->

</body>

</html>
<?php
ob_end_flush();
?>