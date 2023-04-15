<style type="text/css" >
	div.slideshow img {width:600px;height:260px}
</style>
<center>
<div class="slideshow" id="slideshow" >
	<?php 
		function display_slideshow() {
			// Connect to the database using MySQLi or PDO
		
			$tv = "SELECT hinh, lien_ket FROM slideshow ORDER BY id";
			$tv_1 = mysqli_query($connection, $tv); // Or use PDO
		
			if (mysqli_num_rows($tv_1) > 0) {
				echo '<div class="slideshow" id="slideshow">';
				while ($tv_2 = mysqli_fetch_assoc($tv_1)) {
					$link_hinh = "hinh_anh/slideshow/" . $tv_2['hinh'];
					echo "<a href='" . $tv_2['lien_ket'] . "'>";
					echo "<img src='" . $link_hinh . "' alt='Slideshow image'>";
					echo "</a>";
				}
				echo '</div>';
		
				echo "<script type='text/javascript'>
					var i_img=0;
					var div_slideshow=document.getElementById('slideshow');
					var img_slideshow=div_slideshow.getElementsByTagName('img');
					for(var i=0;i<img_slideshow.length;i++)
					{
						img_slideshow[i].style.display='none';
					}
					img_slideshow[0].style.display='block';
		
					setInterval(function(){
						img_slideshow[i_img].style.display='none';
						i_img=i_img+1;
						if(i_img>=img_slideshow.length){i_img=0;}
						img_slideshow[i_img].style.display='block';		
					},5000);
				</script>";
			} else {
				echo "No slideshow images found.";
			}
		
			// Close the database connection
		}
		
		?>
</div>
</center>
<script type="text/javascript" >

	var i_img=0;
	var div_slideshow=document.getElementById("slideshow");
	var img_slideshow=div_slideshow.getElementsByTagName("img");
	for(var i=0;i<img_slideshow.length;i++)
	{
		img_slideshow[i].style.display="none";
	}
	img_slideshow[0].style.display="block";
	
	setInterval(function(){
		img_slideshow[i_img].style.display="none";
		i_img=i_img+1;
		if(i_img>=img_slideshow.length){i_img=0;}
		img_slideshow[i_img].style.display="block";		
	},5000);
</script>