<?php
	include("../../../require_inc.php");
	if (isset($_SESSION['is_logined']) || isset($_COOKIE['islogined'])) {
		if (isset($_SESSION['is_logined']))
			$user_id = $_SESSION['is_logined'];
		else
			$user_id = $_COOKIE['islogined'];
		$data = $_POST['data'];
		$ld_id = $data['ld_id'];
		$array_ext_image = array(".png", ".jpg", "jpeg", ".gif", ".bmp", ".PNG", ".JPG", ".JPEG", ".GIF", ".BMP");
		$path = '../../../upload/partner';
		if ($_FILES['image']['name'] != '') {
			$image = $_FILES['image']['name'];
			$ext_i = substr($image, -4);
			if (in_array($ext_i, $array_ext_image)) {
				$width = 250;
				$height = 150;
				$data['image'] = resizeImage($width, $height, chuoianh($image), $path, $_FILES['image']['tmp_name'], time().'_'.chuoianh($image));
			}
		}

		$table = "partners";
		$max = $h->getMax("sort", $table, "deleted_at is null");
		$data['sort'] = $max['maxs'] + 1;
		$data['active'] = 1; 
		$res = $h->insertDataBy($data, $table, $user_id);
		if ($res)
			echo '1';
		else
			echo '2';
	} else
		echo '5';
