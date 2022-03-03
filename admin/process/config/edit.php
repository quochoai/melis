<?php
	include("../../../require_inc.php");
	$data = $_POST['data'];
	$s = $h->update($data, "configs", " where id = 1");
	if ($s)
		echo '1';
	else
		echo '2';
