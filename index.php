<?php
	session_start();
    include("ket_noi.php");	
    include("chuc_nang/ham/ham.php");	
	if(isset($_POST['thong_tin_khach_hang']))
	{
		include("chuc_nang/gio_hang/thuc_hien_mua_hang.php");
	}
	if(isset($_POST['cap_nhat_gio_hang']))
	{
		include("chuc_nang/gio_hang/cap_nhat_gio_hang.php");
		trang_truoc();
	}	
?>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Web bán hàng</title>
		<link rel="stylesheet" type="text/css" href="./giao_dien/giao_dien.css">
	</head>
	<body>
		<center>
			<table width="100%">
				<tr>
					<td colspan="3"><?php include("chuc_nang/banner/banner.php"); ?></td>
				</tr>
				<tr>
					<td colspan="3" height="50px">
						<?php
							include("chuc_nang/menu_ngang/menu_ngang.php");
							// include("chuc_nang/slideshow/slideshow.php");
						?> 
					</td>
				</tr>
				<tr>
					<td width="170px" valign="top" >
					<?php 
						include("chuc_nang/menu_doc/menu_doc.php");
						include("chuc_nang/san_pham/moi.php"); 
						// include("chuc_nang/quang_cao/trai.php"); 
					?>					
					</td>
					<td width="650px" align="center" valign="top" >
						<?php 
							include("chuc_nang/dieu_huong.php");
						?>
					</td>
					<td width="170px" align="center" valign="top" >
					<?php
						// include("chuc_nang/nguoi_dung/vung_nguoi_dung.php");
						// include("chuc_nang/tim_kiem/vung_tim_kiem.php");
						include("chuc_nang/gio_hang/vung_gio_hang.php"); 
						include("chuc_nang/san_pham/noi_bat.php");
						// include("chuc_nang/quang_cao/phai.php");
					?>
					</td>
				</tr>
				<tr>
					<td colspan="3"><?php include("chuc_nang/footer/footer.php"); ?></td>
				</tr>
			</table>
		</center>
	</body>
</html>