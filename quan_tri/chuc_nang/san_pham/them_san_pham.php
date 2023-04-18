<?php 
	if(!isset($bien_bao_mat)){exit();}
?>

<div class="content">
	<div class="row">
		<div class="title col-12 box_shadow">
			<b>Thêm sản phẩm</b>
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
									<input name="ten" value="" type="text" class="form-control" id="floatingInput" placeholder="abc" required>
									<label for="floatingInput">Tên sản phẩm</label>
								</div>
								<div class="form-floating mb-3">
									<input name="gia" value="" type="text" class="form-control" id="floatingInput" placeholder="123456" required>
									<label for="floatingInput">Giá</label>
								</div>
								<div class="form-floating mb-3">
									<div class="as">
										<span>Hình ảnh</span><input type="file" name="hinh_anh" class="btn btn-outline-secondary" required>
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
										$tv="select * from menu_doc order by id ";
										$conn = new mysqli("localhost", "root", "", "ban_hang");
										$tv_1 = mysqli_query($conn, $tv);
										$a="";
										while($tv_2 = $tv_1->fetch_assoc()) {
											$ten=$tv_2['ten']; 
											$id_menu=$tv_2['id'];
											if($_SESSION['danh_muc_menu']==$id_menu) 
												$a="selected";
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
										$a_1=""; $a_2="";
										if(isset($_SESSION['tuy_chon_trang_chu']))
											if($_SESSION['tuy_chon_trang_chu']=="co")
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
										if(isset($_SESSION['tuy_chon_noi_bat']))
											if($_SESSION['tuy_chon_noi_bat']=="co")
												$a_2="selected";
									?>
									<select name="noi_bat" class="form-select" id="floatingSelect" aria-label="Floating label select example">
										<option value="" <?php echo $a_1; ?> >Không</option>
										<option value="co" <?php echo $a_2; ?> >Có</option>
									</select>
									<label for="floatingSelect">Hiển thị nổi bật</label>
								</div>
							</div>
						</div>
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
							<textarea id="noi_dung" name="noi_dung" class="form-control" placeholder="Leave a comment here" id="floatingTextarea" style="height: 100px"></textarea>
							<label for="floatingTextarea">Nội dung</label>
						</div>
					</div>
					<button type="submit" name="bieu_mau_them_san_pham" class="btn btn-outline-success" onclick="return confirm('Bạn có chắc chắn muốn thêm sản phẩm này?')">Thêm sản phẩm</button>
				</form>
			</table>
		</div>
	</div>
</div>