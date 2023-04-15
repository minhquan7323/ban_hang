<?php 
	if(!isset($bien_bao_mat)){exit();}
?>
<?php 
	$id=$_GET['id'];
	$tv="select * from san_pham where id='$id' ";
	$conn = new mysqli("localhost", "root", "", "ban_hang");
	$tv_1 = mysqli_query($conn, $tv);
	$tv_2 = mysqli_fetch_array($tv_1);
	$ten=$tv_2['ten'];
	$danh_muc=$tv_2['thuoc_menu'];
	$gia=$tv_2['gia'];
	$trang_chu=$tv_2['trang_chu'];
	$noi_bat=$tv_2['noi_bat'];
	$noi_dung=$tv_2['noi_dung'];
	$ten_anh=$tv_2['hinh_anh'];
	$link_hinh="../hinh_anh/img/".$tv_2['hinh_anh'];
	$link_dong="?thamso=quan_ly_san_pham&id_menu=".$_GET['id_menu']."&trang=".$_GET['trang'];
?>
<div class="content">
	<div class="row">
		<div class="title col-12 box_shadow">
			<b>Sửa sản phẩm</b>
		</div>
	</div>
	<div class="row main_frame box_card box_shadow">
		<div class="table-responsive-lg">
			<table class="table table-bordered w">
				<form action="" method="post" enctype="multipart/form-data">
					<div class="container">
						<div class="row">
							<div class="col-6">
								<div class="form-floating mb-3">
									<input name="ten" value="<?php echo $ten; ?>" type="text" class="form-control" id="floatingInput" placeholder="abc">
									<label for="floatingInput">Tên sản phẩm</label>
								</div>
								<div class="form-floating mb-3">
									<input name="gia" value="<?php echo $gia; ?>" type="text" class="form-control" id="floatingInput" placeholder="123456">
									<label for="floatingInput">Giá</label>
								</div>
								<div class="form-floating mb-3">
									<div class="hinh_anh">
										<span>Hình ảnh</span><input value="<?php echo $ten_anh; ?>" type="file" name="hinh_anh" class="btn btn-outline-secondary">
									</div>
								</div>
							</div>
							<div class="col-6">
								<div class="form-floating mb-3">
									<?php
										if(!isset($_SESSION['danh_muc_menu']))
											$_SESSION['danh_muc_menu']="";
									?>
										<select name="danh_muc" class="form-select" id="floatingSelect" aria-label="123">
										<?php 
											$tvx="select * from menu_doc order by id ";
											$tv_1 = mysqli_query($conn, $tvx);
											$a="";
											while($tv_2 = $tv_1->fetch_assoc()) {
												$ten=$tv_2['ten'];
												$id_menu=$tv_2['id'];
												if($id_menu==$danh_muc) $a="selected";
												echo "<option value='$id_menu' $a >".$ten."</option>";
												$a="";
											}
										?>
								</div>
								<div class="form-floating mb-3">
								<select class="form-select" id="floatingSelect" aria-label="123">
									<label for="floatingSelect">Danh mục</label>
								</div>

								<div class="form-floating mb-3">
									<?php
										$a_1="";
										$a_2="";
										if($trang_chu=="co")
											$a_2="selected";
									?>
									<select name="trang_chu" class="form-select" id="floatingSelect" aria-label="Floating label select example">
										<option value="" <?php echo $a_1; ?> >Không</option>
										<option value="co" <?php echo $a_2; ?> >Có</option>
									</select>
									<label for="floatingSelect">Hiển thị trang chủ</label>
								</div>

								<div class="form-floating mb-3">
									<?php
										$a_1=""; $a_2="";
										if($noi_bat=="co")
											$a_2="selected";
									?>
									<select name="noi_bat" class="form-select" id="floatingSelect" aria-label="Floating label select example">
										<option value="" <?php echo $a_1; ?> >Không</option>
										<option value="co" <?php echo $a_2; ?> >Có</option>
									</select>
									<label for="floatingSelect">Hiển thị nổi bật</label>
								</div>
							</div>
							<div class="col-3">
								<img src="<?php echo $link_hinh; ?>" style="width:150px" > 
							</div>
							<div class="col-9">
								<div class="form-floating mb-3">
									<script type="text/javascript">
										tinymce.init({
											selector: '#noi_dung',
											theme: 'modern',
											width: 800,
											height: 400,
											plugins: [
											'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
											'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
											'save table contextmenu directionality emoticons template paste textcolor jbimages'
											],
											toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons jbimages',
											relative_urls: false
										});
									</script>
									<textarea id="noi_dung" name="noi_dung" class="form-control" placeholder="Leave a comment here" id="floatingTextarea" style="height: 150px"><?php echo $noi_dung; ?></textarea>
									<label for="floatingTextarea">Nội dung</label>
								</div>
							</div>
						</div>
					</div>
					<button type="submit" name="bieu_mau_sua_san_pham" class="btn btn-outline-success">Sửa sản phẩm</button>
				</form>
			</table>
		</div>
	</div>
</div>