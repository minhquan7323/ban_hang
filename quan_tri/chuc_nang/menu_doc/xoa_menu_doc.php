<?php 
	if(!isset($bien_bao_mat)){exit();}
?>
<?php 
	$id=$_GET['id'];
	$tv="select count(*) from san_pham where thuoc_menu='$id' ";
	$conn = new mysqli("localhost", "root", "", "ban_hang");
	$tv_1 = mysqli_query($conn, $tv);
	$tv_2 = mysqli_fetch_array($tv_1);
	if($tv_2[0]==0)
	{
		$truy_van_xoa="DELETE FROM menu_doc WHERE id = $id ";
		mysqli_query($conn, $truy_van_xoa);
	}
	else 
	{
		thong_bao_html("Menu này vẫn còn dữ liệu nên không thể xóa");
	}
?>