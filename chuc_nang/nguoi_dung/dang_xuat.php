<!-- <?php
    session_start();
    unset($_SESSION["uid"]);
    $dang_xuat = $_SERVER['HTTP_REFERER'];
    if(isset($dang_xuat)) {
        header('Location: '.$dang_xuat);
    } else {
        header('Location: ../../');
    }
?> -->
<?php
    session_start();
    unset($_SESSION["uid"]);
    header('Location: ../../');
?>
