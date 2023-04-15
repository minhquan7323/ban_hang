<!-- <?php 
	if(!isset($bien_bao_mat)){exit();}
?>
<style type="text/css" >
	a.lk_2{text-decoration:none;color:black;font-size:22px;line-height:30px;}
	a.lk_2:hover{color:red;}
</style>
<div class="content">
	<div class="row">
		<div class="title col-12 box_shadow">
			<b>Trang chủ</b>
		</div>
	</div>
	<div class="row main_frame box_card box_shadow">
		<div class="table-responsive-lg">
		<div class="top_title_table">
			<h4>Danh sách người dùng</h4>
			<hr>
		</div>
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
					<td><a href="<?php echo $link_xoa; ?>">Xóa</a></td>
				</tr>
				<?php
					}
				?>
			</tbody>
		</table>
		</div>
	</div>
</div>
<div class="content">
	<div class="row">
		<div class="title col-12 box_shadow">
			<b>Trang chủ</b>
		</div>
	</div>
	<div class="row main_frame box_card box_shadow">
		<div class="table-responsive-lg">
		<div class="top_title_table">
			<h4>Danh sách người dùng</h4>
			<hr>
		</div>
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
					<td><a href="<?php echo $link_xoa; ?>">Xóa</a></td>
				</tr>
				<?php
					}
				?>
			</tbody>
		</table>
		</div>
	</div>
</div> -->