<html>
<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
<!-- <div class='menu_ngang'> -->
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container-fluid">
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      			<span class="navbar-toggler-icon"></span>
    		</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
				<?php 
					$conn = new mysqli("localhost", "root", "", "ban_hang");
					if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
					$tv = "SELECT id, ten, loai_menu FROM menu_ngang ORDER BY id";
					$tv_1 = $conn->query($tv);

					while ($tv_2 = $tv_1->fetch_assoc()) {
						if ($tv_2['loai_menu'] == "trang_chu")	$link_menu = "index.php";
						if ($tv_2['loai_menu'] == "") 			$link_menu = "?thamso=xuat_mot_tin&id=".$tv_2['id'];
						if ($tv_2['loai_menu'] == "san_pham") 	$link_menu = "?thamso=xuat_san_pham_2";
						echo "<li class='nav-item'>
								<a class='nav-link' href='$link_menu'>" . $tv_2['ten'] . "</a>
							</li>
						";
					}
					$conn->close();
					include("chuc_nang/tim_kiem/vung_tim_kiem.php");
					include("chuc_nang/nguoi_dung/vung_nguoi_dung.php");
				?>
		</div>
	</div>
</nav>
<br>
</body>
</html>