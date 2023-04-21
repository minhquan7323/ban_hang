<?php 
	if(isset($_GET['thamso'])) $tham_so=$_GET['thamso'];
	else $tham_so="";
		
	switch($tham_so) {
		case "xuat_san_pham":
			include("chuc_nang/san_pham/xuat.php");
		break;
		case "chi_tiet_san_pham":
			include("chuc_nang/san_pham/chi_tiet_san_pham.php");
		break;
		case "xuat_san_pham_2":
			include("chuc_nang/san_pham/xuat_toan_bo_san_pham.php");
		break;
		case "xuat_san_pham_loc":
			include("chuc_nang/san_pham/xuat_san_pham_loc.php");
		break;
		case "xuat_mot_tin":
			include("chuc_nang/xuat_mot_tin.php");
		break;
		case "tim_kiem":
			include("chuc_nang/tim_kiem/xuat_san_pham_tim_kiem.php");
		break;
		case "gio_hang":
			include("chuc_nang/gio_hang/gio_hang.php");
		break;
		case "dang_nhap":
			include("chuc_nang/nguoi_dung/dang_nhap.php");
		break;
		case "dang_ky":
			include("chuc_nang/nguoi_dung/dang_ky.php");
		break;
		case "thong_tin_nguoi_dung":
			include("chuc_nang/nguoi_dung/thong_tin_nguoi_dung.php");
		break;
		case "hinh_thuc_thanh_toan":
			include("chuc_nang/gio_hang/hinh_thuc_thanh_toan.php");
		break;
		case "lich_su_don_hang":
			include("chuc_nang/gio_hang/lich_su_don_hang.php");
		break;
		case "xem_hoa_don":
			include("chuc_nang/gio_hang/chi_tiet_don_hang.php");
		break;
		default:
			include("chuc_nang/slideshow/slideshow.php");	
			include("chuc_nang/san_pham/san_pham_trang_chu.php");	
	}
?>