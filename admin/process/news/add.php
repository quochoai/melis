<?php
	include("../../../require_inc.php");
	if (isset($_SESSION['is_logined']) || isset($_COOKIE['islogined'])) {
		if (isset($_SESSION['is_logined']))
			$user_id = $_SESSION['is_logined'];
		else
			$user_id = $_COOKIE['islogined'];
		$data = $_POST['data'];
		$news_id = $data['news_id'];
		$array_ext_image = array(".png", ".jpg", "jpeg", ".gif", ".bmp", ".PNG", ".JPG", ".JPEG", ".GIF", ".BMP");
		$path = '../../../upload/';
		if ($news_id == 1)
			$path_avatar = $path.'news';
		elseif ($news_id == 2)
			$path_avatar = $path.'knowledge';
		else
			$path_avatar = $path.'promotion';
		if ($_FILES['image']['name'] != '') {
			$image = $_FILES['image']['name'];
			$ext_i = substr($image, -4);
			if (in_array($ext_i, $array_ext_image)) {
				$width = 720;
				$height = 450;
				$data['image'] = resizeImage($width, $height, chuoianh($image), $path_avatar, $_FILES['image']['tmp_name'], time().'_'.chuoianh($image));
			}
		}
		if ($_FILES['thumbfb']['name'] != '') {
			$thumbfb = $_FILES['thumbfb']['name'];
			$ext_fb = substr($thumbfb, -4);
			if (in_array($ext_fb, $array_ext_image)) {
				$path_thumbfb = $path_avatar.'/thumbfb';
				$widthf = 450;
				$heightf = 235;
				$data['thumbfb'] = resizeImage($widthf, $heightf, chuoianh($thumbfb), $path_thumbfb, $_FILES['thumbfb']['tmp_name'], time().'_'.chuoianh($thumbfb));
			}
		}
		$pd = explode("/", trim($data['post_date']));
		$data['post_date'] = $pd[2].'/'.$pd[1].'/'.$pd[0].' '.date("H:i:s");
		$table = "news";
		$max = $h->getMax("sort", $table, "deleted_at is null and news_id = $news_id");
		$data['sort'] = $max['maxs'] + 1;
		$data['active'] = 1; 
		$res = $h->insertDataBy($data, $table, $user_id);
		if ($res)
			echo '1';
		else
			echo '2';
	} else
		echo '5';
