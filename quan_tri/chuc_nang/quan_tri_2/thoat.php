<?php 
	if(!isset($bien_bao_mat)){exit();}
?>
<?php 
    session_start();
	unset($_SESSION['ky_danh']);
	unset($_SESSION['mat_khau']);
	header('Location: ./');
?>
