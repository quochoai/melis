<?php
	include("../../../require_inc.php");
	if (isset($_SESSION['is_logined']) || isset($_COOKIE['islogined'])) {
		if (isset($_SESSION['is_logined']))
			$user_id = $_SESSION['is_logined'];
		else
			$user_id = $_COOKIE['islogined'];
		$id = $_POST['id'];
		$data = $_POST['data'];
		$gal_id = $_POST['gal_id'];
		$array_ext_image = array(".png", ".jpg", "jpeg", ".gif", ".bmp", ".PNG", ".JPG", ".JPEG", ".GIF", ".BMP");
		$path = '../../../upload/gallery';
		if ($gal_id == 1) {
			$path_avatar = $path.'/images/avatar';
			$images = $_FILES['images']['name'];
			$path_gallery = $path.'/images/gallery/';
			$img_gallery = $gallery_old = $gallery_new = "";
			$number_new = count($images);
			if ($number_new > 0) {
				$gallery_new = uploadMultipleImages("images", $path_gallery, $number_new);
			}
			$olds = $_POST['old'];
			$array_old = array();
			if (count($olds) > 0) {
				$numberOldGet = count($olds) - $number_new;
				for ($i = 0; $i < $numberOldGet; $i++) {
					$old = explode("/", $olds[$i]);
					array_push($array_old, $old[count($old) - 1]);
				}
				$gallery_old = implode(";", $array_old);
			}
			
			if ($gallery_old != '') {
				if ($gallery_new != '') 
					$img_gallery = $gallery_old.';'.$gallery_new;
				else
					$img_gallery = $gallery_old;
			} else {
				if ($gallery_new != '')
					$img_gallery = $gallery_new;
			}
			$data['gallery'] = $img_gallery;
			
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
		$res = $h->updateDataBy($data, $table, " where id = $id", $user_id);
		if ($res)
			echo '1';
		else
			echo '2';
	} else
		echo '5';
