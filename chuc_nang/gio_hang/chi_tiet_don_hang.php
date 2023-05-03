<?php 
	$conn = new mysqli("localhost", "root", "", "ban_hang");
	$id=$_GET['id'];

	$tv="SELECT * FROM hoa_don WHERE id='$id' ";
	$tv_1 = mysqli_query($conn, $tv);
	$tv_2 = mysqli_fetch_array($tv_1);

	$ten_nguoi_mua=$tv_2['ten_nguoi_mua'];
	$email=$tv_2['email'];
	$dien_thoai=$tv_2['dien_thoai'];
	$dia_chi=$tv_2['dia_chi'];
	$quan_huyen=$tv_2['quan_huyen'];
	$tinh_thanh=$tv_2['tinh_thanh'];
	$noi_dung=$tv_2['noi_dung'];
	$hang_duoc_mua=$tv_2['hang_duoc_mua'];
	$ngay_mua=$tv_2['ngay_mua'];
	$tinh_trang=$tv_2['tinh_trang'];
	$phuong_thuc_thanh_toan=$tv_2['phuong_thuc_thanh_toan'];
?>
<h4 class="title">Chi tiết đơn hàng</h4>
<div class="chi_tiet_don_hang">
	<div><span><b>Tình trạng đơn hàng:</b></span> <?php echo $tinh_trang; ?></div>
	<div class="chi_tiet_dia_chi">
		<span><b>Địa chỉ đặt hàng: </b></span> <?php echo $ten_nguoi_mua." - " .$dien_thoai." - ".$dia_chi.", ".$quan_huyen.", ".$tinh_thanh;?> <br>
		<span><b>Email: </b></span> <?php echo $email; ?><br>
		<span><b>Ngày đặt hàng: </b></span> <?php echo $ngay_mua; ?><br>
		<span><b>Ghi chú: </b></span> <?php echo $noi_dung; ?><br>
	</div>
	<div>
		<h5>Sản phẩm đã mua: </h5>
		<table>
		<tr>
			<th width="400px">Tên sản phẩm</th>
			<th width="150px">Giá</th>
			<th width="100px">Số lượng</th>
			<th width="150px">Tổng cộng</th>
		</tr>
		<?php
			$hang_duoc_mua = $tv_2['hang_duoc_mua'];
			$m = explode("[|||||]", $hang_duoc_mua);    
			$tong_lon = 0;

			for ($i = 0; $i < count($m); $i++) {
				if (isset($m[$i]) && $m[$i] != "") {
					$stt = $i + 1;
					$m_2 = explode("[|||]", $m[$i]);
					$id_sp = $m_2[0];
					$sl_sp = $m_2[1];
					if($id_sp!=0) {
						$tv_sp = "SELECT id, ten, gia FROM san_pham WHERE id = '$id_sp'";
						$tv_sp_1 = mysqli_query($conn, $tv_sp);
						$tv_sp_2 = mysqli_fetch_array($tv_sp_1);
						$ten = $tv_sp_2['ten'];
						$gia = $tv_sp_2['gia'];
						$tong = $gia * $sl_sp;
						$tong_lon += $tong;

						if ($sl_sp != 0) {
							?>
							<tr>
								<td><?php echo $ten; ?></td>
								<td><?php echo number_format($gia, 0, ",", "."); ?><u>đ</u></td>
								<td><?php echo $sl_sp; ?></td>
								<td><?php echo number_format($tong, 0, ",", "."); ?><u>đ</u></td>
							</tr>
			<?php
						}
					}
				}
				
			}
			echo '
				<tr>
				<th style="text-align:end;">Phương thức thanh toán:</th>
                <td>'.$phuong_thuc_thanh_toan.'</td>
				<td><b>Thành tiền:</b></td>
				<td>'.number_format($tong_lon, 0, ",", ".").'<u>đ</u></td>
				</tr>
			';
		?>
		</table>
	</div>
</div>