<?php 
    $conn = mysqli_connect("localhost", "root", "", "ban_hang");
    foreach ($_POST as $key => $value) {
        if (strpos($key, "tinh_trang_") !== false) {
            $hoa_don_id = str_replace("tinh_trang_", "", $key);
            $tinh_trang = mysqli_real_escape_string($conn, $value);
            $tv_tinh_trang = "UPDATE hoa_don SET tinh_trang = '$tinh_trang' WHERE id = '$hoa_don_id'";
            mysqli_query($conn, $tv_tinh_trang);
        }
    }
    if (mysqli_query($conn, $tv_tinh_trang)) {
        echo '<script>alert("Cập nhật thành công!");</script>';
    }
?>