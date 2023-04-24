<?php 
    $conn = mysqli_connect("localhost", "root", "", "ban_hang");
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        foreach ($_POST as $key => $value) {
            if (strpos($key, "khoa_mo_") !== false) {
                $nguoi_dung_id = str_replace("khoa_mo_", "", $key);
                $trang_thai = mysqli_real_escape_string($conn, $value);
                $tv_trang_thai = "UPDATE nguoi_dung SET trang_thai = '$trang_thai' WHERE nguoi_dung_id = '$nguoi_dung_id'";
                mysqli_query($conn, $tv_trang_thai);
            }
        }
        if (mysqli_query($conn, $tv_trang_thai)) {
            echo '<script>alert("Cập nhật thành công!");</script>';
        }
    }
?>