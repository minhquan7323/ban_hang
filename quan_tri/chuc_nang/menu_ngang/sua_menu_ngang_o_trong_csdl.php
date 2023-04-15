<?php 
	if(!isset($bien_bao_mat)){exit();}
?>
<?php 
	$ten_menu=trim($_POST['ten']);
	$ten_menu=str_replace("'","&#39;",$ten_menu);
	$loai_menu=$_POST['loai_menu'];
	$noi_dung=$_POST['noi_dung'];
	$noi_dung=str_replace("'","&#39;",$noi_dung);
	$id=$_GET['id'];
	if($ten_menu!="")
	{
		$tv="
		UPDATE menu_ngang SET 
		ten = '$ten_menu',
		noi_dung = '$noi_dung',
		loai_menu = '$loai_menu' 
		WHERE id =$id;
		";
		mysqli_query($conn, $tv);
	}
	else 
	{
		echo "Tên menu chưa được điền vào";
	}
?>
