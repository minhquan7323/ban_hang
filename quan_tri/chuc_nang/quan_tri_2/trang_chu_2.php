<?php if(!isset($bien_bao_mat)){exit();} ?>
<?php
    $conn = new mysqli("localhost", "root", "", "ban_hang");
    $tong_khach_hang = "select * from nguoi_dung";
    $tong_khach_hang_1 = mysqli_query($conn, $tong_khach_hang);
    $tong_khach_hang_2 = mysqli_num_rows($tong_khach_hang_1);

	$tong_san_pham = "select * from san_pham";
    $tong_san_pham_1 = mysqli_query($conn, $tong_san_pham);
    $tong_san_pham_2 = mysqli_num_rows($tong_san_pham_1);

	$tong_hoa_don = "SELECT * FROM hoa_don";
	$tong_hoa_don_1 = mysqli_query($conn, $tong_hoa_don);
	$tong_hoa_don_2 = mysqli_num_rows($tong_hoa_don_1);

	$tong_thu_nhap = "SELECT SUM(tong_tien) AS total_tong_tien FROM hoa_don";
	$tong_thu_nhap_1 = mysqli_query($conn, $tong_thu_nhap);
	$tong_thu_nhap_2 = mysqli_fetch_assoc($tong_thu_nhap_1);
	$tong = number_format($tong_thu_nhap_2['total_tong_tien'], 0, ",", ".");
?>
<div class="content">
    <div class="row">
        <div class="title col-12 box_shadow">
            <b>Trang chủ</b>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-sm-6">
                    <div class="box_card box_shadow mb-3">
                        <div class="card-header">TỔNG KHÁCH HÀNG</div>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $tong_khach_hang_2 ?> khách hàng</h5>
                            <p class="card-text">Tổng số khách hàng được quản lý.</p>
                        </div>
                    </div>
                </div>
				<div class="col-sm-6">
					<div class="box_card box_shadow mb-3">
						<div class="card-header">TỔNG SẢN PHẨM</div>
						<div class="card-body">
							<h5 class="card-title"><?php echo $tong_san_pham_2 ?> sản phẩm</h5>
							<p class="card-text">Tổng số sản phẩm được quản lý.</p>
						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="box_card box_shadow mb-3">
						<div class="card-header">TỔNG ĐƠN HÀNG</div>
						<div class="card-body">
							<h5 class="card-title"><?php echo $tong_hoa_don_2 ?> đơn hàng</h5>
							<p class="card-text">Tổng số hóa đơn bán hàng trong tháng.</p>
						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="box_card box_shadow mb-3">
						<div class="card-header">TỔNG THU NHẬP</div>
						<div class="card-body">
							<h5 class="card-title"><?php echo $tong ?> VNĐ</h5>
							<p class="card-text">Tổng thu nhập.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>