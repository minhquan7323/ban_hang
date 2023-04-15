<?php 
	if(!isset($bien_bao_mat)){exit();}
?>

<?php 

	$tv="select id,ten,gia,hinh_anh from san_pham where noi_bat='co' order by id desc limit 0,10";

	$conn = new mysqli("localhost", "root", "", "ban_hang");
	$tv_1 = mysqli_query($conn, $tv);
	$tv_2 = mysqli_fetch_array($tv_1);
?>
<div style="width:990px;text-align:left" >
	<form method="post" >
		<table width="850px" class="tb_a1" >
			<tr style="background:#CCFFFF;height:40px;" >
				<td width="120px" ><b>Hình ảnh</b></td>
				<td width="450px" ><b>Tên</b></td>
				<td align="center" width="140px" ><b>Giá</b></td>
				<td align="center" width="140px" ><b>Nổi bật</b></td>
			</tr>
			<?php 
				$i=1;
				while($tv_2=mysqli_fetch_array($tv_1))
				{
					$id=$tv_2['id'];
					$ten=$tv_2['ten'];
					$gia=$tv_2['gia'];
					$gia=number_format($gia,0,",",".");
					$link_hinh="../hinh_anh/san_pham/".$tv_2['hinh_anh'];
					$ten_select="select_".$i;
					$ten_id="id_".$i;
					?>
						<tr class="a_1" >
							<td align="center" >
								<img src="<?php echo $link_hinh; ?>" style="width:100px;margin-top:10px;margin-bottom:10px;" border="0" >
							</td>
							<td>
								<?php echo $ten; ?>
							</td>
							<td align="center" >
								<?php echo $gia; ?>
							</td>
							<td align="center" >
								<select name="<?php echo $ten_select; ?>" >
									<option value="" >Không</option>
									<option value="co" selected >Có</option>
								</select>
								<input  type="hidden" value="<?php echo $id; ?>" name="<?php echo $ten_id; ?>" >
							</td>
		
						</tr>
					<?php				
					$i++;
				}
			?>
			<tr>
				<td colspan="3" align="center" >
					&nbsp;
				</td>
				<td align="center" >
					<br>
					<input type="submit" name="bieu_mau_san_pham_noi_bat" value="Cập nhật" style="width:120px;height:40px;font-size:20px" >
					<br><br>
				</td>			
			</tr>

		</table>
	</form>
</div>