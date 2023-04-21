<?php
    $conn = mysqli_connect("localhost", "root", "", "ban_hang");

    if(isset($_SESSION["uid"])){
        $dang_nhap = "SELECT * FROM nguoi_dung WHERE nguoi_dung_id = ".$_SESSION['uid'];
        $tv_dang_nhap = mysqli_query($conn,$dang_nhap);
        $row=mysqli_fetch_array($tv_dang_nhap);
        echo '
            <span class="top_nav"><a class="nav-link" href="?thamso=thong_tin_nguoi_dung">Hi, '.$row['ho_ten'].'</a></span>
            <span class="top_nav"><a class="nav-link" href="./chuc_nang/nguoi_dung/dang_xuat.php" onclick="return confirm(\'Bạn có chắc chắn muốn đăng xuất không?\')">đăng xuất</a></span>
        ';
    }else{ 
        echo '
        <span class="top_nav"><a class="nav-link" href="./chuc_nang/nguoi_dung/dang_nhap.php">đăng nhập</a></span>
        <span class="top_nav"><a class="nav-link" href="./chuc_nang/nguoi_dung/dang_ky.php">đăng ký</a></span>
        ';
    }
?>