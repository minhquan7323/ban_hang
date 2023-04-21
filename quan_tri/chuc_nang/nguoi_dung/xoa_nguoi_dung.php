<?php if(!isset($bien_bao_mat)){exit();} ?>
<?php 
    $nguoi_dung_id = $_GET['nguoi_dung_id'];
    $xoa_nguoi_dung="DELETE FROM nguoi_dung WHERE nguoi_dung_id = $nguoi_dung_id";
    $conn = new mysqli("localhost", "root", "", "ban_hang");
    mysqli_query($conn, $xoa_nguoi_dung);
    mysqli_close($conn);
?>