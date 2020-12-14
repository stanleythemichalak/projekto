<?php
if (isset($_GET['logout'])) {
    session_unset();
    header('Location:index.php?success=1&type=logout_success');
}
if (!isset($_SESSION['administrator'])) {
    echo '<p class="msg info">Nie jesteś zalogowany</p>';
    include('loginForm.php');
} else {
    if (isset($_GET['module'])) {
        if ($_GET['module'] == 'meta') include('meta/index.php');
        elseif ($_GET['module'] == 'login') include('login/index.php');
        elseif ($_GET['module'] == 'product_categories') include('product_categories/index.php');
        elseif ($_GET['module'] == 'content') include('content/index.php');
        elseif ($_GET['module'] == 'products') include('products/index.php');
        elseif ($_GET['module'] == 'database') include('database/index.php');
        elseif ($_GET['module'] == 'albums') include('albums/index.php');
        elseif ($_GET['module'] == 'translation') include('tlumaczenie/index.php');
        elseif ($_GET['module'] == 'menus') include('menus/index.php');
        elseif ($_GET['module'] == 'kategorie_tresci') include('kategorie_tresci/index.php');
        elseif ($_GET['module'] == 'colors') include('colors/index.php');
        elseif ($_GET['module'] == 'sizes') include('sizes/index.php');
        elseif ($_GET['module'] == 'shipping') include('shipping/index.php');
        elseif ($_GET['module'] == 'codes') include('codes/index.php');

        else echo '<p class="msg error">Wybrano nieobsługiwany moduł</p>';
    }
}
?>