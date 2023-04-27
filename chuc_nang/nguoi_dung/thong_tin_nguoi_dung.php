<?php 
	$conn = new mysqli("localhost", "root", "", "ban_hang");
	$tv="SELECT * FROM nguoi_dung WHERE nguoi_dung_id =".$_SESSION['uid'];
	$tv_1 = mysqli_query($conn, $tv);
	$tv_2 = mysqli_fetch_array($tv_1);
	$ho_ten=$tv_2['ho_ten'];
	$tai_khoan=$tv_2['tai_khoan'];
	$mat_khau=$tv_2['mat_khau'];
	$email=$tv_2['email'];
	$so_dien_thoai=$tv_2['so_dien_thoai'];
	$dia_chi=$tv_2['dia_chi'];
	$tinh_thanh=$tv_2['tinh_thanh'];
	$quan_huyen=$tv_2['quan_huyen'];
?>
<html>
    <head>
		<link rel="stylesheet" type="text/css" href="./giao_dien/giao_dien.css">
		<link rel="stylesheet" href="./phan_bo_tro/fontawesome-free-6.2.0-web/css/all.css">
		<link rel="stylesheet" href="./phan_bo_tro/font_Roboto/Roboto-Bold.ttf">
		<link rel="stylesheet" href="./phan_bo_tro/bootstrap-5.2.2-dist/css/bootstrap.min.css">
		<script src="./phan_bo_tro/bootstrap-5.2.2-dist/js/bootstrap.bundle.js"></script>
	</head>	
    <body>
        <h3 class="title">Thông tin người dùng</h3>
        <div class="row">
            <div id="btn_thong_tin_nguoi_dung" class="col-3">
                <span><a href='?thamso=sua_thong_tin'><button type="button" class="btn btn-secondary">Sửa thông tin</button></a></span>
                <br><br>
                <span><a href='?thamso=lich_su_don_hang'><button type="button" class="btn btn-success">Lịch sử đơn hàng</button></a></span>
            </div>
            <div class="content col-9">
                <div class="row main_frame box_card box_shadow">
                    <div class="table-responsive-lg">
                        <table class="table table-bordered">
                            <div class="row g-3 w">
                                <div class="col-12 form-floating">
                                    <input type="text" value="<?php echo $ho_ten; ?>" name="ho_ten" class="form-control" placeholder="Họ và tên" required readonly>
                                    <label for="floatingInput">Họ và tên</label>
                                </div>
                                <div class="col-6 form-floating">
                                    <input type="text" value="<?php echo $tai_khoan; ?>" name="tai_khoan" class="form-control" placeholder="Tên đăng nhập" required readonly>
                                    <label for="floatingInput">Tài khoản</label>
                                </div>
                                <div class="col-6 form-floating">
                                    <input type="text" value="<?php echo $mat_khau; ?>" name="mat_khau" class="form-control" placeholder="Mật khẩu" required readonly>
                                    <label for="floatingInput">Mật khẩu</label>
                                </div>
                                <div class="col-6 form-floating">
                                    <input type="email" value="<?php echo $email; ?>" name="email" class="form-control" placeholder="Email" required readonly>
                                    <label for="floatingInput">Email</label>
                                </div>
                                <div class="col-6 form-floating">
                                    <input type="text" value="<?php echo $so_dien_thoai; ?>" name="so_dien_thoai" class="form-control" placeholder="Số điện thoại" required readonly>
                                    <label for="floatingInput">Số điện thoại</label>
                                </div>
                                <div class="col-12 form-floating">
                                    <input type="text" value="<?php echo $dia_chi; ?>" name="dia_chi" class="form-control" placeholder="Địa chỉ" required readonly>
                                    <label for="floatingInput">Địa chỉ</label>
                                </div>
                                <div class="col-6 form-floating">
                                    <input type="text" value="<?php echo $tinh_thanh; ?>" name="tinh_thanh" class="form-control" placeholder="Địa chỉ" required readonly>
                                    <label for="floatingInput">Tỉnh thành</label>
                                </div>
                                <div class="col-6 form-floating">
                                    <input type="text" value="<?php echo $quan_huyen; ?>" name="quan_huyen" class="form-control" placeholder="Địa chỉ" required readonly>
                                    <label for="floatingInput">Quận huyện</label>
                                </div>
                            </div>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>