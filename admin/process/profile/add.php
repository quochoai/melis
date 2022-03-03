<?php
	include("../../../require_inc.php");
	$data['block_id'] = $_POST['block_id'];
	$data['department_id'] = $_POST['department_id'];
	$data['title_id'] = $_POST['title_id'];
	$data['profile_code'] = (int)trim($_POST['profile_code']).'.bvhv';
	$data['fullname'] = trim($_POST['name']);
	$data['password'] = $h->mahoa('12345');
	$data['birthday'] = trim($_POST['birthday']);
	$data['email'] = trim($_POST['email']);
	$data['phone'] = trim($_POST['phone']);
	$data['role'] = $_POST['role'];
	if (isset($_POST['active']))
		$data['active'] = $def['actived'];
	else 
		$data['active'] = $def['inactive'];
	if (isset($_POST['active_exam']))
		$data['active_exam'] = $def['actived'];
	else 
		$data['active_exam'] = $def['inactive'];
	$table = 'profiles';
	$user = $_SESSION['is_logined'];
	$n = $h->profileExist($data['profile_code']);
	if ($n)
		echo '3;error';
	else {
		$result = $h->insertDataBy($data, $table, $user['id']);
		if ($result)
			echo '1;success';
		else 
			echo '2;error';
	}
?>