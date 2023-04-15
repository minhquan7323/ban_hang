<?php 
	if(!isset($bien_bao_mat)){exit();}
?>
<?php 
	$id=$_GET['id'];
	$tv="DELETE FROM hoa_don WHERE id = $id ";
	mysqli_query($conn, $tv);
?>
