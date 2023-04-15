<?php 
	$conn = new mysqli("localhost", "root", "", "ban_hang");

	if(isset($_SESSION['id_them_vao_gio'])) {
		$ten_nguoi_mua=trim($_POST['ten_nguoi_mua']);
		$email=trim($_POST['email']);
		$dien_thoai=trim($_POST['dien_thoai']);
		$dia_chi=trim(nl2br($_POST['dia_chi']));
		$noi_dung=nl2br($_POST['noi_dung']);
		$ngay_mua = date('Y-m-d');

		if($ten_nguoi_mua!="" and $dien_thoai!="" and $dia_chi!="") {
			$hang_duoc_mua="";
			$tong_tien = 0;

			for ($i = 0; $i < count($_SESSION['id_them_vao_gio']); $i++) {
				$hang_duoc_mua = $hang_duoc_mua . $_SESSION['id_them_vao_gio'][$i] . "[|||]" . $_SESSION['sl_them_vao_gio'][$i] . "[|||||]";
				
				$id_san_pham = $_SESSION['id_them_vao_gio'][$i];
				$query = "SELECT gia FROM san_pham WHERE id = $id_san_pham";
				$result = mysqli_query($conn, $query);
				$row = mysqli_fetch_assoc($result);
				$gia = $row['gia'];
				
				$sl = $_SESSION['sl_them_vao_gio'][$i];
				$tong_tien += $gia * $sl;
			}

			$tong_tien = $tong_tien;		
			$tv="INSERT INTO hoa_don (
            id ,
            ten_nguoi_mua ,
            email ,
            dia_chi ,
            dien_thoai ,
            noi_dung ,
            hang_duoc_mua,
			ngay_mua,
			tong_tien
            )
            VALUES (
            NULL ,
            '$ten_nguoi_mua',
            '$email',
            '$dia_chi',
            '$dien_thoai',
            '$noi_dung',
            '$hang_duoc_mua',
			'$ngay_mua',
			'$tong_tien'
            );";
			mysqli_query($conn, $tv);
			unset($_SESSION['id_them_vao_gio']);
			unset($_SESSION['sl_them_vao_gio']);
			thong_bao_html_roi_chuyen_trang("Cảm ơn bạn đã mua hàng tại web site chúng tôi","index.php");
		}
		else {
			thong_bao_html("Không được bỏ trống tên người mua , điện thoại , địa chỉ");
			trang_truoc();
			exit();
		}
	}
?>