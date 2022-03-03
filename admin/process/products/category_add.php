<?php
	include("../../../require_inc.php");
	if (isset($_SESSION['is_logined']) || isset($_COOKIE['islogined'])) {
		if (isset($_SESSION['is_logined']))
			$user_id = $_SESSION['is_logined'];
		else
			$user_id = $_COOKIE['islogined'];
		$data = $_POST['data'];
		$cate_id = $data['cate_id'];
		$table = "categories";
		$max = $h->getMax("sort", $table, "deleted_at is null and cate_id = $cate_id and active = 1");
		$data['sort'] = $max['maxs'] + 1;
		$data['active'] = 1; 
		$res = $h->insertDataBy($data, $table, $user_id);
		if ($res)
			echo '1';
		else
			echo '2';
	} else
		echo '5';
