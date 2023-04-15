<?php if(!isset($bien_bao_mat)){exit();}?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="./giao_dien/admin.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
	</head>
	<style>
	</style>
	<body>
		<?php 
			include("chuc_nang/quan_tri_2/dieu_huong.php");
		?>
        <div class="top">
            <div class="tab_menu">
                <div style="width: 250px;">
                    <div class="sidebar">
                        <div class="user">
                            <div class="user_avatar">
                                <i class="fa-solid fa-user fa-2x"></i>
                            </div>
                            <div>
                                <div class="user_name">
                                    <b>Admin</b>
                                </div>
                                <div class="user_designation">
                                    <p>Chào mừng quay trở lại</p>
                                    <br>
                                </div>
                            </div>
                            <hr>
                        </div>
                        <div class="menu">
                            <a href="index.php"><li class="menu_item active"><i class="fas fa-house"></i>Trang chủ</li></a>
                            <a href="?thamso=nguoi_dung"><li class="menu_item"><i class="fas fa-tag"></i>Quản lý người dùng</li></a>
                            <a href="?thamso=quan_ly_san_pham"><li class="menu_item"><i class="fas fa-bag-shopping"></i>Quản lý sản phẩm</li></a>
                            <a href="?thamso=hoa_don"><li class="menu_item"><i class="fas fa-address-card"></i>Quản lý hóa đơn</li></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sign_out">
                <a href="?thamso=thoat"><i class="fas fa-right-from-bracket"></i></a>
            </div>
        </div>
	</body>
</html>