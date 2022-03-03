<?php
	include("../../../require_inc.php");
	if (isset($_SESSION['is_logined']) || isset($_COOKIE['islogined'])) {
		if (isset($_SESSION['is_logined']))
			$user_id = $_SESSION['is_logined'];
		else
			$user_id = $_COOKIE['islogined'];
		$data = $_POST['data'];
		$id = $_POST['id'];

		$array_ext_image = array(".png", ".jpg", "jpeg", ".gif", ".bmp", ".PNG", ".JPG", ".JPEG", ".GIF", ".BMP");
		$path = '../../../upload/service';
		if ($_FILES['image']['name'] != '') {
			$image = $_FILES['image']['name'];
			$ext_i = substr($image, -4);
			if (in_array($ext_i, $array_ext_image)) {
				$path_avatar = $path.'/avatar';
				$width = 720;
				$height = 480;
				$data['image'] = resizeImage($width, $height, chuoianh($image), $path_avatar, $_FILES['image']['tmp_name'], time().'_'.chuoianh($image));
			}
		}
		if ($_FILES['image_detail']['name'] != '') {
			$image_detail = $_FILES['image_detail']['name'];
			$ext_id = substr($image_detail, -4);
			if (in_array($ext_id, $array_ext_image)) {
				$path_detail = $path."/detail/";
				$data['image_detail'] = uploadfile("image_detail", $path_detail);
			}
		}
		if ($_FILES['thumbfb']['name'] != '') {
			$thumbfb = $_FILES['thumbfb']['name'];
			$ext_fb = substr($thumbfb, -4);
			if (in_array($ext_fb, $array_ext_image)) {
				$path_thumbfb = $path.'/thumbfb';
				$widthf = 450;
				$heightf = 235;
				$data['thumbfb'] = resizeImage($widthf, $heightf, chuoianh($thumbfb), $path_thumbfb, $_FILES['thumbfb']['tmp_name'], time().'_'.chuoianh($thumbfb));
			}
		}

		$table = "services";
		$res = $h->updateDataBy($data, $table, " where id = $id", $user_id);
		if ($res)
			echo '1';
		else
			echo '2';
	} else
		echo '5';
