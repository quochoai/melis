<?php
	@session_start();    
	include("define/define.php");
	include("common/function.php");
	$langToSet = (!isset($_POST['set'])) ? 'vi' : $_POST['set'];    
	if(!in_array($langToSet, array('vi', 'en'))){
		$langToSet = 'vi';
	}
	$_SESSION['lang'] = strtolower($langToSet);
	$m = explode("/", killInjection(trim($_SERVER['HTTP_REFERER'])));
	if (!isset($m[4]) || $m[4] == '')
		$linkTo = URL.$langToSet.'/';
	else {
		$m[4] = $langToSet;
		$link = "";
		for($i = 4; $i < count($m); $i++) {
			$link .= $m[$i].'/';
		}
		$linkTo = URL.substr($link, 0, -1);
	}
	echo $linkTo;
