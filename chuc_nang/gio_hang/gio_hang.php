<?php 
	if(isset($_GET['id']) and $_SESSION['trang_chi_tiet_gio_hang']=="co") {
		$_SESSION['trang_chi_tiet_gio_hang']="huy_bo";
		if(isset($_SESSION['id_them_vao_gio'])) {
			$so=count($_SESSION['id_them_vao_gio']);
			$trung_lap="khong";
			for($i=0;$i<count($_SESSION['id_them_vao_gio']);$i++) {
				if($_SESSION['id_them_vao_gio'][$i]==$_GET['id']) {
					$trung_lap="co";
					$vi_tri_trung_lap=$i;
					break;
				}
			}
			if($trung_lap=="khong") {
				$_SESSION['id_them_vao_gio'][$so]=$_GET['id'];
				$_SESSION['sl_them_vao_gio'][$so]=$_GET['so_luong'];
			}
			if($trung_lap=="co") {
				$_SESSION['sl_them_vao_gio'][$vi_tri_trung_lap]=$_SESSION['sl_them_vao_gio'][$vi_tri_trung_lap]+$_GET['so_luong'];
			}
		}
		else {
			$_SESSION['id_them_vao_gio'][0]=$_GET['id'];
			$_SESSION['sl_them_vao_gio'][0]=$_GET['so_luong'];
		}
	}

	$gio_hang="khong";
	if(isset($_SESSION['id_them_vao_gio'])) {
		$so_luong=0;
		for($i=0;$i<count($_SESSION['id_them_vao_gio']);$i++) {
			$so_luong=$so_luong+$_SESSION['sl_them_vao_gio'][$i];
		}
		if($so_luong!=0) {
			$gio_hang="co";
		}
	}
	
	echo "<h3 class='title'>Giỏ hàng</h3>";
	echo "<br>";
	echo "<br>";
	if($gio_hang=="khong") {
		echo "Không có sản phẩm trong giỏ hàng";
	}
	else {
		echo "<form action='' method='post' >"; 
		echo "<input type='hidden' name='cap_nhat_gio_hang' value='co' > ";
		echo "<table class='gio_hang_tb'>";
		echo "<tr>";
		echo "<th width='300px' >Tên</th>";
		echo "<th width='100px' >Số lượng</th>";
		echo "<th width='100px' >Đơn giá</th>";
		echo "<th width='100px' >Thành tiền</th>";
		echo "<th width='100px' >Cập nhật</th>";
		echo "<th width='100px' >Xóa</th>";
		echo "</tr>";
		$tong_cong=0;
		for($i=0;$i<count($_SESSION['id_them_vao_gio']);$i++) {
			$tv="select id,ten,gia from san_pham where id='".$_SESSION['id_them_vao_gio'][$i]."'";
			$conn = new mysqli("localhost", "root", "", "ban_hang");
			$tv_1 = mysqli_query($conn, $tv);
			$tv_2 = mysqli_fetch_array($tv_1);
			if($_SESSION['sl_them_vao_gio'][$i]==0) $tien=0;
			else $tien=$tv_2['gia']*$_SESSION['sl_them_vao_gio'][$i];
			$tong_cong=$tong_cong+$tien;
			$name_id="id_".$i;
			$name_sl="sl_".$i;
			if($_SESSION['sl_them_vao_gio'][$i]!=0) {
				echo "<tr>";
				echo "<td>".$tv_2['ten']."</td>";
				echo "<td>";
				echo "<input type='hidden' name='".$name_id."' value='".$_SESSION['id_them_vao_gio'][$i]."' >";
				echo "<input type='number' min='1' style='width:50px' name='".$name_sl."' value='". $_SESSION['sl_them_vao_gio'][$i]."' > ";
				echo "</td>";
				echo "<td>".number_format($tv_2['gia'],0,",",".")."<u>đ</u></td>";
				echo "<td>".number_format($tien,0,",",".")."<u>đ</u></td>";
				echo "<td><input type='submit' name='cap_nhat' value='Cập nhật' ></td>";
				echo "<td><input type='submit' name='xoa_".$i."' value='Xóa' ></td>";
				echo "</tr>";
			}
		}   
		echo "</table>";
		echo "</form>";
		echo "<br>";
		echo "<b>Tổng giá trị đơn hàng là</b> : ".number_format($tong_cong,0,",",".")."<u>đ</u><br><br	>";

		if(isset($_SESSION['uid'])) echo "<a href='?thamso=hinh_thuc_thanh_toan'><button type='button' class='btn btn-success'>Tiến hành thanh toán</button></a>";
		else echo "Bạn cần đăng nhập để tiến hành thanh toán. <a href='./chuc_nang/nguoi_dung/dang_nhap.php'>Đăng nhập</a>";

	}
?>