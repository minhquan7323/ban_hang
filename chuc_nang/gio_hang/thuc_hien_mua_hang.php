<?php 
	$conn = new mysqli("localhost", "root", "", "ban_hang");
    $tv_uid="SELECT * FROM nguoi_dung WHERE nguoi_dung_id =".$_SESSION['uid'];
    $tv_uid_1 = mysqli_query($conn, $tv_uid);
    $tv_uid_2 = mysqli_fetch_array($tv_uid_1);
    $ho_ten=$tv_uid_2['ho_ten'];
    $tai_khoan=$tv_uid_2['tai_khoan'];
    $mat_khau=$tv_uid_2['mat_khau'];
    $email=$tv_uid_2['email'];
    $so_dien_thoai=$tv_uid_2['so_dien_thoai'];
    $dia_chi=$tv_uid_2['dia_chi'];
	$tinh_thanh=$tv_uid_2['tinh_thanh'];
	$quan_huyen=$tv_uid_2['quan_huyen'];
	$thanh_toan=$_POST['thanh_toan'];

	$ho_ten_moi=$_POST['ho_ten_moi'];
	$so_dien_thoai_moi=$_POST['so_dien_thoai_moi'];
	$dia_chi_moi=$_POST['dia_chi_moi'];
	$quan_huyen_moi=$_POST['quan_huyen_moi'];
	$tinh_thanh_moi=$_POST['tinh_thanh_moi'];
	$_SESSION["dia_chi_nhan_hang_moi"] = array(
		"ho_ten_moi" => $ho_ten_moi,
		"so_dien_thoai_moi" => $so_dien_thoai_moi,
		"dia_chi_moi" => $dia_chi_moi,
		"quan_huyen_moi" => $quan_huyen_moi,
		"tinh_thanh_moi" => $tinh_thanh_moi
	);
	
	if(isset($_SESSION['id_them_vao_gio'])) {
		$ho_ten = trim($ho_ten);
		$so_dien_thoai=trim($so_dien_thoai);
		$dia_chi=trim(nl2br($dia_chi));
		$tinh_thanh=trim(nl2br($tinh_thanh));
		$quan_huyen=trim(nl2br($quan_huyen));
		$noi_dung=nl2br($_POST['ghi_chu']);
		$ngay_mua = date('Y-m-d');
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
		if(isset($_SESSION["dia_chi_nhan_hang_moi"]))
			$tv="INSERT INTO hoa_don (
				id ,
				nguoi_dung_id,
				ten_nguoi_mua ,
				email ,
				dia_chi ,
				quan_huyen,
				tinh_thanh,
				dien_thoai ,
				noi_dung ,
				hang_duoc_mua,
				ngay_mua,
				tong_tien,
				tinh_trang
				)
				VALUES (
				NULL ,
				'{$_SESSION["uid"]}',
				'$ho_ten_moi',
				'$email',
				'$dia_chi_moi',
				'$quan_huyen_moi',
				'$tinh_thanh_moi',
				'$so_dien_thoai_moi',
				'$noi_dung',
				'$hang_duoc_mua',
				'$ngay_mua',
				'$tong_tien',
				'$thanh_toan'
				);";
		else 
			$tv="INSERT INTO hoa_don (
				id ,
				nguoi_dung_id,
				ten_nguoi_mua ,
				email ,
				dia_chi ,
				quan_huyen,
				tinh_thanh,
				dien_thoai ,
				noi_dung ,
				hang_duoc_mua,
				ngay_mua,
				tong_tien,
				tinh_trang
				)
				VALUES (
				NULL ,
				'{$_SESSION["uid"]}',
				'$ho_ten',
				'$email',
				'$dia_chi',
				'$quan_huyen',
				'$tinh_thanh',
				'$so_dien_thoai',
				'$noi_dung',
				'$hang_duoc_mua',
				'$ngay_mua',
				'$tong_tien',
				'$thanh_toan'
				);";
		mysqli_query($conn, $tv);
		unset($_SESSION['id_them_vao_gio']);
		unset($_SESSION['sl_them_vao_gio']);
		thong_bao_html_roi_chuyen_trang("Cảm ơn bạn đã mua hàng tại web site chúng tôi","index.php");
	}
?>