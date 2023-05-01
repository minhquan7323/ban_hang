<?php
    $conn = new mysqli("localhost", "root", "", "ban_hang");
    $nguoi_dung_id=$_SESSION['uid'];

    $ho_ten=trim($_POST['ho_ten']);
    $ho_ten=str_replace("'","&#39;",$ho_ten);
    $mat_khau=$_POST['mat_khau'];
    $ho_ten=$_POST['ho_ten'];
    $email=$_POST['email'];
    $so_dien_thoai=$_POST['so_dien_thoai'];
    $dia_chi=$_POST['dia_chi'];
    $tinh_thanh=$_POST['tinh_thanh'];
    $quan_huyen=$_POST['quan_huyen'];

    $tv_k2="SELECT * FROM nguoi_dung";
    mysqli_query($conn, $tv_k2);
    $phone_number_regex = '/^0\d{9}$/';
    if (!preg_match($phone_number_regex, $so_dien_thoai)) {
        echo "<script>alert('Số điện thoại này không hợp lệ. Vui lòng nhập số điện thoại khác.');</script>";
    }
    else {
        $tv_k="
        UPDATE nguoi_dung SET 
        ho_ten = '$ho_ten',
        tai_khoan = '$tai_khoan',
        email = '$email',
        mat_khau = '$mat_khau',
        dia_chi = '$dia_chi',
        so_dien_thoai = '$so_dien_thoai',
        tinh_thanh = '$tinh_thanh',
        quan_huyen = '$quan_huyen' 
        WHERE nguoi_dung_id ='$nguoi_dung_id';
        ";
        mysqli_query($conn, $tv_k);
    }
?>