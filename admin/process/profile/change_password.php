<?php
	include("../../../require_inc.php");
	if (isset($_SESSION['is_logined']) || isset($_COOKIE['islogined'])) {
		if (isset($_SESSION['is_logined']))
			$id = $_SESSION['is_logined'];
		else
			$id = $_COOKIE['islogined'];
		$oldpass = $h->mahoa(trim($_POST['oldpassword']));
		$data['pass'] = $h->mahoa(trim($_POST['password']));
		$table = 'admins';
		
		$p = $h->getById("pass", $table, $id, "and deleted_at is null");
		if ($p['pass'] == $oldpass) {
			$result = $h->updateDataBy($data, $table, "where id = $id", $id);
			if ($result)
				echo '1;success';
			else 
				echo '2;error';
		} else 
			echo '3;error';
	} else
		echo '5;error';
