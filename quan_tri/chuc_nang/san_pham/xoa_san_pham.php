<?php 
	if(!isset($bien_bao_mat)){exit();}
?>
<?php 
	$id = $_GET['id'];
	$conn = new mysqli("localhost", "root", "", "ban_hang");

	$tv = "SELECT * FROM san_pham WHERE id = '$id'";
	$tv_1 = mysqli_query($conn, $tv);
	$tv_2 = mysqli_fetch_array($tv_1);

	$link_hinh = "../hinh_anh/san_pham/" . $tv_2['hinh_anh'];
	if (is_file($link_hinh)) unlink($link_hinh);

	if ($tv_2['trang_chu'] == 'co') {
		$xoa_hien_thi = "UPDATE san_pham SET trang_chu = '' WHERE id = '$id'";
		mysqli_query($conn, $xoa_hien_thi);
	} else {
		$xoa_san_pham = true;
		while ($tv_2['trang_chu'] == '') {
			$xac_nhan = '<script>confirm("Sản phẩm này chưa được hiển thị trên trang chủ, bạn có chắc muốn xóa không?")</script>';
			echo $xac_nhan;
			if ($xac_nhan == true) {
				$xoa_san_pham = true; break;
			} else {
				$xoa_san_pham = false; break;
			}
		}
		if ($xoa_san_pham) {
			$tv = "DELETE FROM san_pham WHERE id = '$id'";
			mysqli_query($conn, $tv);
		}
	}
?>