<?php 
	if(!isset($bien_bao_mat)){exit();}
?>
<?php 
	$tv="select * from slideshow order by id ";
	$conn = new mysqli("localhost", "root", "", "ban_hang");
	$tv_1 = mysqli_query($conn, $tv);
	$tv_2 = mysqli_fetch_array($tv_1);
?>

<table width="990px" class="tb_a1" >
	<tr style="background:#CCFFFF;height:40px;" >
		<td width="710px" ><b>Hình ảnh</b></td>
		<td align="center" width="140px" ><b>Sửa</b></td>
		<td align="center" width="140px" ><b>Xóa</b></td>
	</tr>
	<?php 
		while($tv_2=mysqli_fetch_array($tv_1))
		{
			$id=$tv_2['id'];
			$link_hinh="../hinh_anh/slideshow/".$tv_2['hinh'];
			$link_sua="?thamso=sua_slideshow&id=".$id;
			$link_xoa="?xoa_slideshow=co&id=".$id;
			?>
				<tr class="a_1" >
					<td align="center" >
						<a href="<?php echo $link_sua; ?>" >
							<img src="<?php echo $link_hinh; ?>" style="width:600px;margin-top:10px;margin-bottom:10px;" border="0" >
						</a>
					</td>
					<td align="center" >
						<a href="<?php echo $link_sua; ?>" class="lk_a1" >Sửa</a>
					</td>
					<td align="center" >
						<a href="<?php echo $link_xoa; ?>" class="lk_a1" >Xóa</a>
					</td>
				</tr>
			<?php 
		}
	?>

</table>