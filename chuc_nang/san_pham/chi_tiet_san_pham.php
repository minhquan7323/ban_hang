<?php
	$_SESSION['trang_chi_tiet_gio_hang']="co";
	$id=$_GET['id'];
	$tv="select * from san_pham where id='$id'";
	$conn = new mysqli("localhost", "root", "", "ban_hang");
	$tv_1 = mysqli_query($conn, $tv);
	$tv_2 = mysqli_fetch_array($tv_1);
	$link_anh="hinh_anh/san_pham/".$tv_2['hinh_anh'];
	$gia=number_format($tv_2['gia'],0,',','.');
	
?>
<table>
	<tr >
		<td width="300px" align="center" >
			<img src="<?php echo $link_anh; ?>" width="300px" >
		</td>
		<td valign="top" class="ben_phai">
				<h4><?php echo $tv_2["ten"]; ?></h4>
			<span class="gia"><?php echo $gia; ?> đ<span>
			<br><br>
			<form>
				<input type="hidden" name="thamso" value="gio_hang" >
				<input type="hidden" name="id" value="<?php echo $_GET["id"]; ?>" > 
				<span class="so_luong">số lượng:</span><input type="number" name="so_luong" value="1" style="width:50px" min="1">
				<br>
				<input type="submit" value="Thêm vào giỏ" style="margin-left:15px" class="btn_them_vao_gio">
			</form> 
		</td>
	</tr>
</table>
<h1 id="mo_ta">Mô tả</h1>

<div class="mo_ta">
	<p><?php echo $tv_2["noi_dung"]; ?></p>
</div>