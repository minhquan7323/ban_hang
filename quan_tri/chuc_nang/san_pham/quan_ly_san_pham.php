<?php if(!isset($bien_bao_mat)){exit();}?>

<?php 
	if(!isset($_GET['id_menu'])) {
		$id_menu="toan_bo_san_pham";
	}
	else {
		if($_GET['id_menu']!="" and $_GET['id_menu']!="toan_bo_san_pham"){
			$id_menu=$_GET['id_menu'];
		} else {
			$id_menu="toan_bo_san_pham";
		}
	}
?>
	
<?php 
	$so_dong_tren_mot_trang=10;
	if(!isset($_GET['trang'])) $_GET['trang']=1;
	if($id_menu=="toan_bo_san_pham") $tv="select count(*) from san_pham";
	else $tv="select count(*) from san_pham where thuoc_menu='$id_menu' ";
	$tv_1 = mysqli_query($conn, $tv);
	$tv_2 = mysqli_fetch_array($tv_1);
	$so_trang=ceil($tv_2[0]/$so_dong_tren_mot_trang);
	
	$vtbd=($_GET['trang']-1)*$so_dong_tren_mot_trang;
	if($id_menu=="toan_bo_san_pham") {
		$tv="select id,ten,gia,hinh_anh from san_pham order by id desc limit $vtbd,$so_dong_tren_mot_trang";
	}
	else {
		$tv="select id,ten,gia,hinh_anh from san_pham where thuoc_menu='$id_menu' order by id desc limit $vtbd,$so_dong_tren_mot_trang";
	}
	$tv_1 = mysqli_query($conn, $tv);
?>
<div class="content">
        <div class="row">
            <div class="title col-12 box_shadow">
                <b>Quản lý sản phẩm</b>
            </div>
        </div>
        <div class="row main_frame box_card box_shadow">
			<div class="element_btn">
                <span>
                    <a href="?thamso=them_san_pham" class="addnew_btn"><i class="fas fa-plus"></i>Thêm sản phẩm</a>
				</span>
				<span class="loc">
				<!-- class="form-select" -->
					Lọc: <select aria-label="Default select example" name="danh_muc" onchange="window.location='?thamso=quan_ly_san_pham&id_menu='+this.value" >
					<option value="" >Toàn bộ sản phẩm</option>
					<?php 
						$tv_loc="select * from menu_doc order by id ";
						$tv_loc_1 = mysqli_query($conn, $tv_loc);
						$a="";
						while($tv_loc_2=mysqli_fetch_array($tv_loc_1)) {
							$ten=$tv_loc_2['ten'];
							$id=$tv_loc_2['id'];
							if($id_menu==$id) {
								$a="selected";
							}
							echo "<option value='$id' $a >".$ten."</option>";
							$a="";
						}
					?>
					</select>
				</span>
            </div>
            <div class="table-responsive-lg">
			<table class="table table-bordered">
				<thead>
					<tr class="table-secondary">
						<th scope="col">Hình ảnh</th>
						<th scope="col">Tên sản phẩm</th>
						<th scope="col">Giá</th>
						<th scope="col">Sửa</th>
						<th scope="col">Xóa</th>
					</tr>
				</thead>
				
				<tbody>
					<?php
						while ($tv_2 = mysqli_fetch_array($tv_1)) {
							$id=$tv_2['id'];
							$ten=$tv_2['ten'];
							$gia=$tv_2['gia'];
							$gia=number_format($gia,0,",",".");
							$link_hinh="../hinh_anh/san_pham/".$tv_2['hinh_anh'];
							$link_sua="?thamso=sua_san_pham&id_menu=".$id_menu."&id=".$id."&trang=".$_GET['trang'];
							$link_xoa="?xoa_san_pham=co&id=".$id;
					?>
					<tr>
						<td align="center" ><img src="<?php echo $link_hinh; ?>" style="width:80px;" border="0" ></td>
						<td><?php echo $ten; ?></td>
						<td><?php echo $gia; ?></td>
						<td><a href="<?php echo $link_sua; ?>">Sửa</a></td>
                        <td class="link" onclick="if (confirmAlert()) window.location.href='<?php echo $link_xoa; ?>'">Xóa</td>
					</tr>
					<?php
						}
					?>
				</tbody>
			</table>
            </div>
            <div class="category_paging">
				<?php 
					for($i=1;$i<=$so_trang;$i++) {
						$link_phan_trang="?thamso=quan_ly_san_pham&id_menu=".$id_menu."&trang=".$i;
						echo "<a href='$link_phan_trang' class='phan_trang'>";
							echo $i;
						echo "</a> ";
					}
				?>
            </div>
        </div>
    </div>
</div>
<script>
function confirmAlert() {
    if (confirm("Bạn có muốn xóa sản phẩm này không?")) return true
    else return false
}
</script>