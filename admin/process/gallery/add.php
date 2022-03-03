<?php
	include("../../../require_inc.php");
	if (isset($_SESSION['is_logined']) || isset($_COOKIE['islogined'])) {
		if (isset($_SESSION['is_logined']))
			$user_id = $_SESSION['is_logined'];
		else
			$user_id = $_COOKIE['islogined'];
		$data = $_POST['data'];
		$gal_id = $data['gal_id'];
		$array_ext_image = array(".png", ".jpg", "jpeg", ".gif", ".bmp", ".PNG", ".JPG", ".JPEG", ".GIF", ".BMP");
		$path = '../../../upload/gallery';
		if ($gal_id == 1) {
			$path_avatar = $path.'/images/avatar';
			$images = $_FILES['images']['name'];
			if (count($images) > 0) {
				$path_gallery = $path.'/images/gallery/';
				$data['gallery'] = uploadMultipleImages("images", $path_gallery, count($images));
			}
		} else {
			$path_avatar = $path.'/videos';
		}
		if ($_FILES['avatar']['name'] != '') {
			$image = $_FILES['avatar']['name'];
			$ext_i = substr($image, -4);
			if (in_array($ext_i, $array_ext_image)) {
				$width = 480;
				$height = 300;
				$data['avatar'] = resizeImage($width, $height, chuoianh($image), $path_avatar, $_FILES['avatar']['tmp_name'], time().'_'.chuoianh($image));
			}
		}

		$table = "galleries";
		$max = $h->getMax("sort", $table, "deleted_at is null and gal_id = $gal_id");
		$data['sort'] = $max['maxs'] + 1;
		$data['active'] = 1; 
		$res = $h->insertDataBy($data, $table, $user_id);
		if ($res)
			echo '1';
		else
			echo '2';
	} else
		echo '5';
