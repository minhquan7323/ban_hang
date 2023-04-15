<?php 
	if(!isset($bien_bao_mat)){exit();}
?>
<?php 
	$ten_menu=trim($_POST['ten']);
	$ten_menu=str_replace("'","&#39;",$ten_menu);
	$id=$_GET['id'];
	if($ten_menu!="")
	{
		$tv="
		UPDATE menu_doc SET 
		ten = '$ten_menu'
		WHERE id =$id;
		";
		mysqli_query($conn, $tv);
	}
	else 
	{
		thong_bao_html("Tên menu chưa được điền vào");
	}
?>