<?php 
	if(!isset($bien_bao_mat)){exit();}
	$rong=$_POST['rong'];
	$cao=$_POST['cao'];
	$ten_file_anh_tai_len=$_FILES['hinh_anh']['name'];
	if($ten_file_anh_tai_len!="")
	{
		$ten_file_anh=$ten_file_anh_tai_len;
	}
	else 
	{
		$ten_file_anh=$_POST['ten_anh'];
	}
	if($ten_file_anh_tai_len!="")
	{	
		$duong_dan_anh_cu="../hinh_anh/banner/".$_POST['ten_anh'];
		unlink($duong_dan_anh_cu);
		$duong_dan_anh="../hinh_anh/banner/".$ten_file_anh_tai_len;
		move_uploaded_file($_FILES['hinh_anh']['tmp_name'],$duong_dan_anh);		
	}

	$tv="
	UPDATE banner SET 
	hinh = '$ten_file_anh',
	rong = '$rong',
	cao = '$cao' 
	WHERE id= 1;
	";
	mysqli_query($conn, $tv);			

?>