<?php 
	if(!isset($bien_bao_mat)){exit();}
?>
<?php 
	$tv="select * from footer limit 0,1 ";
	$conn = new mysqli("localhost", "root", "", "ban_hang");
	$tv_1 = mysqli_query($conn, $tv);
	$tv_2 = mysqli_fetch_array($tv_1);
	$noi_dung=$tv_2['html'];
?>
<form action="" method="post" enctype="multipart/form-data" >
	<table width="990px" >
		<tr>
			<td><b style="color:blue;font-size:20px" >Sửa footer</b></td>
		</tr>

		<tr>
			<td align="center" >
				<br>
				<script type="text/javascript">
				  tinymce.init({
					selector: '#noi_dung',
					theme: 'modern',
					width: 980,
					height: 200,
					plugins: [
					  'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
					  'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
					  'save table contextmenu directionality emoticons template paste textcolor jbimages'
					],
					toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons jbimages',
					relative_urls: false
				  });
				  
				  </script>
				  <textarea id="noi_dung" name="noi_dung" ><?php echo $noi_dung; ?></textarea>
			</td>
		</tr>
		<tr>
			<td>
				<br>
				<input type="submit" name="bieu_mau_sua_footer" value="Sửa footer" style="width:200px;height:50px;font-size:24px" >
			</td>
		</tr>
	</table>
</form>