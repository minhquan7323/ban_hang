<?php if(!isset($bien_bao_mat)){exit();} ?>
<div class="content">
    <div class="row">
        <div class="title col-12 box_shadow">
            <b>Thêm người dùng</b>
        </div>
    </div>
    <div class="row main_frame box_card box_shadow">
        <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $tai_khoan = $_POST['tai_khoan'];
                $mat_khau = $_POST['mat_khau'];
                $email = $_POST['email'];
                if (empty($tai_khoan) || empty($mat_khau) || empty($email))
                    echo "<div class='tb'>Vui lòng điền đầy đủ thông tin.</div>";
                else {
                    $conn = mysqli_connect("localhost", "root", "", "ban_hang");
                    $query = "INSERT INTO nguoi_dung (tai_khoan, mat_khau, email) VALUES ('$tai_khoan', '$mat_khau', '$email')";
                    mysqli_query($conn, $query);
                    header('Location: ../quan_tri/?thamso=nguoi_dung');
                    exit;
                }
            }
        ?>  
        <div class="table-responsive-lg">
        <table class="table table-bordered">
            <form action="" method="post" class="width_form">
                <div class="row g-3 w">
                    <div class="col-6">
                        <input type="text" name="ho" class="form-control" placeholder="Họ">
                    </div>
                    <div class="col-6">
                        <input type="text" name="ten" class="form-control" placeholder="Tên">
                    </div>
                    <div class="col-6">
                        <input type="text" name="tai_khoan" class="form-control" placeholder="Tên đăng nhập">
                    </div>
                    <div class="col-6">
                        <input type="password" name="mat_khau" class="form-control" placeholder="Mật khẩu">
                    </div>
                    <div class="col-6">
                        <input type="email" name="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="col-6">
                        <input type="text" name="so_dien_thoai" class="form-control" placeholder="Số điện thoại">
                    </div>
                    <div class="col-12">
                        <input type="text" name="dia_chi" class="form-control" placeholder="Địa chỉ">
                    </div>
                    <div class="col-12">
                        <input type="text" ame="thanh_pho" class="form-control" placeholder="Thành phố">
                    </div>
                </div>
                <br>
                <button type="submit" class="btn btn-outline-success">Thêm người dùng</button>
            </form>
        </table>
        </div>
    </div>
</div>