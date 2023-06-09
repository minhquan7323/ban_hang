<div align="left">
	<div class="btn-group">
		<button type="button" class="btn btn-secondary dropdown-toggle bo_loc" data-bs-toggle="dropdown" aria-expanded="false">
			Bộ lọc
		</button>
		<ul class="dropdown-menu" style="width:400px">
			<h6>Khoảng giá</h6>
			<ul>
				<li>
					<div class="form-check">
						<input type="checkbox" name="loc_gia[]" value="0-200000" class="form-check-input" id="flexCheckDefault">
						<label class="form-check-label" for="flexCheckDefault">0 - 200.000 <u>đ</u></label>
					</div>
				</li>
				<li>
					<div class="form-check">
						<input type="checkbox" name="loc_gia[]" value="200000-1000000" class="form-check-input" id="flexCheckDefault">
						<label class="form-check-label" for="flexCheckDefault">200.000 - 1.000.000 <u>đ</u></label>
					</div>
				</li>
				<li>
					<div class="form-check">
						<input type="checkbox" name="loc_gia[]" value="1000000-5000000" class="form-check-input" id="flexCheckDefault">
						<label class="form-check-label" for="flexCheckDefault">1.000.000 - 5.000.000 <u>đ</u></label>
					</div>
				</li>
				<li>
					<div class="form-check">
						<input type="checkbox" name="loc_gia[]" value="5000000-10000000" class="form-check-input" id="flexCheckDefault">
						<label class="form-check-label" for="flexCheckDefault">5.000.000 - 10.000.000 <u>đ</u></label>
					</div>
				</li>
				<li>
					<div class="form-check">
						<input type="checkbox" name="loc_gia[]" value="10000000" class="form-check-input" id="flexCheckDefault">
						<label class="form-check-label" for="flexCheckDefault">>10.000.000 <u>đ</u></label>
					</div>
				</li>
			</ul>
			<li>
				<hr class="dropdown-divider">
			</li>
			<ul>
				<div class="container">
					<div class="row">
						<?php
							$tv_loc="select * from menu_doc";
							$tv_loc_1 = mysqli_query($conn, $tv_loc);
							while($tv_loc_2=mysqli_fetch_array($tv_loc_1)) {
								$ten=$tv_loc_2['ten'];
								$id=$tv_loc_2['id'];
								echo '<li class="col-6">
									<div class="form-check">
										<input type="checkbox" name="phan_loai[]" value="'.$id.'" class="form-check-input" id="flexCheckDefault">
										<label class="form-check-label" for="flexCheckDefault">'.$ten.'</label>
									</div>
								</li>';
							}
						?>
					</div>
				</div>
			</ul>
			<li>
				<hr class="dropdown-divider">
			</li>
			<li>
				<button type="submit" name="submit_loc" id="submit_loc_btn" class="btn btn-secondary">Lọc</button>
			</li>
		</ul>
	</div>
</div>
<script>
    document.getElementById("submit_loc_btn").addEventListener("click", function(event){
        var checkboxes = document.querySelectorAll('input[type=checkbox]:checked');
        if (checkboxes.length === 0) {
            event.preventDefault();
            alert("Vui lòng chọn ít nhất một bộ lọc trước khi tìm kiếm.");
        }
    });
</script>